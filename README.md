# Re:shape Theme

## Installation

Follow the steps below to install this project:
1. Clone Repository
2. Install Git Submodul BB Blocks
3. Install Node Modules
4. Dev mode
5. Build mode

### Clone Repository
```bash
git clone https://github.com/bananenbiegerei/re-shape
```
### Install Git Submodules

To install BB Blocks Sumbodules:

```bash
git submodule update --init --recursive
```
### 3. Install Node Modules
```bash
npm install
```
### 4. Dev Mode
Run dev mode to start developping
```bash
npm run dev
```
### 5. Build Mode
Run build mode to build the theme for production
```bash
npm run build
```
For creating an archive to install the theme run `npm run package`. A zip will be created in `dist` with a timestamped theme version.

# Users Manual
1. Install Theme
2. Edit Theme Settings
3. Edit Content

## 1. Install Theme
1. Login to Your Wordpress Backend
2. Go to: Appearance > Theme
3. Upload .zip file of the Reshape Blog Theme
4. Activate Theme

## 2. Edit Theme Settings
By default the following elements are missing in need to be added:
1. Logo(s) - In the frontend click on the notices and upload logos. In the backend you can go to: Theme Settings > Logo Tab > Upload images
2. Menues - In the frontend click on the notices and you will be redirected to the menu edit screen. In the backend you can go to: Appearance > Menus > Create new menu / edit existing menus. Don't forget to set the checkmark for the location! You also have to add a top menu and a footer menu

## 3. Edit Content
1. Edit Homepage content go to: Theme Settings > Open tab with homepage content > set title, excerpt and image
2. Edit contact options for the footer. Go to: Theme Settings > Open tab with contact content > fill out the field
3. To edit posts and pages got to the according page or post. You can now place different blocks in the content. They will be stacked upon each other. If you want to use columns you also have to add them.
