<?php

    define('HOST', '127.0.0.1');
    define('USER', 'root');
    define('PASS', '');
    define('DB', 'cinema_db');

    function open_database(){
        $conn = new mysqli(HOST, USER, PASS, DB);
        if($conn->connect_error){
            die('Fail to connect to database '. $conn->connect_error);
        }

        return $conn;
    }

    function login($user,$pass){
        $sql = "select * from account where username=?";
        $conn = open_database();

        $stm = $conn->prepare($sql);
        $stm->bind_param('s', $user);

        if(!$stm->execute()){
            return array('code'=>1,'error'=>'Command not execute');
        }

        $result = $stm->get_result();
        if($result->num_rows==0){
            return array('code'=>2,'error'=>'User not exist');

        }
        $data = $result->fetch_assoc();

        $hash_password = $data['password'];
        if(!password_verify($pass, $hash_password)){
            return array('code'=>3,'error'=>'Invalid password');
        }else if($data['activated']==0){
            return array('code'=>4,'error'=>'This account is not activated');
        }else
            return array('code'=>0,'success'=>'', 'data'=>$data);
        
    }

    function change_password($username,$new_pass){
        $hash = password_hash($new_pass, PASSWORD_DEFAULT);

        $sql = 'update account set password=? where username=?';
        $conn = open_database();
        $stm = $conn->prepare($sql);
        $stm->bind_param('ss',$hash, $email);
        if(!$stm->execute()){
            return array('code'=>2,'error'=>'Can not execute command');
        }

        return array('code'=>0,'success'=>'Password has changed');
    }
?>