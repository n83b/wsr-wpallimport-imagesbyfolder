<?php 
/*
Plugin Name: WSR wp-all import images by folder
Plugin URI: http://websector.com
Description: 
Version: 1.0.0
Author: WSR
Author URI: http://websector.com
License: A short license name. Example: GPL2
*/


// usage:  [wsr_wpallimport_importimgfolder({imagefilename[1]})]


defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

function wsr_wpallimport_importimgfolder($folderURL) {
	$folderName = 'testimg';
	$output = $folderURL;
	if (strpos($folderURL, $folderName) !== false) {
		$output = '';;
		$upload_dir = wp_upload_dir();
	    $images = glob( $upload_dir['basedir'] . '/' .$folderURL . "/*"); 
		foreach($images as $key => $img){
			$img = substr(strstr($img, $folderURL), strlen($folderURL));
			$output .= get_home_url() . '/wp-content/uploads/' . $folderURL . $img . ',';
		}
	}
    echo $output;
}