<?php
    if(!file_exists('upload')){
        echo "Not exist create file";
        mkdir('/upload',0777, true);
        echo "Create success";
    }else{
        echo "exist";
    }
?>