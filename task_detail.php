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
<nav class="navbar navbar-expand-lg bg-info navbar-dark">
	<div class="container">
		<a href="./" class="navbar-brand navbar-header">Final</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
		</button>
	
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav ml-auto h4">
			<li class="nav-item ">	
			<a class="nav-link active" href="./">Task</a>
			</li>
			<li class="nav-item">
			<a class="nav-link" href="absence.php">Absence</a>
			</li>
			<li class="nav-item">
			<a class="nav-link" href="account.php">Account</a>
			</li>
		</ul>
		</div>
	</div>
</nav>


<div class="container pb-2">
		<h1 class="mt-3 text-secondary">Task Information</h1>
        <h3 class="mt-1 mb-3 pb-3 border-bottom border-info text-light" >Design UI</h3>
		<div class="ml-auto mr-auto task-container">
		
		
            <table>
            <tr>
                <th>Status:</th>
                <td>New </td>
				<td><a class="btn btn-primary" href="#">Start now</a></td>
            </tr>
            <tr>
                <th>Title:</th>
                <td>Design UI</td>
            </tr>
            <tr>
                <th>Detail:</th>
				<!-- <td>Ahihi</td> -->
                <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem itaque, ipsam, ex consectetur maiores nisi, obcaecati magnam deleniti ea quod modi accusantium ratione ad! Animi voluptas fugiat itaque dignissimos sequi.</td>
            </tr>
            <tr>
                <th>Deadline</th>
                <td>12-3-2022</td>
            </tr>
            <tr>
                <th>File</th>
                <td></td>
            </tr>
        	</table>

			<a href="submit_task.php?id=1" class="btn btn-success submit-btn">Create submit form</a>

			
		</div>
</div>
	<!-- <script src="/main.js"></script> Sử dụng link tuyệt đối tính từ root, vì vậy có dấu / đầu tiên -->
	<script src="main.js"></script> <!-- Sử dụng link tuyệt đối tính từ root, vì vậy có dấu / đầu tiên -->
</body>
</html>
