<?php
/**
* Plugin Name
*
* @package           PluginPackage
* @author            Michael Gangolf
* @copyright         2022 Michael Gangolf
* @license           GPL-2.0-or-later
*
* @wordpress-plugin
* Plugin Name:       Header scroll event for Elementor
* Description:       Adds a scrolled class to the body and header element when you scroll your page.
* Version:           1.0.1
* Requires at least: 5.2
* Requires PHP:      7.2
* Author:            Michael Gangolf
* Author URI:        https://www.migaweb.de/
* License:           GPL v2 or later
* License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
* Text Domain:       miga_scroll_header
*/

use Elementor\Plugin;

add_action('init', static function () {
    if (! did_action('elementor/loaded')) {
        return false;
    }

    require_once(__DIR__ . '/widgets/HeaderScrollEvent.php');
    \Elementor\Plugin::instance()->widgets_manager->register(new \Elementor_Widget_miga_scroll_header());
});
