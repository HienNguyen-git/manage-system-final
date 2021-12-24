<?php 
    require_once('db.php');
    echo is_password_changed('hiengay');
    print_r(active_token('hiengay'));

?>