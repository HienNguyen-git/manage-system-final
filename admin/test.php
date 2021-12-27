<?php 
    require_once('db.php');
    // header('Location: detailEmployee.php?id=1');
    // print_r(employee('nguyenbibi'));
    // echo status_ui('Approved');
    // print_r(get_by_role('employee'));
    print_r(get_absence_by_role('manager'));

?>