<?php
    function oldpass($pass){
        $hash = password_hash($pass,PASSWORD_BCRYPT);
        // $hashed_password = $pass;
        // if(!password_verify($pass,$hashed_password)){
        //     return array('code' => 3, 'error' => 'Invalid password'); // pass sai
        // }
        return $hash;
    }
    echo oldpass('12345') . '<br></br>';
    echo password_hash('12345',PASSWORD_BCRYPT);
?>