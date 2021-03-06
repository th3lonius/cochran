<?php
/*
Plugin Name: Manual Image Crop
Plugin URI: http://www.rocketmill.co.uk/wordpress-plugin-manual-image-crop
Description: Plugin allows you to manually crop all the image sizes registered in your WordPress theme (in particular featured image). Simply click on the "Crop" link next to any image in your media library and select the area of the image you want to crop.
Version: 1.05
Author: Tomasz Sita
Author URI: http://www.rocketmill.co.uk/author/tomasz
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=WB5ZQWGUM7T96
License: GPL2
*/

define('mic_VERSION', '1.05');

include_once(dirname(__FILE__) . '/lib/ManualImageCrop.php');
include_once(dirname(__FILE__) . '/lib/ManualImageCropEditorWindow.php');

//mic - stands for Manual Image Crop


add_action('plugins_loaded', 'mic_init_plugin');

/**
 * inits the plugin
 */
function mic_init_plugin() {
	if (! is_admin()) {
		//we are gonna use our plugin in the admin area only, so ends here if it's a frontend
		return;
	}

	$ManualImageCrop = ManualImageCrop::getInstance();
	add_action( 'admin_enqueue_scripts', array($ManualImageCrop, 'enqueueAssets') );
	$ManualImageCrop->addEditorLinks();

	//attach admin actions
	add_action('wp_ajax_mic_editor_window', 'mic_ajax_editor_window');
	add_action('wp_ajax_mic_crop_image', 'mic_ajax_crop_image');
}

/**
 * ajax call rendering the image cropping area
 */
function mic_ajax_editor_window() {
	$ManualImageCropEditorWindow = ManualImageCropEditorWindow::getInstance();
	$ManualImageCropEditorWindow->renderWindow();
	exit;
}

/**
 * ajax call that does the cropping job and overrides the previous image version
 */
function mic_ajax_crop_image() {
	$ManualImageCrop = ManualImageCrop::getInstance();
	$ManualImageCrop->cropImage();
	exit;
}
;