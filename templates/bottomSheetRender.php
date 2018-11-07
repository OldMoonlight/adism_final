<?php 
include_once(__DIR__."/header_info.php");

class bottomSheet{
    public static function Render($title, $message, $type){
        require_once(__DIR__."/bottomSheet.html");
    }
}?>