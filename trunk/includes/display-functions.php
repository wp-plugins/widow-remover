<?php
	
/*
	display functions
*/

function aml_remove_widow($content) {
		
	global $aml_widower_options;
	
	if (is_string($content) == true) { //content is string
		if (strpos($content,'</') !== false) { //content contains tags
			$elements = explode('</', $content);
			$arra = $elements; //array of content separated at closing tags
			foreach ($elements as &$element) {	
				if (next($arra) && is_string($element)) {
				    $minWords = 3;
			        $return = $element;
			        //if $element contains < or/and > ?
			        if (strpos($element,'">') == false && strpos($element,"'>") == false && strpos($element,'" >') == false && strpos($element,"' >") == false) {
				        $arr = explode(' ',$element);
				        if(count($arr) >= $minWords) {
				            $arr[count($arr) - 2].= '&#160;'.$arr[count($arr) - 1];
				            array_pop($arr);
				            $element = implode(' ',$arr);
				        }
				    }
			    }
			}
			$elements = implode('</', $elements);
			$content =  $elements;
		} else { //content does not contain tags
			$element = $content;
		    $minWords = 3;
	        $return = $element;
	        $arr = explode(' ',$element);
	        if(count($arr) >= $minWords) {
	            $arr[count($arr) - 2].= '&#160;'.$arr[count($arr) - 1];
	            array_pop($arr);
	            $element = implode(' ',$arr);
	        }
			$content =  $element;
		}
	}
	if ($aml_widower_options['comment']) {
		return '<!--startwidower-->' . $content . '<!--endwidower-->';
	} else {
		return $content;
	}
}

global $aml_widower_options;

//filters the_content
add_filter('the_content', 'aml_remove_widow');

//filters the_title
add_filter('the_title', 'aml_remove_widow');

if ($aml_widower_options['acf']) {
	//filters any Advanced Custom Fields the_field
	add_filter('acf/load_value', 'aml_remove_widow');
}
