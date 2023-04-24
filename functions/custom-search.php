<?php
function my_search_filter($query)
{
  if ($query->is_search && !is_admin()) {
    $search_query = $query->query_vars['s']; // Get the search query

    // Set up query for post content
    $content_query = array(
      'post_type' => array('post', 'glossary'),
      's' => $search_query
    );

    // Set up meta query for 'glossary_description' meta value
    $meta_query = array(
      'relation' => 'OR',
      array(
        'key' => 'glossary_description',
        'compare' => 'NOT EXISTS',
        'value' => ''
      ),
      array(
        'key' => 'glossary_description',
        'value' => $search_query,
        'compare' => 'LIKE'
      )
    );

    // Combine meta query and content query
    $query->set('meta_query', $meta_query);
    $query->set('post_type', array('post', 'page', 'glossary'));
    $query->set('search_terms_count', 1); // Disable search term split
    $query->set('search_terms', array($search_query)); // Set search term to include in content query
    $query->set('meta_query', $meta_query);
  }
}
add_filter('pre_get_posts', 'my_search_filter');
