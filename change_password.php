<?php
    require_once('db.php');
    session_start();
?>
<DOCTYPE html>
<html lang="en">
<head>
    <title>Reset user password</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body style="background-color: #ccc;">
<?php
    $error = '';
    // $email = '';
    $pass = '';
    $pass_confirm = '';
    
    // $display_email = filter_input(INPUT_GET,'email',FILTER_SANITIZE_EMAIL);
    $post_error = '';
    $success= '';
    // if(isset($_GET['email']) && isset($_GET['token'])){
        // $email = $_GET['email'];
        // $token = $_GET['token'];
        
        // if(filter_var($email,FILTER_SANITIZE_EMAIL) === false){
            // $error = 'This isnt valid email';
        // }else if(strlen($token) !=32){
            // $error ='This isnt valid reset token';
        // }
        // else{ // xu li post
            if (isset($_POST['pass']) &&
                isset($_POST['pass-confirm'])) {

                // $email = $_POST['email'];
                $pass = $_POST['pass'];
                $pass_confirm = $_POST['pass-confirm'];

                // if (empty($email)) {
                //     $post_error = 'Please enter your email';
                // }
                // else if (filter_var($email, FILTER_VALIDATE_EMAIL) == false) {
                //     $post_error = 'This is not a valid email address';
                // }
                if (empty($pass)) {
                    $post_error = 'Please enter your password';
                }
                else if (strlen($pass) < 6) {
                    $post_error = 'Password must have at least 6 characters';
                }
                else if ($pass != $pass_confirm) {
                    $post_error = 'Password does not match';
                }
                else {
                    // echo 'Good';
                    $result = change_password($pass);
                    active_token($_SESSION['user']);
                    if($result['code'] == 0){
                        // $success = $result['success'] . ' <a href="login.php">Login</a>' ;
                        $success = $result['success'];
                        
                        header('Location: index.php');
                    }else{
                        $post_error = $result['error'];
                    }
                }
            }
            else {
                // print_r($_POST);
                // $error = 'Something went wrong';
            }
        // }
    // }else{
    //     $error = 'Invalid email or token';
    // }

    
?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">
            <h3 class="text-center text-secondary mt-5 mb-3">Change Password</h3>
            <?php 
                if(!empty($error)){
                    echo "<div class='alert alert-danger'>$error</div>";
                        
                }else{
                    ?>
                        <form novalidate method="post" action="" class="border rounded w-100 mb-5 mx-auto px-3 pt-3 bg-info">
                            <!-- <div class="form-group">
                                <label for="email">Email</label> -->
                                <!-- <input readonly value="sample@gmail.com" name="email" id="email" type="text" class="form-control" placeholder="Email address"> -->
                                <!-- <input readonly value="<?= $display_email ?>" name="email" id="email" type="text" class="form-control" placeholder="Email address">
                            </div> -->
                            <div class="form-group">
                                <label for="pass">Password</label>
                                <input  value="<?= $pass?>" name="pass" required class="form-control" type="password" placeholder="Password" id="pass">
                                <div class="invalid-feedback">Password is not valid.</div>
                            </div>
                            <div class="form-group">
                                <label for="pass2">Confirm Password</label>
                                <input value="<?= $pass_confirm?>" name="pass-confirm" required class="form-control" type="password" placeholder="Confirm Password" id="pass2">
                                <div class="invalid-feedback">Password is not valid.</div>
                            </div>
                            <div class="form-group">
                                <?php 
                                if(!empty($post_error)){
                                    echo "<div class='alert alert-danger'>$post_error</div>";
                                        
                                }
                                if(!empty($success)){
                                    echo "<div class='alert alert-success'>$success</div>";
                                        
                                }
                                ?>
                                <button class="btn btn-success px-5">Change password</button>
                            </div>
                        </form>
                    <?php
                }
            ?>
            

        </div>
    </div>
</div>

</body>
</html>