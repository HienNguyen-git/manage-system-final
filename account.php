<?php
    // session_start();
    // if (!isset($_SESSION['user'])) {
    //     header('Location: login.php');
    //     exit();
    // }
    // $user = $_SESSION['user'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<!-- <link rel="stylesheet" href="/style.css"> Sử dụng link tuyệt đối tính từ root, vì vậy có dấu / đầu tiên -->
	<link rel="stylesheet" href="style.css"> <!-- Change -->
	<title>Account Page</title>
</head>

    <body>
    <?php
        include_once('layout/header.php');
        $link = mysqli_connect("localhost", "root", "", "cinema_db");
        $sql = "SELECT * FROM account where username='$user'";
        $result = mysqli_fetch_assoc(mysqli_query($link, $sql));
        // print_r($result);

        $username = $result['username'];
        $firstname = $result['firstname'];
        $lastname = $result['lastname'];
        $email = $result['email'];
        $sdt = $result['sdt'];



        // [username] => mvmanh
        // [firstname] => Mai
        // [lastname] => Văn Mạnh
        // [email] => mvmanh@gmail.com
        // [sdt] => 123456789

    ?>
    <section class="container" style="height: 70vh;">
		<h1 class="mt-3 text-secondary">Account information</h1>
        <h3 class="mt-1 mb-3 pb-3 border-bottom border-info text-light" style="width: 54%;">Name of employee</h3>
        <a class="btn btn-primary btn-change-password" href="change_password.php">Change password</a>
        <div class="ml-auto mr-auto account-container">
            <div class="image-box">
                <img src="images/index.jpeg" alt="Avatar">
                <div class="image-action">
                <!-- '.$row['movieID'].' -->
                    <a style="display: block;" href="update_account.php?id=1"><i class="fas fa-images"></i> Change image</a>
                </div>
            </div>
            <table>
            <tr>
                <th>ID:</th>
                <td>1</td>
            </tr>
            <tr>
                <th>Username:</th>
                <td>employee1</td>
            </tr>
            <tr>
                <th>Full name:</th>
                <td>Nguyen Van A</td>
            </tr>
            <tr>
                <th>Role:</th>
                <td>CEO</td>
            </tr>
            <tr>
                <th>Department:</th>
                <td>Business Analyst</td>
            </tr>
        </table>
        </div>
    </section>

    <?php
        include_once('layout/footer.php');
    ?>
    <script src="scripts/jquery-3.3.1.min.js "></script>
    <script src="scripts/script.js "></script>
</body>
</html>