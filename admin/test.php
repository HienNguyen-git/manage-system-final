<?php 
<<<<<<< HEAD
    require_once('db.php');
    // manager_to_employee('binhbinh');
    // print_r(current_manager('it'));
    // update_to_manager('bunnnguyen','it');
    // print_r(select_role_manager());
    // update_dayoff_manager();
    // print_r(select_number_dayoff('nguyenbibi'));
    // var_dump(select_absence_info('nguyenbibi')['dayoff_used']);
    // select_absence_info($user)['dayoff_used']
    // update_dayused('nguyenbibi');
    // print_r(select_manager_name('IT'));

    //admin
    //sửa ngày còn lại, đã sử dụng khi ấn agree,not agree trong absence request ở view detail
    //sửa department, role trong account chức năng add account

    //manager
    //làm những chức năng task
    //sửa ngày còn lại, đã sử dụng khi ấn agree,not agree trong absence request ở view detail
=======
    require_once('../admin/db.php');

    update_approval_date('hiengay');
>>>>>>> 7d3c31ca18b71c970fb014ca90df2b8beb75486d
?>