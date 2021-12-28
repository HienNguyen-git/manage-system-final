<?php 
    require_once('../admin/db.php');
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: GET, POST');
    header("Access-Control-Allow-Headers: X-Requested-With");
    

    if(isset($_GET['id'])){
        $id = $_GET['id'];

        $sql = "update absence_form set status = 'Refused' where id = ?";
        $conn = open_database();
    
        $stm= $conn->prepare($sql);
        $stm->bind_param('i',$id);
    
        if(!$stm->execute()){
            return array('code' => 2, 'error' => 'Cant execute command');
        }
        header("Location: dayoffDetail.php?id=$id");
        // return array('code' => 0, 'success' => 'Password reset');
    }


?>