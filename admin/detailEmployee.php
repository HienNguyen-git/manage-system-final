<?php
    session_start();
    require_once('db.php');
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
			<div class="col-sm-1 col-md-1 col-lg-1 col-xl-1 admin-login-info">
    			<a href="#">Welcome, <?= $_SESSION['name'] ?></a>
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
			<div class="col-md-10 col-lg-10 col-xl-10 ">
				<div class="bg-light mt-4 text-dark p-2">
                    <div class="admin-panel-section-header ">
                        <h2>Detail Employee </h2>
                        
                        <!-- <a class="addbtn"  data-toggle="modal" data-target="#add-movie">Add Accout</a> -->
                    </div>
                    <div class="account-container">
                        <?php
                                $id = $_GET['id'];
                                $username = '';
                                $result = get_info_employee_byid($id);
                                // print_r($data);
                                if($result['code'] == 0){
                                    $data = $result['data'];
                                    foreach($data as $row){
                                        $username = $row['username'];
                                        // $id = $row['id'];
                                        ?>
                                    <table class="table-hover">
                                    <tr>
                                        <td>ID</td>
                                        <td><?= $row['id']?></td>
                                    </tr>
                                    <tr>
                                        <td>Username</td>
                                        <td><?= $row['username']?></td>
                                    </tr>
                                    <tr>
                                        <td>FirstName</td>
                                        <td><?= $row['firstname']?></td>
                                    </tr>
                                    <tr>
                                        <td>LastName</td>
                                        <td><?= $row['lastname']?></td>
                                    </tr>
                                    <tr>
                                        <td>Role</td>
                                        <td><?= $row['role']?></td>
                                    </tr>
                                    <tr>
                                        <td>Department</td>
                                        <td><?= $row['department']?></td>
                                    </tr>
                                    <tr>
                                        
                                        <td>
                                            
                                        </td>
                                    </tr>
                                    </table>
                                    <a id="btnReset" 

                                            class="addbtn"
                                            data-toggle="modal" 
                                            data-target="#reset-modal"
                                            onclick="handleTransferToDelete('<?= $username ?>')" 
                                    >
                                            Reset Password 
                                            
                                    </a>
                                    <?php
                                    }
                                } 
                                
                        ?>
                        <!-- Add Modal -->
                        <div id="reset-modal" class="modal fade" role="dialog">
                            <div class="modal-dialog">
                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <hp class="modal-title">Reset Password</hp>
                                        <button type="button" class="close" data-dismiss="modal" >&times;</button>
                                    </div>
                                    
                                        <div class="modal-body">
                                            <div class="modal-body">
                                                <p>Bạn có chắc rằng muốn reset password <strong class="name-resetpass"></strong> ?</p>
                                            </div>
                                            <div class="form-group">
                                                <a id="reset-btn" href="reset_password.php?username=<?=$username?>&id=<?=$id?>" class="btn btn-primary px-5 mr-2" >Reset</a>
                                            </div>
                                        </div>
                                </div>  
                            </div>
                        </div>    
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

    <script>
        const nameResetpass = document.querySelector('.name-resetpass');
        let currentUsernme;
        function handleTransferToDelete(name){
            nameResetpass.innerHTML = name;
            currentUsernme = name;
        }
        // $('#reset-btn').click(function(){
        //     $.ajax({
        //         type: "POST",
        //         url: "reset_password.php.php",
        //         data: JSON.stringify({username: currentUsernme}),
        //         success: function(data) {
        //             // console.log(data);
        //             $('#reset-modal').modal('hide');
        //             // loadproduct();
        //         },
        //         dataType: 'json'
        //     })
        // })
    </script>
</body>

</html>
