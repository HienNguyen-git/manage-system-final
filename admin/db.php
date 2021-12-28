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
        $sql = "select * from employee where username = ?";
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
    function move_page($role){
        if($role == 'employee'){
            header('Location: ../index.php');
        }
        
        else if($role == 'manager'){
            header('Location: ../manager/index.php');
        }
        else{
            header('Location: index.php');
        }

        // if($role == 'employee'){
        //     header('Location: ../index.php');
        // }
        
        // else if($role == 'manager'){
        //     header('Location: ../manager/index.php');
        // }
        // else{
        //     header('Location: index.php');
        // }
    }
    function get_info_employee_byuser($user){
        $sql = "select role from employee where username = ? ";
        $conn = open_database();

        $stm = $conn->prepare($sql);
        $stm->bind_param('s',$user);

        if(!$stm->execute()){
            return array('code'=>1,'error'=>'Command not execute');
        }

        $result = $stm->get_result();
        $data = '';
        if($result->num_rows==0){
            return array('code'=>2,'error'=>'Database is empty');
        }else{
            while($row = $result->fetch_assoc()){
                return $row;
            }
        }
        // return array('code'=>0,'data'=>$data);
        
    }
    function is_password_changed($username){
        $sql = 'select activated from employee where username = ?';
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
        $sql = 'update employee set activated = 1  where username = ?';
        $conn = open_database();

        $stm =$conn->prepare($sql);
        $stm->bind_param('s',$username);
        if(!$stm->execute()){
            die('Query error: ' . $stm->error);
        }
        return array('code' => 0, 'message' => 'active token success');
    }

    function is_username_exists($user){
        $sql = 'select username from employee where username = ?';
        $conn = open_database();

        $stm =$conn->prepare($sql);
        $stm->bind_param('s',$user);
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

    function register($user, $first, $last,$role,$department){
        if(is_username_exists($user)){
            return array('code' => 1, 'error' => 'Username exists');
        }
        $hash = password_hash($user,PASSWORD_DEFAULT);
        $pass_md5 = md5($user);    

        $sql = 'insert into employee(username, firstname, lastname,password,role,department,pass_md5) values(?,?,?,?,?,?,?)';
        $conn = open_database();

        $stm = $conn->prepare($sql);
        $stm->bind_param('sssssss',$user,$first,$last,$hash,$role,$department,$pass_md5);

        if(!$stm->execute()){
            return array('code' => 2, 'error' => 'Cant execute command');
        }

        return array('code' => 0, 'success' => 'Create account successful');
    }

    function change_password($newpass){
        $hash = password_hash($newpass,PASSWORD_DEFAULT);

        $sql = 'update employee set password = ?';
        $conn = open_database();

        $stm = $conn->prepare($sql);
        $stm->bind_param('s',$hash);
        if(!$stm->execute()){
            return array('code'=> 2, 'error' => 'Can not execute command.');
        }
        
        return array('code'=> 0,'success' => 'Password has changed.');
    }

    function get_info_employees(){
        $sql = "select * from employee ";
        $conn = open_database();

        $result = $conn->query($sql);
        
        $data = array();
        if($result->num_rows==0){
            return array('code'=>2,'error'=>'Database is empty');
        }else{
            while($row = $result->fetch_assoc()){
                $data[] = $row;
            }
        }
        return array('code'=>0,'data'=>$data);
        
    }

    function get_info_employee_byid($id){
        $sql = "select * from employee where id = ? ";
        $conn = open_database();

        $stm = $conn->prepare($sql);
        $stm->bind_param('i',$id);

        if(!$stm->execute()){
            return array('code'=>1,'error'=>'Command not execute');
        }

        $result = $stm->get_result();
        $data = array();
        if($result->num_rows==0){
            return array('code'=>2,'error'=>'Database is empty');
        }else{
            while($row = $result->fetch_assoc()){
                $data[] = $row;
            }
        }
        return array('code'=>0,'data'=>$data);
        
    }

    function get_departments(){
        $sql = "select * from department ";
        $conn = open_database();

        $result = $conn->query($sql);
        
        $data = array();
        if($result->num_rows==0){
            return array('code'=>2,'error'=>'Database is empty');
        }else{
            while($row = $result->fetch_assoc()){
                $data[] = $row;
            }
        }
        return array('code'=>0,'data'=>$data);
        
    }
    function get_absence_by_role($role){
        $sql = "SELECT absence_form.id, employee.username, role, create_date, number_dayoff,reason,file,status FROM employee RIGHT JOIN absence_form ON employee.username = absence_form.username where role = ?";
        $conn = open_database();

        $stm = $conn->prepare($sql);
        $stm->bind_param('s',$role);

        if(!$stm->execute()){
            return array('code'=>1,'error'=>'Command not execute');
        }

        $result = $stm->get_result();
        $data = array();
        if($result->num_rows==0){
            return array('code'=>2,'error'=>'Database is empty');
        }else{
            while($row = $result->fetch_assoc()){
                $data[] = $row;
            }
        }
        return array('code'=>0,'data'=>$data);
    }
    // function get_absence(){
    //     $sql = "select * from absence_form ";
    //     $conn = open_database();

    //     $result = $conn->query($sql);
        
    //     $data = array();
    //     if($result->num_rows==0){
    //         return array('code'=>2,'error'=>'Database is empty');
    //     }else{
    //         while($row = $result->fetch_assoc()){
    //             $data[] = $row;
    //         }
    //     }
    //     return array('code'=>0,'data'=>$data);
        
    // }

    function get_absence_byid($id){
        $sql = "select * from absence_form where id = ? ";
        $conn = open_database();

        $stm = $conn->prepare($sql);
        $stm->bind_param('i',$id);

        if(!$stm->execute()){
            return array('code'=>1,'error'=>'Command not execute');
        }

        $result = $stm->get_result();
        $data = array();
        if($result->num_rows==0){
            return array('code'=>2,'error'=>'Database is empty');
        }else{
            while($row = $result->fetch_assoc()){
                $data[] = $row;
            }
        }
        return array('code'=>0,'data'=>$data);
        
    }

    function get_absence_info_by_username($username){
        $sql = "select * from absence_info where username = ? ";
        $conn = open_database();

        $stm = $conn->prepare($sql);
        $stm->bind_param('s',$username);

        if(!$stm->execute()){
            return array('code'=>1,'error'=>'Command not execute');
        }

        $result = $stm->get_result();
        $data = array();
        if($result->num_rows==0){
            return array('code'=>2,'error'=>'Database is empty');
        }else{
            while($row = $result->fetch_assoc()){
                $data[] = $row;
            }
        }
        return array('code'=>0,'data'=>$data);
        
    }

    function add_absence_info($username){
        
        $sql = 'insert into absence_info(username) values(?)';
        $conn = open_database();

        $stm = $conn->prepare($sql);
        $stm->bind_param('s',$username);

        if(!$stm->execute()){
            return array('code'=>1,'error'=>'Command not execute');
        }
        
       
    }

    function status_ui($status){
       
        
        if($status=='Waiting'){
            echo "<td class='text-info'><i class='fas fa-spinner'></i> Waiting</td>";  
        }
        if($status=='Refused'){
            echo "<td class='text-danger'><i class='fas fa-exclamation'></i> Refused</td>";  
        }
        if($status=='Approved'){
            echo "<td class='text-success'><i class='fas fa-clipboard-check'></i> Approved</td>";  
        }
    }

    function get_tasks(){
        $sql = "select * from task ";
        $conn = open_database();

        $result = $conn->query($sql);
        
        $data = array();
        if($result->num_rows==0){
            return array('code'=>2,'error'=>'Database is empty');
        }else{
            while($row = $result->fetch_assoc()){
                $data[] = $row;
            }
        }
        return array('code'=>0,'data'=>$data);
        
    }
    
?> 