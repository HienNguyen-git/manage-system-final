<?php
    session_start();
    // if (isset($_SESSION['user'])) {
    //     header('Location: index.php');
    //     exit();
    // }

    require_once("db.php");

    $error = '';

    $user = '';
    $pass = '';

    if (isset($_POST['user']) && isset($_POST['pass'])) {
        $user = $_POST['user'];
        $pass = $_POST['pass'];

        if (empty($user)) {
            $error = 'Please enter your username';
        }
        else if (empty($pass)) {
            $error = 'Please enter your password';
        }
        else if (strlen($pass) < 6) {
            $error = 'Password must have at least 6 characters';
        }
        else {
            $result = login($user,$pass);
            if($result['code']==0){
                $data = $result['data'];
                $_SESSION['user'] = $user;
                $_SESSION['name'] = $data['firstname']. ' '.$data['lastname'];

                if(isset($_SESSION['bookingID'])){
                    $bookingID = $_SESSION['bookingID'];
                    header("Location: booking.php?id=$bookingID");
                }else{
                    header('Location: index.php');
                }
                exit();
            }else{
                $error = $result['error'];
            }
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>User Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> 
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <div class="row justify-content-center d-flex align-items-center h-75">
        <div class="col-md-6 col-lg-5">
            <h3 class="text-center text-secondary mt-5 mb-3">User Login</h3>
            <form class="border rounded w-100 mb-5 mx-auto px-3 pt-3 bg-info">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input id="username" type="text" class="form-control" placeholder="Username">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input id="password" type="password" class="form-control" placeholder="Password">
                </div>
                <div class="form-group">
                    <?php
                        if (!empty($error)) {
                            echo "<div class='alert alert-danger'>$error</div>";
                        }
                    ?>
                    <button class="btn btn-success px-5">Login</button>
                </div>
            </form>

        </div>
    </div>
</div>
</body>
</html>
