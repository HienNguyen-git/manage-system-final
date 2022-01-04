
// Task detail page
const pageValue = document.querySelector('#page').value
if(pageValue==='task'){
    const taskForm = document.querySelector('#task-form')
    const submitBtn = document.querySelector('.submit-btn')
    submitBtn.addEventListener('click',(e)=>{
        submitBtn.style.display = 'none';
        taskForm.style.display = '';
    })
    
    const messageBox = document.querySelector('#error-message')
    const descriptionBox = document.querySelector('#description')
    const uploadBtn = document.querySelector('#upload-btn')
    const uploadFile = document.querySelector('#file')
    let isFileValidate
    
    uploadBtn.disabled = true
    
    $(".custom-file-input").on("change", function () {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
    
    let isDetailValidate = descriptionBox.value===''?false:true
    
    descriptionBox.addEventListener('keyup',()=>{
        if(descriptionBox.value===''){
            handleErrorMessage('Please enter your description')
        }else{
            messageBox.innerHTML = ''
            isDetailValidate = true
            checkIsValidation()
        }
    })
    uploadFile.addEventListener('change', e=>{      
        const file = e.target.files[0]
        console.log(file)
        const type = file['name'].split('.').pop();
        console.log(type);
        const size = file['size']
        const type_list = ["txt","doc","docx","xls","xlsx","jpg","png","mp3","mp4","pdf","rar","zip","pptx","sql","ppt","jpeg"]
        console.log(type, size, type_list)
    
        if(size===0){
            handleErrorMessage('Please upload your submit file')
        }else if(!type_list.includes(type)){
            handleErrorMessage('This type of file is not allowed')
        }else if(size>100*Math.pow(1024,2)){
            handleErrorMessage('This file is larger than 100M')
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
}else if(pageValue==="absence"){
    
    // Absence page
    
    const absenceHistory = document.querySelector('#absence-history')
    const taskFormAbsence = document.querySelector('#task-form-absence')
    const submitBtnAbsence = document.querySelector('.submit-btn-absence')?document.querySelector('.submit-btn-absence'):''
    const userAbsenceInfo = document.querySelector('#user-absence-info')
    if(submitBtnAbsence){

        submitBtnAbsence.addEventListener('click',(e)=>{
            submitBtnAbsence.style.display = 'none';
            absenceHistory.style.display = 'none';
            taskFormAbsence.style.display = '';
        })
        
        document.querySelector('#back-btn-absence').addEventListener('click',()=>{
            submitBtnAbsence.style.display = '';
            absenceHistory.style.display = '';
            taskFormAbsence.style.display = 'none';
        })
        
        const description = document.querySelector('#description')
        const dayOff = document.querySelector('#dayoff');
        const files = document.querySelector('#file');
        const messageBoxAbsence = document.querySelector('#error-message-absence')
        const uploadBtnAbsence = document.querySelector('#upload-btn-absence')
        uploadBtnAbsence.disabled = true;
        let isDetailValidateAbsence
        
        dayOff.addEventListener('change', ()=>{
            checkIsValidation();
        })
        description.addEventListener('change',()=>{
            if(description.value===''){
                handleErrorMessage('Please enter your description')
            }else{
                messageBoxAbsence.innerHTML = ''
                isDetailValidateAbsence = true
                checkIsValidation()
            }
        })
        
        let isFileValidateAbsence = true
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
                messageBoxAbsence.innerHTML = ''
                isFileValidateAbsence = true;
                checkIsValidation()
            }
        })
        
        function checkIsValidation(){ 
            if(!isDetailValidateAbsence){
                handleErrorMessage('Please enter your description')
            }else if((!dayOff.value)){
                handleErrorMessage('Please choose number of day off')
            }else if(!isFileValidateAbsence){
                handleErrorMessage('Please check your file again')
            }else{
                uploadBtnAbsence.disabled = false
                messageBoxAbsence.innerHTML = ''
                messageBoxAbsence.insertAdjacentHTML('afterbegin',`<div class="alert alert-success text-center">Your submit form is ready!</div>`)
            }
        }
        
        function handleErrorMessage(message){
            messageBoxAbsence.innerHTML = ''    
            messageBoxAbsence.insertAdjacentHTML('afterbegin',`<div class="alert alert-danger text-center">${message}</div>`)
            uploadBtnAbsence.disabled = true
        }
    }
}