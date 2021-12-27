<?php 
    require_once('db.php');
    // $input = json_decode(file_get_contents('php://input'));
    // $user = $input->username;
    // echo $user;
    // die();

    if(isset($_GET['username']) && isset($_GET['id'])){
        $user = $_GET['username'];
        $id = $_GET['id'];
        echo $id;

        $hash = password_hash($user,PASSWORD_DEFAULT);
        $sql = 'update employee set activated = 0, password = ? where username = ?';
        $conn = open_database();
    
        $stm= $conn->prepare($sql);
        $stm->bind_param('ss',$hash,$user);
    
        if(!$stm->execute()){
            return array('code' => 2, 'error' => 'Cant execute command');
        }
        echo('hi');
        // header('Location: detailEmployee.php');
        // return array('code' => 0, 'success' => 'Password reset');
    }


?>