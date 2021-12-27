<?php
    session_start();
    if (!isset($_SESSION['user'])) {
        header('Location: ../login.php');
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

					<a href="../logout.php">Log out</a>
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
							<th>ID</th>
							<th>Username</th>
							
							<th>First Name</th>
							<th>Last Name</th>
							<th>Role</th>
							<th>Department Name</th>
							
							<th>Action</th>
						</tr>
						<tbody id="tbody">
							<tr class="item">
								<td>1</td>
								<td>nguyenvana</td>
								<td>Nguyễn</td>
								<td> Văn A</td>
								<td>Nhân viên</td>
								<td>Phòng kế toán</td>
								<!-- <td style="position: absolute;">
										<input  oninput="suggest(this.value)" type="text" class="form-control input-search-employee" placeholder="Nhập ít nhất 2 ký tự">
										<ul style="place-items: flex-start; " id="suggestions" class="list-group my-2">
											<li class="list-group-item">Vietnam</li>
											<li class="list-group-item">Vietnam</li>
											<li class="list-group-item">Vietnam</li>
											<li class="list-group-item">Vietnam</li>
											<li class="list-group-item">Vietnam</li>
										</ul>
										<a  href="#" class="btn btn-success">Update</a>
									
								</td> -->
								<!-- <td class="search-td" style="position: absolute; border: none;">
									<div >
										<input  oninput="suggest(this.value)" type="text" class="form-control input-search-employee" placeholder="Nhập ít nhất 2 ký tự">
										<ul style="place-items: flex-start;" id="suggestions" class="list-group my-2">
									
										</ul>
									</div>
									<a  href="#" class="btn btn-success">Update</a>
								</td> -->
								

								<td >
									<a href="#" class="btn btn-primary">Edit</a> | 
									<a href="#" class="btn btn-danger">Delete</a> |
									<a href="detailEmployee.php" class="btn btn-success">Detail</a>
								</td>
							</tr>
							<tr class="item">
								<td>1</td>
								<td>nguyenvana</td>
								<td>Nguyễn</td>
								<td> Văn A</td>
								<td>Nhân viên</td>
								<td>Phòng kế toán</td>
								<!-- <td style="position: absolute;">
										<input  oninput="suggest(this.value)" type="text" class="form-control input-search-employee" placeholder="Nhập ít nhất 2 ký tự">
										<ul style="place-items: flex-start; " id="suggestions" class="list-group my-2">
											<li class="list-group-item">Vietnam</li>
											<li class="list-group-item">Vietnam</li>
											<li class="list-group-item">Vietnam</li>
											<li class="list-group-item">Vietnam</li>
											<li class="list-group-item">Vietnam</li>
										</ul>
										<a  href="#" class="btn btn-success">Update</a>
									
								</td> -->
								<!-- <td class="search-td" style="position: absolute; border: none;">
									<div >
										<input  oninput="suggest(this.value)" type="text" class="form-control input-search-employee" placeholder="Nhập ít nhất 2 ký tự">
										<ul style="place-items: flex-start;" id="suggestions" class="list-group my-2">
									
										</ul>
									</div>
									<a  href="#" class="btn btn-success">Update</a>
								</td> -->
								

								<td >
									<a href="#" class="btn btn-primary">Edit</a> | 
									<a href="#" class="btn btn-danger">Delete</a> |
									<a href="detailEmployee.php" class="btn btn-success">Detail</a>
								</td>
							</tr>
							<tr class="item">
								<td>1</td>
								<td>nguyenvana</td>
								<td>Nguyễn</td>
								<td> Văn A</td>
								<td>Nhân viên</td>
								<td>Phòng kế toán</td>
								<!-- <td style="position: absolute;">
										<input  oninput="suggest(this.value)" type="text" class="form-control input-search-employee" placeholder="Nhập ít nhất 2 ký tự">
										<ul style="place-items: flex-start; " id="suggestions" class="list-group my-2">
											<li class="list-group-item">Vietnam</li>
											<li class="list-group-item">Vietnam</li>
											<li class="list-group-item">Vietnam</li>
											<li class="list-group-item">Vietnam</li>
											<li class="list-group-item">Vietnam</li>
										</ul>
										<a  href="#" class="btn btn-success">Update</a>
									
								</td> -->
								<!-- <td class="search-td" style="position: absolute; border: none;">
									<div >
										<input  oninput="suggest(this.value)" type="text" class="form-control input-search-employee" placeholder="Nhập ít nhất 2 ký tự">
										<ul style="place-items: flex-start;" id="suggestions" class="list-group my-2">
									
										</ul>
									</div>
									<a  href="#" class="btn btn-success">Update</a>
								</td> -->
								

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
	<!-- <script src="main.js"></script> Sử dụng link tuyệt đối tính từ root, vì vậy có dấu / đầu tiên -->

	<script>
        function suggest(value) {
			$.get(
			"searchEmployee.php?search-text=" + value,
			(data) => {
				$("#suggestions li").remove();
				data.forEach((country) => {
				let item = `<li onclick="handleClickLi(this)" class="list-group-item" style="cursor: pointer;">${capitalizeFirstLetter(
					country
				)}</li>`;
				$("#suggestions").append(item);
				});
			},
			"json"
			);
		}
		function capitalizeFirstLetter(string) {
			return string.charAt(0).toUpperCase() + string.slice(1);
		}

		// let listGroupItem;
		let inputSearch = document.querySelector('.input-search-employee')
		let listGroupItem = document.querySelectorAll('.list-group-item');
		// inputSearch.addEventListener('keypress', function(e) {

		// 	// console.log(listGroupItem);

		// 	listGroupItem.forEach((nameitem) => {
		// 		handleClickLi(nameitem);
		// 	})
		// })
	
		
		function handleClickLi(nameitem){
			inputSearch.value = nameitem.innerHTML;
			$("#suggestions li").remove();
		}
		// function removeItemLi(){

		// }
		// listGroupItem.forEach(nameitem => {
		// // console.log(nameitem);
		// 	nameitem.addEventListener('click', function(e){
		// 		console.log(e)
		// 		// e.target.classList.toggle('bg-green');
		// 		// console.log(e.currentTarget);
		// 	})
		// })
		// let	listGroupItem = document.querySelectorAll('.list-group-item');
		// console.log(listGroupItem);
		// listGroupItem.forEach(item => {
		// // console.log(item.innerHTML);
		// 	item.addEventListener('click',(e) => {
		// 		console.log(e.target);
		// 	})
		// })
		
		
    </script>
</body>

</html>
