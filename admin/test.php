<?php 
    require_once('db.php');
    // header('Location: detailEmployee.php?id=1');
    // print_r(employee('nguyenbibi'));
    // echo status_ui('Approved');
    // print_r(get_by_role('employee'));
    // print_r(get_info_employee_byid(1));

    echo (md5('1234566') . '<br></br>');
    function change_password($newpass){
        $hash = password_hash($newpass,PASSWORD_DEFAULT);
        $pass_md5 = md5($newpass);
        echo $hash . '<br></br>';
        echo $pass_md5;
        
    }
    change_password('123456');
?>