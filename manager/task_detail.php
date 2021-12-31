<?php
    require_once('../admin/db.php');
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
	<link rel="stylesheet" href="../admin/style2.css"> <!-- Change -->
	<title>Home Page</title>
</head>

<body>
    <div class="container-fluid admin-section-header">	
        <div class="row">
            <div class="col-sm-10 col-md-10 col-lg-10 col-xl-10 admin-logo">
				Company System
			</div>
			<div class="col-sm-1 col-md-1 col-lg-1 col-xl-1 admin-login-info">
				<a href="account.php">Welcome, <?= $_SESSION['name'] ?></a>
			</div>
			<div class="col-sm-1 col-md-1 col-lg-1 col-xl-1 admin-login-info">
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
								<a class="nav-link p20" href="index.php"><i class="fas fa-tasks"></i>List Task</a>
							</li>
							<li class="nav-item">
								<a class="nav-link p20" href="task_submit.php"><i class="fas fa-tasks"></i>Task submit</a>
							</li>
							<li class="nav-item">
								<a class="nav-link p20" href="dayoff.php"><i class="fas fa-address-book"></i>  Absence Request</a>
							</li>
						</ul>
					</div>
				</nav>
			</div>
			<div class="col-md-10 col-lg-10 col-xl-10 ">
				<div class="bg-light mt-4 text-dark p-2">
                    <div class="admin-panel-section-header ">
                        <h2>Detail </h2>
                    </div>
                    <div class="account-container">
                        <table class="table-hover">
                            <?php 
                                $id = $_GET['id'];
                                $result = get_taskdetail_byid($id); 
                                if($result['code'] == 0){
                                    $data = $result['data'];
                                    foreach($data as $row){
                                        // $username = $row['username'];
                                            ?>    
                                                <tr>
                                                    <td>ID</td>
                                                    <td><?= $row['id']?></td>
                                                </tr>
                                                <tr>
                                                    <td>Title</td>
                                                    <td><?= $row['title']?></td>
                                                </tr>
                                                <tr>
                                                    <td>Description</td>
                                                    <td><?= $row['description']?></td>
                                                </tr>
                                                <tr>
                                                    <td>Person</td>
                                                    <td><?= $row['person']?></td>
                                                </tr>
                                                <tr>
                                                    <td>Deadline</td>
                                                    <td><?= $row['deadline']?></td>
                                                </tr>
                                                <tr>
                                                    <td>File</td>
                                                    <?php 
                                                        $fileExplode = explode('/', $row['file']);
                                                        // print_r($fileExplode[2]);
                                                        // $filename = 
                                                    ?>
                                                    <td><a href="<?=$row['file']?>"><?=$fileExplode[2]?></a></td>
                                                </tr>
                                                <tr>
                                                    <td>Status</td>
                                                    <?=status_ui($row['status'])  ?></td>
                                                </tr>
                                            <?php
                                    }
                                }
                            ?>
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
	<!-- <script src="main.js"></script> Sử dụng link tuyệt đối tính từ root, vì vậy có dấu / đầu tiên -->
</body>

</html>
