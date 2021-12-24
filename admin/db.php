<?php
    define('HOST', '127.0.0.1');
    define('USER', 'root');
    define('PASS', '');
    define('DB', 'company');

    function open_database(){
        $conn = new mysqli(HOST,USER,PASS,DB);
        if($conn->connect_error){
            die('Connect to db error: ' . $conn->connect_error);
        }
        return $conn;
    }

    function login($user,$pass){
        $sql = "select * from account where username = ?";
        $conn = open_database();

        $stm = $conn->prepare($sql);
        $stm->bind_param('s',$user);
        if(!$stm->execute()){
            return array('code' => 1, 'error' => 'Cant execute command'); //chạy sql fail
        }

        $result = $stm->get_result();
        if($result->num_rows == 0){
            return array('code' => 2, 'error' => 'User doesnt exist'); // user ko tồn tại
        }
        $data = $result->fetch_assoc();

        $hashed_password = $data['password'];
        if(!password_verify($pass,$hashed_password)){
            return array('code' => 3, 'error' => 'Invalid password'); // pass sai
        }
        
        else {
            return array('code' => 0, 'error' => '', 'data' => $data);
        }
    }

    function is_email_exists($email){
        $sql = 'select username from account where email = ?';
        $conn = open_database();

        $stm =$conn->prepare($sql);
        $stm->bind_param('s',$email);
        if(!$stm->execute()){
            die('Query error: ' . $stm->error);
        }

        $result = $stm->get_result();
        if($result->num_rows > 0){
            return true;
        }
        else{
            return false;
        }
    }
    function is_password_changed($username){
        $sql = 'select activated from account where username = ?';
        $conn = open_database();

        $stm =$conn->prepare($sql);
        $stm->bind_param('s',$username);
        if(!$stm->execute()){
            die('Query error: ' . $stm->error);
        }

        $result = $stm->get_result();
        $data = $result->fetch_assoc();
        // print_r($data['activated']);
        return $data['activated'];
    }

    
    function active_token($username){
        $sql = 'update account set activated = 1  where username = ?';
        $conn = open_database();

        $stm =$conn->prepare($sql);
        $stm->bind_param('s',$username);
        if(!$stm->execute()){
            die('Query error: ' . $stm->error);
        }
        return array('code' => 0, 'message' => 'active token success');
        // $result = $stm->get_result();
        // $data = $result->fetch_assoc();
        // print_r($data['activated']);
        // return $data['activated'];
    }

    function register($user, $first, $last){
        
        $hash = password_hash($user,PASSWORD_DEFAULT);
        $rand = random_int(0,1000);
        $token = md5($user . '+' . $rand);

        $sql = 'insert into account(username, firstname, lastname,password, activate_token) values(?,?,?,?,?)';
        $conn = open_database();

        $stm = $conn->prepare($sql);
        $stm->bind_param('sssss',$user,$first,$last,$hash,$token);

        if(!$stm->execute()){
            return array('code' => 2, 'error' => 'Cant execute command');
        }

        

        return array('code' => 0, 'success' => 'Create account successful');
    }

    function change_password($newpass){
        // if(!is_email_exists($email)){
        //     return array('code' => 1, 'error' => 'Email doesnt exist');
        // }
        $hash = password_hash($newpass,PASSWORD_DEFAULT);

        $sql = 'update account set password = ?';
        $conn = open_database();

        $stm = $conn->prepare($sql);
        $stm->bind_param('s',$hash);
        if(!$stm->execute()){
            return array('code'=> 2, 'error' => 'Can not execute command.');
        }
        
        return array('code'=> 0,'success' => 'Password has changed.');



    }


?> 