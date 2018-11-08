<?php

function str_underscore($string){
	$return_str = str_replace(' ', '_', stripslashes($string))
	return $return_str;
}

function trimURI($cutpoint){
	$returnURI = substr($_SERVER['REQUEST_URI'], 0, strpos($_SERVER['REQUEST_URI'], $cutpoint));
	return $returnURI;
}