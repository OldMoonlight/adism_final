<?php
function sanitize($data){
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

function stripforwardslashes($data){
	$result = str_replace('/','',$data);
	return $result;
}?>