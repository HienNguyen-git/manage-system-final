<?php
    session_start();
    // if (isset($_SESSION['user'])) {
    //     header('Location: index.php');
    //     exit();
    // }

    // require_once("db.php");

    $error = '';
    $message = "Enter your description and upload your file before submit";
    $description = '';

    if (isset($_POST['description']) && isset($_FILES['file'])) {
        $description = $_POST['description'];
        $file = $_FILES['file'];
        print_r($file);
        $errors= array();
		$file_name = $file['name'];
		$file_size =$file['size'];
		$file_tmp =$file['tmp_name'];
		$file_type=$file['type'];
		$file_ext=strtolower(end(explode('.',$file['name'])));
		
		$extensions= array("jpeg","jpg","png","zip","rar","doc","docx","pdf","pptx","xls");
		
        if (empty($description)) {
            $error = 'Please enter description';
        }
        else if($file_size > 2097152){
            if(!file_exists('upload')){
                mkdir('upload');
            }
            $errors[]='File size must be excately 2 MB';
        }
        
        else if(empty($errors)){
            move_uploaded_file($file_tmp,"upload/".$file_name);
            $message = "Submit successful";
        }else{
            print_r($errors);
        }
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
            <form class="submit-form" method="POST" enctype="multipart/form-data">
				<div class="form-group">
					<label for="description">Description</label>
					<textarea name="description" class="form-control" id="description" rows="3"></textarea>
				</div>
                <div class="form-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="file" id="file">
                        <label class="custom-file-label" for="file">Choose file</label>
                    </div>
                </div>
                <div class="form-group">
                    <?php
                        if (empty($error)) {
                            echo "<div class='alert alert-primary'>$message</div>";
                        }else{
                            echo "<div class='alert alert-danger'>$error</div>";
                        }
                    ?>
				    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
			</form>

			
		</div>
</div>
	<!-- <script src="/main.js"></script> Sử dụng link tuyệt đối tính từ root, vì vậy có dấu / đầu tiên -->
    <script>
		$(".custom-file-input").on("change", function () {
            var fileName = $(this).val().split("\\").pop();
			$(this).siblings(".custom-file-label").addClass("selected").html(fileName);
		});

        document.querySelector('#file').addEventListener('change', e=>{
			const file = e.target.files[0]
			const type = file['name'].split('.')[1]
			const size = file['size']
			const type_list = ["txt","doc","docx","xls","xlsx","jpg","png","mp3","mp4","pdf","rar","zip"]
			console.log(type, size, type_list)
			if(!type_list.includes(type)){
				handleErrorMessage('This type of file is not allowed')
			}else if(size>500*Math.pow(1024,2)){
				handleErrorMessage('This file is larger than 500M')
			}else{
				// uploadFile()
				uploadBtn.disabled = false
				uploadBtn.addEventListener('click', ()=>{
					uploadFile()
				})
			}
			// console.log(file)
		})

    </script>
	<script src="main.js"></script> <!-- Sử dụng link tuyệt đối tính từ root, vì vậy có dấu / đầu tiên -->
</body>
<?php
    
?>

</html>
