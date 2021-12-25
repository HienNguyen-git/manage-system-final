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
	<title>Home Page</title>
	
</head>

<body>
<?php
	include_once('layout/header.php')
?>


<div class="container pb-2" style="height: 70vh;">
		<h1 class="mt-3 text-secondary">Absence Management</h1>
        <h3 class="mt-1 mb-3 pb-3 border-bottom border-info text-light">Request history</h3>
		<div class="ml-auto mr-auto task-container">
			<button class="btn btn-success submit-btn col-12 col-sm-6 mb-3">Create request absence form</button>
			<table id="user-absence-info">
            <tr>
                <th>Day off Permit</th>
                <td>12</td>
            </tr>
            <tr>
                <th>Using</th>
                <td>2</td>
            </tr>
            <tr>
                <th>The Rest</th>
                <td>10</td>
            </tr>
        </table>
			<table class="table table-bordered table-light table-hover text-center ali" id="absence-history" style="border-color:black;">
				<thead>
					<tr>
						<th scope="col">#</th>
						<th scope="col">Create date</th>
						<th scope="col">Number of day off</th>
						<th scope="col">Reason</th>
						<th scope="col">File</th>
						<th scope="col">Status</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<th scope="row">1</th>
						<td>12-3-2020</td>
						<td>2</td>
						<td>Sick</td>
						<td>This is a file</td>
						<td class="text-danger"><i class="fas fa-times-circle"></i> Refused</td>
					</tr>
					<tr>
						<th scope="row">2</th>
						<td>12-4-2020</td>
						<td>1</td>
						<td>Go to hometown</td>
						<td>This is a file</td>
						<td class="text-success"><i class="fas fa-check"></i> Approved</td>
					</tr>
					<tr>
						<th scope="row">3</th>
						<td>12-3-2020</td>
						<td>10</td>
						<td>Pregnancy</td>
						<td>This is a file</td>
						<td class="text-success"><i class="fas fa-check"></i> Approved</td>
					</tr>
					<tr>
						<th scope="row">4</th>
						<td>12-3-2020</td>
						<td>2</td>
						<td>Sick</td>
						<td>This is a file</td>
						<td class="text-danger"><i class="fas fa-times-circle"></i> Refused</td>
					</tr>
				</tbody>
				</table>

				<form class="submit-form" id="task-form" style="display: none; flex-basis: 100%;" method="POST" enctype="multipart/form-data">
					<div class="form-row">
					<div class="form-group col-sm-6">
						<label for="description">Reason</label>
						<input name="description" class="form-control" id="description"></input>
					</div>
						<div class="form-group col-sm-6">
							<label for="dayoff">Number of day off</label>
							<select class="form-control" id="dayoff">
							<option selected>1</option>
							<option>2</option>
							<option>3</option>
							<option>4</option>
							<option>5</option>
							</select>
						</div>
						<div class="form-group col-sm-6">
							<div class="custom-file">
								<input type="file" class="custom-file-input" name="file" id="file">
								<label class="custom-file-label" for="file">Choose file</label>
							</div>
						</div>
					</div>
					<div class="form-group" id="error-message">
						<div class="form-group">
							<button type="submit" id="upload-btn" class="btn btn-primary col-12 col-sm-2">Submit</button>
						</div>
					</div>
					<div class="form-group" id="error-message">
						<div class="form-group">
							<button type="submit" id="upload-btn" class="btn btn-primary col-12 col-sm-2">Submit</button>
						</div>
					</div>
				</form>
		</div>

	</div>

	<!-- <script src="/main.js"></script> Sử dụng link tuyệt đối tính từ root, vì vậy có dấu / đầu tiên -->
	<script src="main.js"></script> <!-- Sử dụng link tuyệt đối tính từ root, vì vậy có dấu / đầu tiên -->
	
	<script>
		$(".custom-file-input").on("change", function () {
            var fileName = $(this).val().split("\\").pop();
			$(this).siblings(".custom-file-label").addClass("selected").html(fileName);
		});



		const absenceHistory = document.querySelector('#absence-history')
		const taskForm = document.querySelector('#task-form')
		const submitBtn = document.querySelector('.submit-btn')
		const userAbsenceInfo = document.querySelector('#user-absence-info')
		submitBtn.addEventListener('click',(e)=>{
			submitBtn.style.display = 'none';
			absenceHistory.style.display = 'none';
			taskForm.style.display = '';
		})
	</script>
</body>

</html>
