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
								<a class="nav-link " href="index.php">Account </a>
							</li>
							<li class="nav-item ">
								<a class="nav-link" href="department.php">Department</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="dayoff.php">Day off</a>
							</li>
						</ul>
					</div>
				</nav>
			</div>
			<div class="col-md-10 col-lg-10 col-xl-10 ">
				<div class="bg-light mt-4 text-dark p-2">
				<div class="admin-panel-section-header ">
					<h2>List Account</h2>
					<a class="addbtn"  data-toggle="modal" data-target="#add-movie">Add Accout</a>
				</div>
				<table cellpadding="10" cellspacing="10" border="1" style="width: 100%; margin-top:20px">
					<tr class="header">
						<td>ID</td>
						<td>Username</td>
						<td>Password</td>
						<td>Full Name</td>
						<td>Role</td>
						<td>Department Name</td>
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
</body>

</html>
