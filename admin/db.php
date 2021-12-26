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
    }

    function register($user, $first, $last){
        $hash = password_hash($user,PASSWORD_DEFAULT);
        

        $sql = 'insert into account(username, firstname, lastname,password) values(?,?,?,?)';
        $conn = open_database();

        $stm = $conn->prepare($sql);
        $stm->bind_param('ssss',$user,$first,$last,$hash);

        if(!$stm->execute()){
            return array('code' => 2, 'error' => 'Cant execute command');
        }

        return array('code' => 0, 'success' => 'Create account successful');
    }

    function change_password($newpass){
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

    function reset_password($user){
       
        $hash = password_hash($user,PASSWORD_DEFAULT);
        $sql = 'update account set activated = 0, password = ? where username = ?';
        $conn = open_database();

        $stm= $conn->prepare($sql);
        $stm->bind_param('ss',$hash,$user);

        if(!$stm->execute()){
            return array('code' => 2, 'error' => 'Cant execute command');
        }
        
        // chèn thành công or update token của dòng đã có, gửi mail tới user để reset pass
        return array('code' => 0, 'success' => 'Password reset');



    }
?> 