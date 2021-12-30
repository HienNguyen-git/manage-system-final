<?php
	require_once('../admin/db.php');
    session_start();
	
	$user =get_info_employee_byuser($_SESSION['user']);
    if (!isset($_SESSION['user'])) {
        header('Location: ../login.php');
        exit();
    }
	if( !is_password_changed($_SESSION['user']) ){
		header('Location: ../change_password.php');
		exit();
	}
	else if($user['role'] != 'manager' ){
        move_page_manager($user['role']);
        exit();
    }
	function move_page_manager($role){
        if($role == 'employee'){
			header('Location: ../index.php');
		}
		else if($role == 'manager'){
			header('Location: .index.php');
		}
		else{
			header('Location: ../admin/index.php');
		}
    }
	$department = get_deparment_byuser($_SESSION['user'])['department'];
	// print_r($department);
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
						</form>
					</div>
				</nav>
			</div>
			<div class="col-md-10 col-lg-10 col-xl-10  ">
				<div class="bg-light mt-4 text-dark p-2">
					<div class="admin-panel-section-header">
						<h2>List Tasks</h2>
						<a class="addbtn"  data-toggle="modal" data-target="#add-task">Add Task</a>
					</div>
					<table class="table-hover" cellpadding="10" cellspacing="10" border="1" style="width: 100%; margin-top:20px">
						<tr class="header">
							<td>ID</td>
							<td>Title</td>
							<td>Person</td>
							<td>Deadline</td>
							<td>Action</td>
						</tr>
						<tbody id="tbody">
							<?php 
								$result = get_tasks(); 
								if($result['code'] == 0){
									$data = $result['data'];
									foreach($data as $row){
										// print_r($row['id']) ;
										?>
										<tr class="item">
											<td><?= $row['id'] ?></td>
											<td><?= $row['title'] ?></td>
											<td><?= $row['person'] ?></td>
											<td><?= $row['deadline'] ?></td>
											
											<td >
												<a href="task_detail.php?id=<?= $row['id']?>" class="btn btn-success">View detail</a>
											</td>
										</tr>
										<?php
									}
								}
							?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
    </div>
	
	<!-- Add Modal -->
	<div id="add-task" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <hp class="modal-title">Add Task</hp>
                    <button type="button" class="close" data-dismiss="modal" >&times;</button>
                </div>
                <form id="add-form" method="post" novalidate enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="taskTitleAdd">Title Task</label>
                            <input name="taskTitleAdd" required class="form-control" type="text" placeholder="Department Name" id="taskTitleAdd">
                        </div>
						<div class="form-group">
							<label for="taskDetailAdd">Detail Task</label>
							<textarea id="taskDetailAdd" name="taskDetailAdd" rows="4" class="form-control" placeholder="Department Detail"></textarea>
						</div>
                        <div class="form-group">
                            <label for="deadlineAdd">Deadline</label>
                            <input name="deadlineAdd" required class="form-control" type="date" placeholder="Department Number" id="deadlineAdd">
                        </div>
						<div class="form-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="file" id="file">
                                <label class="custom-file-label" for="file">Choose file</label>
                            </div>
                        </div>
						
						<div class="form-group">
                            <label for="taskEmployeeAdd">Employee Name</label>
							<select id="taskEmployeeAdd" class="form-control" name="taskEmployeeAdd" required>
								<option value="" disabled selected>Employee Name</option>
								<?php 
									$result = get_employee_bydepartment($department);
									// print_r($result);
									if($result['code'] == 0){
										$data = $result['data'];
										foreach($data as $row){
											// print_r($row['username']);
											?>
												<option value="<?= $row['username'] ?>" ><?= $row['username'] ?></option>
											<?php
										}
									}
								?>
							</select>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary px-5 mr-2">Add</button>
                        </div>
                    </div>
                </form>
            </div>  
        </div>
    </div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<!-- <script src="/main.js"></script> Sử dụng link tuyệt đối tính từ root, vì vậy có dấu / đầu tiên -->
	<!-- <script src="main.js"></script> Sử dụng link tuyệt đối tính từ root, vì vậy có dấu / đầu tiên -->
	<script>
		$(".custom-file-input").on("change", function () {
			var fileName = $(this).val().split("\\").pop();
			$(this).siblings(".custom-file-label").addClass("selected").html(fileName);
		});
	</script>
	<script>
		//thêm
		const addForm = document.querySelector('#add-form');
		const uploadFile = document.querySelector('#file')
		uploadFile.addEventListener('change', e=>{      
			const file = e.target.files[0];
			console.log(file);
		})
        addForm.addEventListener('submit', async (e)=>{
            e.preventDefault();
            const taskTitleAdd = document.querySelector('#taskTitleAdd').value;
            const taskDetailAdd = document.querySelector('#taskDetailAdd').value;
			const deadlineAdd = document.querySelector('#deadlineAdd').value;
			const uploadFile = document.querySelector('#file');
			const taskEmployeeAdd = document.querySelector('#taskEmployeeAdd').value;
            
			console.log(taskTitleAdd,taskDetailAdd,deadlineAdd,fileAdd,taskEmployeeAdd);
			const sendRequest = await fetch('add_department.php',{
                method: 'POST',
                body: JSON.stringify({taskTitleAdd,taskDetailAdd,deadlineAdd})
            })
            const res = await sendRequest.json();
            reloadPage(res)
        })
	</script>
	<script>
		function reloadPage(res){
            if(res.code===0){
                location.reload();
            }
        }
	</script>
</body>

</html>
