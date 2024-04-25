<?php
/*
Plugin Name: BB Update Checker
Description: Adds the update functionality to BB plugins.
Version: 1.0
Author: Eric Leclercq
*/

defined('ABSPATH') || exit();

define('BB_UPDATE_CHECKER_URL', 'https://bananenbiegerei.de/updates/');
define('BB_UPDATE_CHECKER_FREQUENCY', 4 * HOUR_IN_SECONDS);
define('BB_UPDATE_CHECKER_TOKEN', 'BB (Update Checker|Updates):\s+enabled');

if (! function_exists('get_plugins')) {
    require_once ABSPATH . 'wp-admin/includes/plugin.php';
}

class BBUpdateChecker
{
    public $themes = [];

    public function __construct()
    {

        // Find themes which use BBUpdateChecker
        foreach(glob(get_theme_root() . "/*", GLOB_ONLYDIR) as $theme_dir) {
            if (preg_match("/" . BB_UPDATE_CHECKER_TOKEN. "/", file_get_contents("{$theme_dir}/style.css"))) {
                $slug = basename($theme_dir);
                $this->themes[] = new BBUpdateCheckerTheme($slug);
            }
        }

        $this->add_admin_scripts();

        // Check if we should clear the cache
        if (!empty($_GET['action']) &&  $_GET['action'] == 'clear_cache') {
            foreach ($this->themes as $p) {
                delete_transient($p->cache_key);
            }
            $action = 'admin_notices';
            if (is_multisite()) {
                $action = "network_{$action}";
            }
            add_action($action, function () {
                echo "<div class=\"notice notice-success\"><p>" . __('Update cache cleared', 'bb-update-checker') . "</p></div>";
            });
        }
    }

    public function add_admin_scripts()
    {
        // Add "Check for updates" button
        add_action('admin_enqueue_scripts', function () {
            wp_register_script('bb-update-checker', '');
            wp_enqueue_script('bb-update-checker', '', [], false, [ 'in_footer' => true ]);
            $check_for_update = __('Check for updates', 'bb-update-checker');
            $url  = is_multisite() ? network_admin_url() : admin_url();
            $script = <<<EOF
  let button_themes = jQuery("<a class=\"hide-if-no-js page-title-action\" href=\"{$url}themes.php?action=clear_cache\">$check_for_update</a>");
  jQuery('.wp-admin.themes-php .wrap a.page-title-action').after(button_themes);
  EOF;
            wp_add_inline_script('bb-update-checker', $script);
        });
    }
}

class BBUpdateCheckerTheme
{
    public $update_url = BB_UPDATE_CHECKER_URL;
    public $cache_allowed = true;
    public $slug;
    public $name;
    public $version;
    public $cache_key;

    public function __construct($slug)
    {
        $theme_data = wp_get_theme($slug);
        $this->slug = $slug;
        $this->name = $theme_data->get('Name');
        $this->version = $theme_data->get('Version');
        $this->cache_key = "theme_{$slug}_upd";

        add_filter('site_transient_update_themes', [$this, 'update']);
        add_action('upgrader_process_complete', [$this, 'purge'], 10, 2);
    }

    public function update($transient)
    {

        if (empty($transient)) {
            return $transient;
        }

        $remote = get_transient($this->cache_key);
        if (false == $remote || !$this->cache_allowed) {

            // connect to a remote server where the update information is stored
            $remote = wp_remote_get(BB_UPDATE_CHECKER_URL . '/?type=theme&slug=' . $this->slug, [
               'timeout' => 10,
               'headers' => ['Accept' => 'application/json']
             ]);

            if (is_wp_error($remote) || 200 !== wp_remote_retrieve_response_code($remote) || empty(wp_remote_retrieve_body($remote))) {
                return $transient;
            }

            $remote = json_decode(wp_remote_retrieve_body($remote));
            if (!$remote) {
                return $transient; // who knows, meybe JSON is not valid
            }
            set_transient($this->cache_key, $remote, 1); //HOUR_IN_SECONDS);
        }

        // encode the response body
        $data = [
          'theme' => $this->slug,
          'url' => null,
          'requires' => $remote->requires,
          'requires_php' => $remote->requires_php,
          'new_version' => $remote->version,
          'package' => $remote->download_url,
        ];

        // check all the versions now
        if (
            $remote
            && version_compare($this->version, $remote->version, '<')
            && version_compare($remote->requires, get_bloginfo('version'), '<')
            && version_compare($remote->requires_php, PHP_VERSION, '<')
        ) {
            $transient->response[ $this->slug ] = $data;
        } else {
            $transient->no_update[$this->slug ] = $data;
        }
        return $transient;
    }

    public function purge($upgrader, $options)
    {
        if ($this->cache_allowed && 'update' === $options['action'] && 'theme' === $options['type']) {
            delete_transient($this->cache_key);
        }
    }
}

new BBUpdateChecker();
