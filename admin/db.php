<?php
    //Import PHPMailer classes into the global namespace
    //These must be at the top of your script, not inside a function
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
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
        $sql = "select * from account where username = ?";
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
        // else if($data['activated'] == 0){
        //     return array('code' => 4, 'error' => 'This account isnt activated');
        // }
        else {
            return array('code' => 0, 'error' => '', 'data' => $data);
        }
    }

    function is_email_exists($email){
        $sql = 'select username from account where email = ?';
        $conn = open_database();

        $stm =$conn->prepare($sql);
        $stm->bind_param('s',$email);
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

    function register($user, $pass, $first, $last, $email){
        if(is_email_exists($email)){
            return array('code' => 1, 'error' => 'Email exists');
        }
        $hash = password_hash($pass,PASSWORD_DEFAULT);
        $rand = random_int(0,1000);
        $token = md5($user . '+' . $rand);

        $sql = 'insert into account(username, firstname, lastname, email, password, activate_token) values(?,?,?,?,?,?)';
        $conn = open_database();

        $stm = $conn->prepare($sql);
        $stm->bind_param('ssssss',$user,$first,$last,$email,$hash,$token);

        if(!$stm->execute()){
            return array('code' => 2, 'error' => 'Cant execute command');
        }

        // send email verification
        // send_activation_email($email,$token);

        return array('code' => 0, 'success' => 'Create account successful');
    }

    // function send_activation_email($email, $token){
    //     //Load Composer's autoloader
    //     require 'vendor/autoload.php';

    //     //Create an instance; passing `true` enables exceptions
    //     $mail = new PHPMailer(true);

    //     try {
    //         //Server settings
    //         // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    //         $mail->CharSet = 'UTF-8';
    //         $mail->isSMTP();                                            //Send using SMTP
    //         $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    //         $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    //         $mail->Username   = 'nchdang16012001@gmail.com';                     //SMTP username
    //         $mail->Password   = 'jtxwizaratyvnjpa';                               //SMTP password
    //         $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    //         $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //         //Recipients
    //         $mail->setFrom('nchdang16012001@gmail.com', 'Admin web ban hang');
    //         $mail->addAddress($email, 'Ng nhận');     //Add a recipient
    //         // $mail->addAddress('ellen@example.com');               //Name is optional
    //         // $mail->addReplyTo('info@example.com', 'Information');
    //         // $mail->addCC('cc@example.com');
    //         // $mail->addBCC('bcc@example.com');

    //         // //Attachments
    //         // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    //         // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //         //Content
    //         $mail->isHTML(true);                                  //Set email format to HTML
    //         $mail->Subject = 'Verify your account';
    //         $mail->Body    = "Click <a href='http://localhost/Lab08/source%20code/activate.php?email=$email&token=$token'>here</a> here to activate your account";
    //         // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    //         $mail->send();
    //         // echo 'Message has been sent';
    //         return true;
    //     } catch (Exception $e) {
    //         // echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    //         return false;
    //     }
    // }

    // function active_account($email,$token){
    //     $sql = 'select username from account where email = ? and activate_token = ? and activated = 0';
    //     $conn = open_database();

    //     $stm = $conn->prepare($sql);
    //     $stm->bind_param('ss',$email,$token);

    //     if(!$stm->execute()){
    //         return array('code'=>1, 'error'=>'Cant execute command');
    //     }
    //     $result = $stm->get_result();
    //     if($result->num_rows == 0){
    //         return array('code'=> 2, 'error'=>'Email address or token isnt found');
    //     }

    //     //found
    //     $sql = "update account set activated = 1, activate_token = '' where email = ?";

    //     $stm = $conn->prepare($sql);
    //     $stm->bind_param('s',$email);
    //     if(!$stm->execute()){
    //         return array('code'=>1, 'error'=>'Cant execute command');
    //     }
    //     return array('code'=> 0, 'success'=>'Account activated');


    // }

    function send_reset_email($email, $token){
        //Load Composer's autoloader
        require 'vendor/autoload.php';

        //Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer(true);

        try {
            //Server settings
            // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $mail->CharSet = 'UTF-8';
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'nchdang16012001@gmail.com';                     //SMTP username
            $mail->Password   = 'jtxwizaratyvnjpa';                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom('nchdang16012001@gmail.com', 'Admin web ban hang');
            $mail->addAddress($email, 'Ng nhận');     //Add a recipient
            // $mail->addAddress('ellen@example.com');               //Name is optional
            // $mail->addReplyTo('info@example.com', 'Information');
            // $mail->addCC('cc@example.com');
            // $mail->addBCC('bcc@example.com');

            // //Attachments
            // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
            // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Recovery your password';
            $mail->Body    = "Click <a href='http://localhost/Lab08/source%20code/reset_password.php?email=$email&token=$token'>here</a> to recover your password";
            // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
            // echo 'Message has been sent';
            return true;
        } catch (Exception $e) {
            // echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            return false;
        }
    }

    function reset_password($email){
        if(!is_email_exists($email)){
            return array('code' => 1, 'error' => 'Email doesnt exist');

        }
        $token = md5($email. '+'. random_int(1000,2000));
        $sql = 'update reset_token set token = ? where email = ?';
        $conn = open_database();

        $stm= $conn->prepare($sql);
        $stm->bind_param('ss',$token,$email);

        if(!$stm->execute()){
            return array('code' => 2, 'error' => 'Cant execute command');
        }
        if($stm->affected_rows ==0){
            // chua co dong nao cua email nay ta se them dong moi
            $exp = time() + 3600 * 24; //hết hạn sau 24h
            $sql = 'insert into reset_token values(?,?,?)';

            $stm = $conn->prepare($sql);
            $stm->bind_param('ssi',$email,$token,$exp);

            if(!$stm->execute()){
                return array('code' => 2, 'error' => 'Cant execute command');

            }
        }
        // chèn thành công or update token của dòng đã có, gửi mail tới user để reset pass
        $success = send_reset_email($email,$token);
        return array('code' => 0, 'success' => $success);



    }

    function change_password($newpass){
        // if(!is_email_exists($email)){
        //     return array('code' => 1, 'error' => 'Email doesnt exist');
        // }
        $hash = password_hash($newpass,PASSWORD_DEFAULT);

        $sql = 'update account set password = ?';
        $conn = open_database();

        $stm = $conn->prepare($sql);
        $stm->bind_param('s',$hash);
        if(!$stm->execute()){
            return array('code'=> 2, 'error' => 'Can not execute command.');
        }

        return array('code'=> 0,'success' => 'Password has changed.');



    }

    function add_product($name,$price,$description,$image){
        $sql = 'insert into product(name,price,description,image) values (?,?,?,?)';
        $conn = open_database();

        $stm = $conn->prepare($sql);
        $stm->bind_param('siss',$name,$price,$description,$image);
        if(!$stm->execute()){
            return array('code'=>1,'error'=>'Can not execute command');
        }
        return array('code'=>0,'success'=>'Add product successfully!');
    }
    function update_product($name,$price,$description,$image,$id){
        $sql = 'update product set name =? ,price = ?,description =?,image = ? where id = ?';
        $conn = open_database();

        $stm = $conn->prepare($sql);
        $stm->bind_param('sissi',$name,$price,$description,$image,$id);
        if(!$stm->execute()){
            return array('code'=>1,'error'=>'Can not execute command');
        }
        return array('code'=>0,'success'=>'Update product successfully!');
    }
    function delete_product($name){
        // $sql = 'delete from product where name = ?';
        // $conn = open_database();

        // $stm = $conn->prepare($sql);
        // $stm->bind_param('s',$name);
        // if(!$stm->execute()){
        //     return array('code'=>1,'error'=>'Can not execute command');
        // }
        // if($stm->affected_rows == 0){
        //     return array('code'=>2,'error'=>'No product found with this id');
        // }
        // return array('code'=>0,'success'=>'Delete product successfully!');
        $sql = 'delete from product where name=?';

        $conn = open_database();
        $stm = $conn->prepare($sql);
        $stm->bind_param('s',$name);

        if(!$stm->execute()){
            return array('code'=>1,'error'=>'Cannot execute command');
        }

        return array('code'=>0,'success'=>'Delete product successfully');
    }
?> 