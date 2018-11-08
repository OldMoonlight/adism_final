<?php 

function dirFilesize($dir){
    $dirFiles = array_slice(scandir($dir), 2);
    if ($dirFiles){
        $bytes = 0;
        foreach ($dirFiles as $file){
            $bytes += filesize($dir.$file);
        }
        return human_filesize($bytes);
    }
    return 0;
}

function human_filesize($bytes, $decimals = 2) {
  $sz = 'BKMGTP';
  $factor = floor((strlen($bytes) - 1) / 3);
  return sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)) . @$sz[$factor];
}
?>