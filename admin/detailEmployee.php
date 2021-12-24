<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<!-- <link rel="stylesheet" href="/style.css"> Sử dụng link tuyệt đối tính từ root, vì vậy có dấu / đầu tiên -->
	<link rel="stylesheet" href="style2.css"> <!-- Change -->
	<title>Home Page</title>
</head>

<body>
    <?php
    /*
    $link = mysqli_connect("localhost", "root", "", "");
    $sql = "SELECT * FROM account where username='$user'";
    $result = mysqli_fetch_assoc(mysqli_query($link, $sql));
    // print_r($result);

    $username = $result['username'];
    $firstname = $result['firstname'];
    $lastname = $result['lastname'];
    $email = $result['email'];
    $sdt = $result['sdt'];
    */
    ?>
    <div class="container-fluid admin-section-header">	
        <div class="row">
			<div class="col-sm-10 col-md-10 col-lg-10 col-xl-10 admin-logo">

					Company System
			</div>
			<div class="col-sm-2 col-md-2 col-lg-2 col-xl-2 admin-login-info">

					<a href="#">Welcome, Admin</a>
			</div>
		</div>
		<div class="row h-100">
			<div class="  col-md-2 col-lg-2 col-xl-2  admin-section1">
				<nav class="  navbar-expand-lg navbar-light  ">
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
		
					<div class="collapse navbar-collapse" id="navbarSupportedContent">
						<ul class="navbar-nav" style="flex-direction: column;">
							<li class="nav-item active-menu">
								<a class="nav-link " href="index.php">Tài khoản </a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="department.php">Phòng ban</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="dayoff.php">Nghỉ phép</a>
							</li>
						</ul>
					</div>
				</nav>
			</div>
			<div class="col-md-10 col-lg-10 col-xl-10 ">
				<div class="bg-light mt-4 text-dark p-2">
				<div class="admin-panel-section-header ">
					<h2>Detail </h2>
					<a class="addbtn"  data-toggle="modal" data-target="#add-movie">Add Accout</a>
				</div>
				<div class="account-container">
                <table class="table-hover">
                    <tr>
                        <td>ID</td>
                        <td>1</td>
                        <!-- <td><?php echo $username; ?></td> -->

                    </tr>
                    <tr>
                        <td>Username</td>
                        <td>nguyenvana</td>
                        <!-- <td><?php echo $username; ?></td> -->
                    </tr>
                    <tr>
                        <td>Password</td>
                        <td>0908665356</td>

                        <!-- <td><?php echo $username; ?></td> -->
                    </tr>
                    <tr>
                        <td>Name</td>
                        <td>Nguyễn Văn A</td>

                        <!-- <td><?php echo $firstname.' '. $lastname; ?></td> -->
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>nguyenvana@gmail.com</td>

                        <!-- <td><?php echo $email ?></td> -->
                    </tr>
                    <tr>
                        <td>Phone number</td>
                        <td>0908665356</td>

                        <!-- <td><?php echo $sdt; ?></td> -->
                    </tr>
                    <tr>
                        <td>Job</td>
                        <td>Nhân viên</td>

                        <!-- <td><?php echo $sdt; ?></td> -->
                    </tr>
                    <tr>
                        <td>Department</td>
                        <td>Phòng kế toán</td>

                        <!-- <td><?php echo $sdt; ?></td> -->
                    </tr>
                    <tr>
                        <td>Day off</td>
                        <td>12</td>

                        <!-- <td><?php echo $sdt; ?></td> -->
                    </tr>
                </table>
        </div>
				</div>
			</div>		
		</div>
	</div>

	

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<!-- <script src="/main.js"></script> Sử dụng link tuyệt đối tính từ root, vì vậy có dấu / đầu tiên -->
	<script src="main.js"></script> <!-- Sử dụng link tuyệt đối tính từ root, vì vậy có dấu / đầu tiên -->
</body>

</html>
