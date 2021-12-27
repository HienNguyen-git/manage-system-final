<?php
    session_start();
    require_once('db.php');
   if(!isset($_SESSION['user'])){
       header('Location: login.php');
   }
   $user = $_SESSION['user'];
   if( !is_password_changed($user) ){
       header('Location: change_password.php');
       exit();
   }

    $error = '';
    $message = "";
    $description = '';

    if (isset($_POST['description']) && isset($_FILES['file'])) {
        $description = $_POST['description'];
        $file = $_FILES['file'];
        $errors= array();
		$file_name = $file['name'];
		$file_size =$file['size'];
		$file_tmp =$file['tmp_name'];
		$file_type=$file['type'];
		$file_ext=strtolower(end(explode('.',$file['name'])));
		
		$extensions= array("txt","doc","docx","xls","xlsx","jpg","png","mp3","mp4","pdf","rar","zip");

        if(empty($errors)){
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
<?php
    if(!empty($error)){
        echo "<div class='alert alert-danger text-center' style='margin-bottom: 0 !important'>$error</div>";
    }
    if(!empty($message)){
        echo "<div class='alert alert-primary text-center' style='margin-bottom: 0 !important'>$message</div>";
    }
?>
</script>

<nav class="navbar navbar-expand-lg bg-info navbar-dark">
	<div class="container">
		<a href="./" class="navbar-brand navbar-header" style="font-size: 3rem;">Final Project</a>
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
			<li class="nav-item">
			<a class="btn btn-danger nav-link text-light" href="logout.php">Logout</a>
			</li>
		</ul>
		</div>
	</div>
</nav>

<div class="container pb-2">
		<h1 class="mt-3 text-secondary">Task Information</h1>
        <h3 class="mt-1 mb-3 pb-3 border-bottom border-info text-light" >Design UI</h3>
		<div class="ml-auto mr-auto task-container">
            <?php
                $id = $_GET['id'];
                // echo $_GET['id'];
                $data = get_task_by_id($id)['data'];
                // print_r($data)

                
            ?>
            <table>
            <tr>
                <th>Status:</th>
                <td><?=$data['status']?></td>
                <?php
                    if($data['status']=='New'){
                        echo "<td><button onclick='startTask($id)' id='btn-start-task' class='btn btn-primary'>Start now</button></td>";
                    }
                ?>
            </tr>
            <tr>
                <th>Title:</th>
                <td><?=$data['title']?></td>
            </tr>
            <tr>
                <th>Detail:</th>
				<!-- <td>Ahihi</td> -->
                <td><?=$data['description']?></td>
            </tr>
            <tr>
                <th>Deadline</th>
                <td><?=$data['deadline']?></td>
            </tr>
            <tr>
                <th>File</th>
                <td><a href="<?=$data['file']?>"><?=$data['file']?></a></td>
            </tr>
        	</table>

            <?php
                if($data['status']=='In progress'){
                    ?>
                        <button class="btn btn-success submit-btn col-12 col-sm-4" style="display: block;">Create submit form</button>
                        <form class="submit-form" id="task-form" style="display: none;" method="POST" enctype="multipart/form-data">
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
                            <div class="form-group" id="error-message">
                            </div>
                                <div class="form-group">
                                <button type="submit" id="upload-btn" class="btn btn-primary col-12 col-sm-2">Submit</button>
                            </div>
                        </form>
                    <?php
                }
            ?>
			
			
		</div>
</div>
	<!-- <script src="/main.js"></script> Sử dụng link tuyệt đối tính từ root, vì vậy có dấu / đầu tiên -->
	<script src="main.js"></script> <!-- Sử dụng link tuyệt đối tính từ root, vì vậy có dấu / đầu tiên -->
	<?php
    if($data['status']=="In progress"){
        ?>
        <script>
            const taskForm = document.querySelector('#task-form')
            const submitBtn = document.querySelector('.submit-btn')
            submitBtn.addEventListener('click',(e)=>{
                submitBtn.style.display = 'none';
                taskForm.style.display = '';
            })
        </script>

        <script>
            const messageBox = document.querySelector('#error-message')
            const descriptionBox = document.querySelector('#description')
            const uploadBtn = document.querySelector('#upload-btn')

            messageBox.insertAdjacentHTML('afterbegin',`<div class="alert alert-primary">Enter your description and upload your file before submit</div>`)
            uploadBtn.disabled = true

            $(".custom-file-input").on("change", function () {
                var fileName = $(this).val().split("\\").pop();
                $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
            });
            
            let isDetailValidate
            descriptionBox.addEventListener('change',()=>{
                if(descriptionBox.value===''){
                    uploadBtn.disabled = true
                    handleErrorMessage('Please enter your description')
                }else{
                    messageBox.innerHTML = ''
                    isDetailValidate = true
                    checkIsValidation()
                }
            })
            let isFileValidate
            document.querySelector('#file').addEventListener('change', e=>{
                const file = e.target.files[0]
                console.log(file)
                const type = file['name'].split('.')[1]
                const size = file['size']
                const type_list = ["txt","doc","docx","xls","xlsx","jpg","png","mp3","mp4","pdf","rar","zip"]
                console.log(type, size, type_list)
                if(!type_list.includes(type)){
                    handleErrorMessage('This type of file is not allowed')
                }else{
                    messageBox.innerHTML = ''
                    isFileValidate = true;
                    checkIsValidation()
                }
            })

            function checkIsValidation(){ 
                if(!isDetailValidate){
                    handleErrorMessage('Please enter your description')
                }else if(!isFileValidate){
                    handleErrorMessage('This type of file is not allowed')
                }else{
                    uploadBtn.disabled = false
                    messageBox.innerHTML = ''
                    messageBox.insertAdjacentHTML('afterbegin',`<div class="alert alert-success">Your submit form is ready!</div>`)
                }
            }

            function handleErrorMessage(message){
                messageBox.innerHTML = ''
                messageBox.insertAdjacentHTML('afterbegin',`<div class="alert alert-danger">${message}</div>`)
                uploadBtn.disabled = true
            }

        </script>
        <?php
    }
    ?>
    <?php
        if($data['status']=="New"){
            ?>
                <script>
                    async function startTask(id){
                        const request = await fetch(`start_task.php?id=${id}`)
                        const res = await request.json();
                        console.log(res)
                        reloadPage(res)
                    }
                </script>

                <script>
                    function reloadPage(res){       
                        if(res.code===0){
                            location.reload();
                        }
                    }  
                </script>
            <?php
        }
    
    ?>

	
</body>
</html>
