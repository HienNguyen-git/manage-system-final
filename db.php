<?php

    define('HOST', '127.0.0.1');
    define('USER', 'root');
    define('PASS', '');
    define('DB', 'company');

    function open_database(){
        $conn = new mysqli(HOST, USER, PASS, DB);
        if($conn->connect_error){
            die('Fail to connect to database '. $conn->connect_error);
        }

        return $conn;
    }

    /////////////////////////////////
    function employee($user){
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
        return array('code' => 0, 'error' => '', 'data' => $data);
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
    

    function change_password($newpass,$user){
        $hash = password_hash($newpass,PASSWORD_DEFAULT);
        $pass_md5 = md5($newpass);

        $sql = 'update employee set password = ?, pass_md5 = ? where username = ?';
        $conn = open_database();

        $stm = $conn->prepare($sql);
        $stm->bind_param('sss',$hash,$user,$pass_md5);
        if(!$stm->execute()){
            return array('code'=> 2, 'error' => 'Can not execute command.');
        }
        
        return array('code'=> 0,'success' => 'Password has changed.');
    }
    function move_page($role){
        if($role == 'employee'){
            header('Location: index.php');
        }
        
        else if($role == 'manager'){
            header('Location: manager/index.php');
        }
        else{
            header('Location: admin/index.php');
        }
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
    ///////////////////////////

    
    function get_tasks($user){
        $sql = "select id, title, deadline, status from task where person=? ORDER BY deadline DESC";
        $conn = open_database();

        $stm = $conn->prepare($sql);
        $stm->bind_param('s',$user);

        if(!$stm->execute()){
            return array('code'=>1,'error'=>'Command not execute');
        }

        $result = $stm->get_result();
        $data = [];
        if($result->num_rows==0){
            return array('code'=>2,'error'=>'User not exist');
        }else{
            while($row = $result->fetch_assoc()){
                $data[] = $row;
            }
        }
        return array('code'=>0,'data'=>$data);
        
    }

    function get_task_by_id($id){
        $sql = "select title, description, deadline, file, status from task where id=?";
        $conn = open_database();

        $stm = $conn->prepare($sql);
        $stm->bind_param('i',$id);

        if(!$stm->execute()){
            return array('code'=>1,'error'=>'Command not execute');
        }

        $result = $stm->get_result();
        $data = $result->fetch_assoc();

        return array('code'=>0,'data'=>$data);
    }

    function get_absence_history($user){
        // 
        $sql = "select id, create_date, number_dayoff, reason, file, approval_date, status from absence_form where username=? ORDER BY create_date DESC";
        $conn = open_database();

        $stm = $conn->prepare($sql);
        $stm->bind_param('s',$user);

        if(!$stm->execute()){
            return array('code'=>1,'error'=>'Command not execute');
        }

        $result = $stm->get_result();
        $data = [];
        if($result->num_rows==0){
            return array('code'=>2,'error'=>'User not exist');
        }else{
            while($row = $result->fetch_assoc()){
                $data[] = $row;
            }
        }
        return array('code'=>0,'data'=>$data);
    }

    function get_absence_info($user){
        $sql = "select total_dayoff, dayoff_used, dayoff_left from absence_info where username=?";
        $conn = open_database();

        $stm = $conn->prepare($sql);
        $stm->bind_param('s',$user);

        if(!$stm->execute()){
            return array('code'=>1,'error'=>'Command not execute');
        }

        $result = $stm->get_result();
        $data = $result->fetch_assoc();

        return array('code'=>0,'data'=>$data);
    }

    function get_user_info($user){
        $sql = "select id, firstname, lastname, role, department, avatar from employee where username=?";
        $conn = open_database();

        $stm = $conn->prepare($sql);
        $stm->bind_param('s',$user);

        if(!$stm->execute()){
            return array('code'=>1,'error'=>'Command not execute');
        }

        $result = $stm->get_result();
        $data = $result->fetch_assoc();

        return array('code'=>0,'data'=>$data);
    }

    function change_to_waiting($id){
        $sql = "update task set status = 'Waiting' where id=?";
        $conn = open_database();

        $stm = $conn->prepare($sql);
        $stm->bind_param('i',$id);
        if(!$stm->execute()){
            return json_encode(array('code'=> 2, 'error' => 'Can not execute command.'));
        }
    }

    function status_ui($status){
        if($status=='New'){
            echo "<td class='text-primary'><i class='fas fa-thumbtack'></i> New</td>";  
        }
        if($status=='In progress'){
            echo "<td><i class='fas fa-cog fa-spin'></i> In progress</td>";  
        }
        if($status=='Waiting'){
            echo "<td class='text-info'><i class='fas fa-circle-notch fa-spin'></i> Waiting</td>";  
        }
        if($status=='Rejected'){
            echo "<td class='text-danger'><i class='fas fa-exclamation'></i> Rejected</td>";  
        }
        if($status=='Completed'){
            echo "<td class='text-success'><i class='fas fa-clipboard-check'></i> Completed</td>";  
        }
        if($status=='Approved'){
            echo "<td class='text-success'><i class='fas fa-check'></i> Approved</td>";  
        }
        if($status=='Refused'){
            echo "<td class='text-danger'><i class='fas fa-exclamation'></i> Refused</td>";  
        }
        if($status=='Canceled'){
            echo "<td class='text-muted'><i class='fas fa-times-circle'></i> Canceled</td>";  
        }
    }

    function submit_task($id_task,$description,$file){
            $sql = "insert into submit_task(id_task,description,file) values(?,?,?)";
            $conn = open_database();
    
            $stm = $conn->prepare($sql);
            $stm->bind_param('iss',$id_task,$description,$file);
            if(!$stm->execute()){
                return json_encode(array('code'=> 2, 'error' => 'Can not execute command.'));
            }
            change_to_waiting($id_task);
    }

    function update_avatar($user,$file){
        $sql = "update employee set avatar = ? where username = ?";
        $conn = open_database();

        $stm = $conn->prepare($sql);
        $stm->bind_param('ss',$file,$user);
        if(!$stm->execute()){
            return json_encode(array('code'=> 2, 'error' => 'Can not execute command.'));
        }
    }   
    
    function get_feedback_reject_task($id_task){
        $sql = "select description, file, extend_deadline from feedback_reject where id_task=?";
        $conn = open_database();

        $stm = $conn->prepare($sql);
        $stm->bind_param('i',$id_task);

        if(!$stm->execute()){
            return json_encode(array('code'=> 2, 'error' => 'Can not execute command.'));
        }

        $result = $stm->get_result();
        $data = $result->fetch_assoc();

        return array('code'=>0,'data'=>$data);
    }

    function is_approval($username){
        $sql = "SELECT approval_date FROM absence_form where username=? order by approval_date LIMIT 1; ";
        $conn = open_database();

        $stm = $conn->prepare($sql);
        $stm->bind_param('s',$username);

        if(!$stm->execute()){
            return json_encode(array('code'=> 2, 'error' => 'Can not execute command.'));
        }

        $result = $stm->get_result();
        $data = $result->fetch_assoc();

        return $data['approval_date'];
    }

    function unlock_absence_form_date($username){
        $sql = "SELECT DATE_ADD(approval_date, INTERVAL 7 DAY) as unlock_form_day from absence_form where username=? and status!='waiting' ORDER BY approval_date DESC LIMIT 1";
        $conn = open_database();

        $stm = $conn->prepare($sql);
        $stm->bind_param('s',$username);

        if(!$stm->execute()){
            return json_encode(array('code'=> 2, 'error' => 'Can not execute command.'));
        }

        $result = $stm->get_result();
        $data = $result->fetch_assoc();

        return $data['unlock_form_day'];
    }

    function is_absence_form_unlock($username){
        $date = unlock_absence_form_date($username);
        $today = date("Y-m-d H:i:s");

        $d1 = new DateTime($date);
        $d2 = new DateTime($today);

        return $d1<=$d2;
    }

    function submit_absence_form($user,$number_dayoff ,$reason,$file){
        $sql = "insert into absence_form(username,number_dayoff ,reason,file) values(?,?,?,?)";
        $conn = open_database();
        $stm = $conn->prepare($sql);
        $stm->bind_param('siss',$user,$number_dayoff ,$reason,$file);
        if(!$stm->execute()){
            return json_encode(array('code'=> 2, 'error' => 'Can not execute command.'));
        }

    }

?>