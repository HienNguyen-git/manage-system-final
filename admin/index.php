<?php
    session_start();
    if (!isset($_SESSION['user'])) {
        header('Location: login.php');
        exit();
    }
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
	<!-- <link rel="stylesheet" href="/style.css"> Sử dụng link tuyệt đối tính từ root, vì vậy có dấu / đầu tiên -->
	<link rel="stylesheet" href="style2.css"> <!-- Change -->
	<title>Home Page</title>
</head>

<body>

    <div class="container-fluid admin-section-header">	
        <div class="row">
			<div class="col-sm-12 col-md-10 col-lg-10 col-xl-10 admin-logo">

					Company System
			</div>
			<div class="col-sm-12 col-md-1 col-lg-1 col-xl-1 admin-login-info">

					<a href="#">Welcome, <?= $_SESSION['name'] ?></a>
			</div>
			<div class="col-sm-12 col-md-1 col-lg-1 col-xl-1 admin-login-info">

					<a href="logout.php">Log out</a>
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
								<a class="nav-link p20" href="index.php"><i class="fas fa-user"></i>  Account </a>
							</li>
							<li class="nav-item ">
								<a class="nav-link p20" href="department.php"> <i class="fas fa-building"></i>  Department</a>
							</li>
							<li class="nav-item">
								<a class="nav-link p20" href="dayoff.php"><i class="fas fa-address-book"></i>  Absence Request</a>
							</li>
						</ul>
					</div>
				</nav>
			</div>
			<div class="col-md-10 col-lg-10 col-xl-10   " >
				<div class="bg-light mt-4 text-dark p-2 " style="width: 100%; overflow-x:scroll">
					<div class="admin-panel-section-header ">
						<h2>List Account</h2>
						<a href="register.php" class="addbtn" >Add Accout</a>
					</div>
					<table class="table-hover text-center pc-table"   border="1" >
						<tr class="header">
							<td>ID</td>
							<td>Username</td>
							<td>Password</td>
							<td>Full Name</td>
							<td>Role</td>
							<td>Department Name</td>
							<td>Manager</td>
							<td>Action</td>
						</tr>
						<tbody id="tbody">
							<tr class="item">
								<td>1</td>
								<td>nguyenvana</td>
								<td>0908665356</td>
								<td>Nguyễn Văn A</td>
								<td>Nhân viên</td>
								<td>Phòng kế toán</td>
								<td>
								<input oninput="suggest(this.value)" type="text" class="form-control" placeholder="Nhập ít nhất 2 ký tự">
								<ul id="suggestions" class="list-group my-2">
									<li class="list-group-item">Vietnam</li>
									<li class="list-group-item">Lao</li>
									<li class="list-group-item">Cambodia</li>
									<li class="list-group-item">Singapore</li>
								</ul>
								</td>

								<td >
									<a href="#" class="btn btn-primary">Edit</a> | 
									<a href="#" class="btn btn-danger">Delete</a> |
									<a href="detailEmployee.php" class="btn btn-success">Detail</a>
								</td>
							</tr>
							<tr class="item">
								<td>1</td>
								<td>nguyenvana</td>
								<td>0908665356</td>
								<td>Nguyễn Văn A</td>
								<td>Nhân viên</td>
								<td>Phòng kế toán</td>
								<td>
								<input oninput="suggest(this.value)" type="text" class="form-control" placeholder="Nhập ít nhất 2 ký tự">

								</td>
								<td >
									<a href="#" class="btn btn-primary">Edit</a> | 
									<a href="#" class="btn btn-danger">Delete</a> |
									<a href="detailEmployee.php" class="btn btn-success">Detail</a>

								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>		
		</div>
	</div>

	

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<!-- <script src="/main.js"></script> Sử dụng link tuyệt đối tính từ root, vì vậy có dấu / đầu tiên -->
	<script src="main.js"></script> <!-- Sử dụng link tuyệt đối tính từ root, vì vậy có dấu / đầu tiên -->

	<script>
        function suggest(value){
			
            $.get( "list.php?search-text=" + value.toLowerCase(), function( data ) {
                $('.list-group-item').remove();
                data.forEach((country) => {
                    let item = $('<li class="list-group-item">'+country+'</li>');
                    $('#suggestions').append(item);
                });
            },"json");
                
        }
    </script>
</body>

</html>
