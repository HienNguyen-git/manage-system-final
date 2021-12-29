<?php
		if(!$status||!$is_lock){
			?>
				<script>
					$(".custom-file-input").on("change", function () {
						var fileName = $(this).val().split("\\").pop();
						$(this).siblings(".custom-file-label").addClass("selected").html(fileName);
					});
				</script>
				<script>
				const absenceHistory = document.querySelector('#absence-history')
				const taskForm = document.querySelector('#task-form')
				const submitBtn = document.querySelector('.submit-btn')
				const userAbsenceInfo = document.querySelector('#user-absence-info')
				submitBtn.addEventListener('click',(e)=>{
					submitBtn.style.display = 'none';
					absenceHistory.style.display = 'none';
					taskForm.style.display = '';
				})

				document.querySelector('#back-btn').addEventListener('click',()=>{
					submitBtn.style.display = '';
					absenceHistory.style.display = '';
					taskForm.style.display = 'none';
				})


				</script>

				<script>
				const description = document.querySelector('#description')
				const dayOff = document.querySelector('#dayoff');
				const files = document.querySelector('#file');
				const messageBox = document.querySelector('#error-message')
				const uploadBtn = document.querySelector('#upload-btn')
				uploadBtn.disabled = true;
				let isDetailValidate

				dayOff.addEventListener('change', ()=>{
					checkIsValidation();
				})
				description.addEventListener('change',()=>{
					if(description.value===''){
						handleErrorMessage('Please enter your description')
					}else{
						messageBox.innerHTML = ''
						isDetailValidate = true
						checkIsValidation()
					}
				})

				let isFileValidate = true
				files.addEventListener('change', e=>{
					const file = e.target.files[0]
					console.log(file)
					const type = file['name'].split('.').pop()
					const size = file['size']
					const type_list = ["txt","doc","docx","xls","xlsx","jpg","png","mp3","mp4","pdf","rar","zip","pptx","sql","ppt","jpeg"]
					console.log(type, size, type_list)

					if(size===0){
						handleErrorMessage('Please upload your submit file')
					}else if(!type_list.includes(type)){
						handleErrorMessage('This type of file is not allowed')
					}else if(size>10*Math.pow(1024,2)){
						handleErrorMessage('This file is larger than 10M')
					}else{
						messageBox.innerHTML = ''
						isFileValidate = true;
						checkIsValidation()
					}
				})

				function checkIsValidation(){ 
					if(!isDetailValidate){
						handleErrorMessage('Please enter your description')
					}else if((!dayOff.value)){
						handleErrorMessage('Please choose number of day off')
					}else if(!isFileValidate){
						handleErrorMessage('Please check your file again')
					}else{
						uploadBtn.disabled = false
						messageBox.innerHTML = ''
						messageBox.insertAdjacentHTML('afterbegin',`<div class="alert alert-success text-center">Your submit form is ready!</div>`)
					}
				}

				function handleErrorMessage(message){
					messageBox.innerHTML = ''
					messageBox.insertAdjacentHTML('afterbegin',`<div class="alert alert-danger text-center">${message}</div>`)
					uploadBtn.disabled = true
				}
				</script>	
			
			<?php
		}
	?>