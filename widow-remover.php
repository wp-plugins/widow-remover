<?php
/*
Plugin Name: Widow Remover
Description: Removes widows from any content in the content editor or title by adding non-breaking spaces where necessary. Options for use with Advanced Custom&nbsp;Fields.
Author: Axion Media Lab
Author URI: http://axionmedialab.com
Version: 1.4
*/

/*
	global variables
*/

$aml_widower_prefix = 'aml_widower_';
$aml_widower_plugin_name = 'Widow Remover';

// retrieve plugin settings from options table
$aml_widower_options = get_option('aml_widower_settings');

/*
	includes
*/

include('includes/admin-page.php');
include('includes/display-functions.php');
