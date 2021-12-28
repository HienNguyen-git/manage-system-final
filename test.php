<?php
    require_once('db.php');
	session_start();

    // print_r(get_absence_history('nguyentronghien')[0]) 
    if(!get_absence_history('nguyentronghien')['code']){
        $data = get_absence_history('nguyentronghien')['data'];
        print_r($data);
        echo count($data);
        
        
        echo "Hihih";
    }
    // echo unlock_absence_form_date('nguyentronghien');

    // if(is_absence_form_unlock('nguyentronghien')){
    //     echo 'Unlock';
    // }else{
    //     echo 'Lock';
    // }
?>