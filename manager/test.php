<?php 
    require_once('../admin/db.php');

    // if(is_task_submitted(2)){
    //     echo "Submitted";
    // }else{
    //     echo "Not yet";
    // }
    // update_approval_date('hiengay');
    // print_r(get_taskdetail_byid(1));
    print_r(get_deparment_byuser('hiengay'));
    // print_r(get_employee_bydepartment('IT'));
    print_r(get_department_byuser('hiengay')['data']['department']);
?>