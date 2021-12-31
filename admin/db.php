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

    function register($user, $first, $last,$department){
        if(is_username_exists($user)){
            return array('code' => 1, 'error' => 'Username exists');
        }
        $hash = password_hash($user,PASSWORD_DEFAULT);
        $pass_md5 = md5($user);    

        $sql = 'insert into employee(username, firstname, lastname,password,department,pass_md5) values(?,?,?,?,?,?)';
        $conn = open_database();

        $stm = $conn->prepare($sql);
        $stm->bind_param('ssssss',$user,$first,$last,$hash,$department,$pass_md5);

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
        if($status=='Good'){
            echo "<td style='color: #f06595;'><i class='fas fa-heart'></i> Good</td>";  
        }
        if($status=='OK'){
            echo "<td class='text-primary'><i class='fas fa-thumbs-up'></i> OK</td>";  
        }
        if($status=='Bad'){
            echo "<td class='text-danger'><i class='fas fa-thumbs-down'></i> Bad</td>";  
        }
        if($status=='On time'){
            echo "<td class='text-success'><i class='fas fa-clock'></i> On time</td>";  
        }
        if($status=='Late'){
            echo "<td class='text-muted'><i class='fas fa-calendar-times'></i> Late</td>";  
        }
    }

    function get_tasks(){
        $sql = "select * from task";
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

    function get_task_by_order(){
        $sql = "select * from task where  ORDER BY id DESC";
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
    
    function manager_to_employee($department){
        $sql = "update employee set role = 'employee' where department = ?";
        $conn = open_database();
         
        $stm = $conn->prepare($sql);
        $stm->bind_param('s',$department);
        if(!$stm->execute()){
            return array('code'=>1,'error'=>'Command not execute');
        }
        return array('code'=>0,'success'=>'success');
    }

    function update_to_manager($user,$department){
        manager_to_employee($department);
        
        $sql = "update employee set role = 'manager' where username = ?";
        $conn = open_database();

        $stm = $conn->prepare($sql);
        $stm->bind_param('s',$user);
        if(!$stm->execute()){
            return array('code'=>1,'error'=>'Command not execute');
        }
    }

    function get_department_name_list(){
        $sql = "select name from department";
        $conn = open_database();

        $result = $conn->query($sql);
        $data = array();
        if($result->num_rows == 0){
            return array('code'=>2,'error'=>'Database is empty');
        }else{
            while($row = $result->fetch_assoc()){
                $data[] = $row;
            }
        }
        return array('code'=>0,'data'=>$data);
    }
    function select_role_manager(){
        $sql = "select e.username, a.username,role from employee e, absence_info a where e.username = a.username AND role = 'manager'";
        $conn = open_database();

        $result = $conn->query($sql);
        $data = array();
        if($result->num_rows == 0){
            return array('code'=>2,'error'=>'Database is empty');
        }else{
            while($row = $result->fetch_assoc()){
                // print_r($row) ;
                $data[] = $row['username'];
            }
        }
        return $data;
        // return array('code'=>0,'data'=>$data);
    }

    function update_dayoff_manager(){
        $sql = "UPDATE employee e,absence_info a set total_dayoff = 15 where e.username = a.username AND role = 'manager'";
        $conn = open_database();

        $conn->query($sql);
        
    }
    function update_dayoff_employee(){
        $sql = "UPDATE employee e,absence_info a set total_dayoff = 12 where e.username = a.username AND role = 'manager'";
        $conn = open_database();

        $conn->query($sql);
    }
    function select_number_dayoff($user){
        $sql = "select number_dayoff from absence_form where username = ?";
        $conn = open_database();

        $stm = $conn->prepare($sql);
        $stm->bind_param('s',$user);

        if(!$stm->execute()){
            return array('code'=>1,'error'=>'Command not execute');
        }

        $result = $stm->get_result();
        
        if($result->num_rows==0){
            return array('code'=>2,'error'=>'Database is empty');
        }else{
            $row = $result->fetch_assoc();
            return $row['number_dayoff'];
        }
    }
    function select_absence_info($user){
        $sql = "select * from absence_info where username = ?";
        $conn = open_database();

        $stm = $conn->prepare($sql);
        $stm->bind_param('s',$user);

        if(!$stm->execute()){
            return array('code'=>1,'error'=>'Command not execute');
        }

        $result = $stm->get_result();
        
        if($result->num_rows==0){
            return array('code'=>2,'error'=>'Database is empty');
        }else{
            $row = $result->fetch_assoc();
            return $row;
        }
    }
    
    function update_dayused($user){
        $number_dayoff = select_number_dayoff($user);
        $data_absence = select_absence_info($user);
        $day_off_used = $data_absence['dayoff_used'];
        $upd_total_dayused = $day_off_used + $number_dayoff;
        $day_off_left = $data_absence['dayoff_left'];
        $upd_total_dayleft = $day_off_left - $number_dayoff;
        
        $sql = "update absence_info set dayoff_used = ?, dayoff_left = ? where username = ?";
        $conn = open_database();

        $stm = $conn->prepare($sql);
        $stm->bind_param('iis',$upd_total_dayused,$upd_total_dayleft,$user);

        if(!$stm->execute()){
            return array('code'=>1,'error'=>'Command not execute');
        }

        update_approval_date($user);
    }

    function update_approval_date($user){
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $today = date("Y-m-d H:i:s");
        $sql = "update absence_form set approval_date = ? where username = ?";
        $conn = open_database();

        $stm = $conn->prepare($sql);
        $stm->bind_param('ss',$today,$user);

        if(!$stm->execute()){
            return array('code'=>1,'error'=>'Command not execute');
        }
    }

    //manager
    function get_taskdetail_byid($id){
        $sql = 'select * from task where id = ?';
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

    function get_task_detail($id){
        $sql = "SELECT * FROM task where id=?";
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
    
    function get_department_byuser($user){
        $sql = "select department from employee where username = ? ";
        $conn = open_database();

        $stm = $conn->prepare($sql);
        $stm->bind_param('s',$user);

        if(!$stm->execute()){
            return array('code'=>1,'error'=>'Command not execute');
        }

        $result = $stm->get_result();
        $data = $result->fetch_assoc();

        return $data;
    }

    function convert_to_filename($name){
        return explode("/",$name)[1];
    }

    function get_submit_list_by_id($id_task){
        $sql = "SELECT * FROM submit_task where id_task=? ORDER BY submit_day ASC";
        $conn = open_database();

        $stm = $conn->prepare($sql);
        $stm->bind_param('i',$id_task);

        if(!$stm->execute()){
            return json_encode(array('code'=> 2, 'error' => 'Can not execute command.'));
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

    function is_task_submitted($id_task){
        $sql = "SELECT * FROM  submit_task where id_task=?";
        $conn = open_database();

        $stm = $conn->prepare($sql);
        $stm->bind_param('i',$id_task);

        if(!$stm->execute()){
            return json_encode(array('code'=> 2, 'error' => 'Can not execute command.'));
        }

        $result = $stm->get_result();
        return $result->num_rows>0;
    }
        
    function get_employee_bydepartment($department){
        $sql = "select username from employee where department = ? AND role = 'employee'";
        $conn = open_database();

        $stm = $conn->prepare($sql);
        $stm->bind_param('s',$department);

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
    
    function add_task($title,$description,$person,$deadline,$file){
        $sql = "insert into task(title,description,person,deadline,file) values(?,?,?,?,?)";
        $conn = open_database();

        $stm = $conn->prepare($sql);
        $stm->bind_param('sssss',$title,$description,$person,$deadline,$file);
        if(!$stm->execute()){
            return json_encode(array('code'=> 2, 'error' => 'Can not execute command.'));
        }
        return array('code'=>0,'success'=>'Add task successfully!');
    }


?> 