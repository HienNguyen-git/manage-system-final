<?php
    require_once('db.php');

    if($_SERVER['REQUEST_METHOD']!='POST'){
        http_response_code(405);
        die(json_encode(array('code'=>1,'message'=>'API nay chi ho tro POST')));
    }

    $input = json_decode(file_get_contents('php://input'));

    // die(json_encode(array('code'=>5,'data'=> array($input->id,$input->name,$input->price,$input->desc))));

    if(is_null($input)){
        die(json_encode(array('code'=>2,'message'=>'Chi ho tro JSON')));
    }
    
    if(!property_exists($input,'id')||!property_exists($input,'departmentNameUpdate')||!property_exists($input,'departmentNumUpdate')||!property_exists($input,'departmentManagerUpdate') ||!property_exists($input,'departmentDetailUpdate')){
        http_response_code(400);
        die(json_encode(array('code'=>3,'message'=>'Thieu thong tin dau vao ')));
    }

    if(empty($input->id)||empty($input->departmentNameUpdate)||empty($input->departmentNumUpdate)||empty($input->departmentManagerUpdate) ||empty($input->departmentDetailUpdate)){
        http_response_code(405);
        die(json_encode(array('code'=>4,'message'=>'Thong tin khong hop le')));
    }

    $id = $input->id;
    $departmentNameUpdate = $input->departmentNameUpdate;
    $departmentNumUpdate = $input->departmentNumUpdate;
    $departmentManagerUpdate = $input->departmentManagerUpdate;
    $departmentDetailUpdate = $input->departmentDetailUpdate;
    // die(json_encode(array('code'=>5,'data'=> array($id,$name,$price,$desc))));

    
    $sql = 'update department set name=?, number_room=?, manager_user=?, detail = ? where id=?';
    $conn = open_database();
    
    $stm = $conn->prepare($sql);
    $stm->bind_param('sissi',$departmentNameUpdate,$departmentNumUpdate,$departmentManagerUpdate,$departmentDetailUpdate,$id);
    
    if(!$stm->execute()){
        http_response_code(400);
        die(json_encode(array('code'=>5,'message'=>'Khong the thuc hien lenh')));
    }
    die(json_encode(array('code'=>0,'message'=>'Da them san pham thanh cong')));
?>