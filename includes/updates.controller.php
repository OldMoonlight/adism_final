<?php
	  require_once ("sanitize.php");
	  require_once (__DIR__."/../includes/SQLiteUpdates.php");

$redirect = substr($_SERVER['REQUEST_URI'], 0, strrpos($_SERVER['REQUEST_URI'], '&'));

if ($_SERVER['REQUEST_METHOD'] == 'POST' /*&& (isset( $_SESSION['user_name']) || !empty($_SESSION['user_name']))*/ ){

	switch (htmlspecialchars($_POST['type'])){
	case "add":
			$title   = sanitize($_POST['title']);
			$content = sanitize($_POST['content']);

			$execute = addUpdate($title, $content);
			if ($execute === true) {
				print "Submission successful!";
				http_response_code(201);
			} else {
				print "Submission failed.";
                print $execute;
			} break;
		
	case "delete":
		if (!empty($_POST['update_id'])){
			$id = sanitize($_POST['update_id']);
			
			if (deleteArticle($id)){print "Delete successful!";}
			else {print "Delete failed.";}
			//I found that it was possible for users to delete the notice they are currently viewing.
			//This resulted in junk data in the edit fields.
			//So, if the GET value is the same as the delete ID, redirect to main page
			if (isset($_GET['edit']) && sanitize((int)$_GET['edit']) == $id){
				header("location: $redirect");
			}
		} break;
		
		
	case "update":
		if (!empty($_POST['update_id'])){
			$id = sanitize($_POST['update_id']);
			$title = sanitize(stripforwardslashes($_POST['title']));
			$content = sanitize($_POST['content']);
			
			if (editArticle($id, $title, $summary, $content)){print "Update successful!";}
			else {print "I couldn't update that. SQL, prob.";}
			//print "$id, $title, $content";
		} break;
    default : print "Undefined type";
	}
}?>