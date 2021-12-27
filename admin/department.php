<?php
    session_start();
    if (!isset($_SESSION['user'])) {
        header('Location: login.php');
        exit();
    }
	require_once('db.php');
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
							<li class="nav-item ">
								<a class="nav-link p20" href="index.php"><i class="fas fa-user"></i>  Account </a>
							</li>
							<li class="nav-item active-menu">
								<a class="nav-link p20" href="department.php"> <i class="fas fa-building"></i>  Department</a>
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
				<div class="bg-light mt-4 text-dark p-2" style="width: 100%; overflow-x:scroll">
					<div class="admin-panel-section-header">
						<h2>List Departments</h2>
						<a class="addbtn"  data-toggle="modal" data-target="#add-department">Add Department</a>
					</div>
					<table class="table-hover text-center pc-table"   border="1" >
						<tr class="header">
							<th>ID </th>
							<th>Department Name</th>
							<th>Department Number </th>
							<th>Manager Name</th>
							<th>Detail</th>
							<th>Action</th>
						</tr>
						<tbody id="tbody">
						<?php 
							$result = get_departments(); 
							if($result['code'] == 0){
								$data = $result['data'];
								foreach($data as $row){
									// print_r($row) ;
									?>
									<tr class="item">
										<td><?= $row['id'] ?></td>
										<td><?= $row['name'] ?></td>
										<td><?= $row['number_room'] ?></td>
										<td>
											<?= $row['manager_user'] ?>
											<!-- <select name="namePerson" required>
												<option value="" disabled selected>Person</option>
												<option value="HaiDang">Hải Đăng</option>
												<option value="HaiDang">Hải Đăng</option>
												<option value="HaiDang">Hải Đăng</option>
												<option value="HaiDang">Hải Đăng</option>
												<option value="HaiDang">Hải Đăng</option>
											</select> -->
										</td>
										<td><?= $row['detail'] ?></td>
										<td >
											<a 
												class="btn btn-primary bg-primary"
												data-toggle="modal" 
												data-target="#edit-department-detail"
												onclick="handleTransferToUpdate('<?= $row['id'] ?>','<?= $row['name'] ?>','<?= $row['number_room'] ?>','<?= $row['manager_user'] ?>','<?= $row['detail'] ?>')" 
											>
												Edit     
											</a>
											<a href="#" 
													class="btn btn-danger"
													onclick="handleTransferToDelete('<?= $row['name'] ?>','<?= $row['id'] ?>')" 
													data-toggle="modal" 
													data-target="#delete-department" 
												>Delete</a>
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
    <div id="add-department" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <hp class="modal-title">Add Department</hp>
                    <button type="button" class="close" data-dismiss="modal" >&times;</button>
                </div>
                <form id="add-form" method="post" novalidate enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="departmentNameAdd">Department Name</label>
                            <input name="departmentNameAdd" required class="form-control" type="text" placeholder="Department Name" id="departmentNameAdd">
                        </div>
                        <div class="form-group">
                            <label for="departmentNumAdd">Department Number</label>
                            <input name="departmentNumAdd" required class="form-control" type="number" placeholder="Department Number" id="departmentNumAdd">
                        </div>
						<div class="form-group">
                            <label for="departmentManagerAdd">Manager Name</label>
                            <input name="departmentManagerAdd" required class="form-control" type="text" placeholder="Manager Name" id="departmentManagerAdd">
                        </div>
                        <div class="form-group">
                            <label for="departmentDetailAdd">Department Detail</label>
                            <textarea id="departmentDetailAdd" name="departmentDetailAdd" rows="4" class="form-control" placeholder="Department Detail"></textarea>
                        </div>
						
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary px-5 mr-2">Add</button>
                        </div>
                    </div>
                </form>
            </div>  
        </div>
    </div>

	<!-- Delete Confirm Modal -->
    <div id="delete-department" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <hp class="modal-title">Delete Department</hp>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                
                <div class="modal-body">
                    <p>Bạn có chắc rằng muốn xóa <strong class="department-delete-name"></strong> ?</p>
                </div>
                <div class="modal-footer">
                    <input type="hidden">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button id="btn-del" type="submit" class="btn btn-danger"  class="btn-delete-modal" data-dismiss="modal">Xóa</button>
                    
                </div>
            </div>
        </div>
    </div>

	<!-- Edit Confirm Modal -->
	<div id="edit-department-detail" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<hp class="modal-title">Edit infomation employee</hp>
					<button type="button" class="close" data-dismiss="modal" >&times;</button>
				</div>
				<form method="post" id="update-form" novalidate enctype="multipart/form-data">
					<div class="modal-body">
						<div class="form-group">
                            <label for="departmentNameUpdate">Department Name</label>
                            <input name="departmentNameUpdate" required class="form-control" type="text" placeholder="Department Name" id="departmentNameUpdate">
                        </div>
                        <div class="form-group">
                            <label for="departmentNumUpdate">Department Number</label>
                            <input name="departmentNumUpdate" required class="form-control" type="number" placeholder="Department Number" id="departmentNumUpdate">
                        </div>
						<div class="form-group">
                            <label for="departmentManagerUpdate">Manager Name</label>
                            <input name="departmentManagerUpdate" required class="form-control" type="text" placeholder="Manager Name" id="departmentManagerUpdate">
                        </div>
                        <div class="form-group">
                            <label for="departmentDetailUpdate">Department Detail</label>
                            <textarea id="departmentDetailUpdate" name="departmentDetailUpdate" rows="4" class="form-control" placeholder="Department Detail"></textarea>
                        </div>
						<div class="form-group">
							<button type="submit" class="btn btn-primary px-5 mr-2">Edit</button>
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
		//thêm
		const addForm = document.querySelector('#add-form')
        addForm.addEventListener('submit', async (e)=>{
            e.preventDefault();
            const departmentNameAdd = document.querySelector('#departmentNameAdd').value
            const departmentNumAdd = document.querySelector('#departmentNumAdd').value
            const departmentManagerAdd = document.querySelector('#departmentManagerAdd').value;
			const departmentDetailAdd = document.querySelector('#departmentDetailAdd').value

            const sendRequest = await fetch('add_department.php',{
                method: 'POST',
                body: JSON.stringify({departmentNameAdd,departmentNumAdd,departmentManagerAdd,departmentDetailAdd})
            })

            const res = await sendRequest.json();
            reloadPage(res)
            
        })

		//xóa
		let currentID;
        const departmentDeleteName = document.querySelector('.department-delete-name');
        function handleTransferToDelete(name, id){
            departmentDeleteName.innerHTML = name;
            currentID = id;
        }
		document.getElementById('btn-del').addEventListener('click',async () =>{
            const request = await fetch('delete_department.php',{
                method: 'delete',
                body: JSON.stringify({id:currentID}),
                headers: {
                    "Content-Type": "application/json"
                },
            })
            
            const res = await request.json();
            reloadPage(res)
        })

        //update
        function handleTransferToUpdate(id,name,number,manager,detail){
            // console.log(id,firstname,lastname,role);
            currentID = id;
            document.querySelector('#departmentNameUpdate').value = name;
            document.querySelector('#departmentNumUpdate').value = number;
            document.querySelector('#departmentManagerUpdate').value = manager;
            document.querySelector('#departmentDetailUpdate').innerHTML = detail;
            
        }

        document.querySelector('#update-form').addEventListener('submit',async (e)=>{
            e.preventDefault();
            const firstname = document.querySelector('#firstNameUpdate').value
            const lastname = document.querySelector('#lastNameUpdate').value
            const role = document.querySelector('#roleUpdate').value

            const sendRequest = await fetch('update_employee.php',{
                method: 'POST',
                body: JSON.stringify({id:currentID,firstname,lastname,role})
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
