<?php 
    require_once('db.php');
    // manager_to_employee('binhbinh');
    // print_r(current_manager('it'));
    // update_to_manager('bunnnguyen','it');
    // print_r(select_role_manager());
    // update_dayoff_manager();
    print_r(select_number_dayoff('nguyenbibi'));
    print_r(select_absence_info('nguyenbibi'));

    //admin
    //sửa ngày còn lại, đã sử dụng khi ấn agree,not agree trong absence request ở view detail
    //sửa department, role trong account chức năng add account

    //manager
    //làm những chức năng task
    //sửa ngày còn lại, đã sử dụng khi ấn agree,not agree trong absence request ở view detail
?>