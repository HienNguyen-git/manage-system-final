<?php 
    require_once('../admin/db.php');

    if(is_task_submitted(2)){
        echo "Submitted";
    }else{
        echo "Not yet";
    }
?>