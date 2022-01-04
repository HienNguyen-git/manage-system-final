const pageValue = document.querySelector('#page').value

function reloadPage(res){
    if(res.code===0){
        location.reload();
    }
}

if(pageValue==='manager-index'){

    $(".custom-file-input").on("change", function () {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });

    const addBtn = document.getElementById('add-btn');
    addBtn.disabled = true;
    const taskTitleAdd = document.getElementById('taskTitleAdd');
    console.log(taskTitleAdd.value);
    // if()
    //file
    const uploadFile = document.querySelector('#file')
    uploadFile.addEventListener('change', e=>{      
        const file = e.target.files[0];
        const fileSize = file.size;
        const fileName = file.name;
        const fileExt = fileName.split('.').pop().toLowerCase();
        const type_list = ["txt","doc","docx","xls","xlsx","jpg","png","mp3","mp4","pdf","rar","zip","pptx","sql","ppt","jpeg"];
        if(fileSize === 0){
            handleErrorMessage('Please upload file');
        }else if(!type_list.includes(fileExt)){
            handleErrorMessage('This type of file is not allowed');
        }else if(fileSize > 100*Math.pow(1024,2)){
            handleErrorMessage('This file is larger than 100M');
        }else{
            handleSuccessMessage('This file is ok')
        }
    });
    const messageBox = document.querySelector('#error-message')
    //thành công
    function handleSuccessMessage(message){
        messageBox.innerHTML = '';
        messageBox.insertAdjacentHTML('beforeend',`<div class='alert alert-success'>${message}</div>`)
    }
    //lỗi
    function handleErrorMessage(message){
        messageBox.innerHTML = '';
        messageBox.insertAdjacentHTML('beforeend',`<div class='alert alert-danger'>${message}</div>`)
        uploadBtn.disabled = true;
    }
}else if(pageValue==='manager-task-detail'){
    $(".custom-file-input").on("change", function () {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });

    const actionTask = document.querySelector('#action-task')
    const backBtn = document.querySelectorAll('.back-btn')

    const completeBtn = document.querySelector('#complete-btn')?document.querySelector('#complete-btn'):'';
    const completeForm = document.querySelector('#complete-form');
    const completeMessage = document.querySelector('#complete-error-message')
    const isComplete = document.querySelector('#is_complete');
    const uploadFile = document.querySelector('#file')
    if(completeBtn){
        backBtn.forEach(btn=>btn.addEventListener('click',(e)=>{
            e.preventDefault();
            e.target.closest('.submit-form').style.display ='none'
            actionTask.style.display='';
            e.target.closest('.form-row').nextElementSibling.value = '0';
            console.log(e.target.closest('.form-row').nextElementSibling.value)
        }))
        
        completeBtn.addEventListener('click',()=>{
            actionTask.style.display = 'none';
            completeForm.style.display = '';
            isComplete.value = '1'
        })
        
        const rejectBtn = document.querySelector('#reject-btn');
        const rejectForm = document.querySelector('#reject-form');
        const rejectMessage = document.querySelector('#reject-error-message')
        const isExtend = document.querySelector('#is_extend')
        const deadlineBox = document.querySelector('#deadline-box')
        const description = document.querySelector('#description')
        const file = document.querySelector('#file')
        const deadlineAdd = document.querySelector('#deadlineAdd')
        const isReject = document.querySelector('#is_reject');
    
        let idDescriptionValid
    
        function toggleDeadlineBox(){
            if(isExtend.value=='1'){
                deadlineBox.style.display ='';
            }else{
                deadlineBox.style.display ='none';
            }
        }
    
        function handleErrorMessage(message){
            rejectMessage.innerHTML = ''
            rejectMessage.insertAdjacentHTML('afterbegin',`<div class="alert alert-danger text-center">${message}</div>`)
        }
    
        toggleDeadlineBox()
    
        rejectBtn.addEventListener('click',()=>{
            actionTask.style.display = 'none';
            rejectForm.style.display = '';
            isReject.value = '1'
        })
    
        isExtend.addEventListener('change',()=>{
            if(isExtend.value=='1'){
                deadlineBox.style.display ='';
            }else{
                deadlineBox.style.display ='none';
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
                rejectMessage.innerHTML = ''
            }
        })
    
        var today = new Date();
        var dd = today.getDate();
        var mm = today.getMonth() + 1; //January is 0!
        var yyyy = today.getFullYear();
    
        if (dd < 10) {
        dd = '0' + dd;
        }
    
        if (mm < 10) {
        mm = '0' + mm;
        } 
            
        today = yyyy + '-' + mm + '-' + dd;
        document.getElementById("deadlineAdd").setAttribute("min", today);
    }
}else if(pageValue==="manager-absence"){
    
    // Absence page
    $(".custom-file-input").on("change", function () {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });

    const absenceHistory = document.querySelector('#absence-history')
    const taskFormAbsence = document.querySelector('#task-form')
    const submitBtnAbsence = document.querySelector('.submit-btn')?document.querySelector('.submit-btn'):''
    const userAbsenceInfo = document.querySelector('#user-absence-info')
    if(submitBtnAbsence){

        submitBtnAbsence.addEventListener('click',(e)=>{
            submitBtnAbsence.style.display = 'none';
            absenceHistory.style.display = 'none';
            taskFormAbsence.style.display = '';
        })
        
        document.querySelector('#back-btn').addEventListener('click',()=>{
            submitBtnAbsence.style.display = '';
            absenceHistory.style.display = '';
            taskFormAbsence.style.display = 'none';
        })
        
        const description = document.querySelector('#description')
        const dayOff = document.querySelector('#dayoff');
        const files = document.querySelector('#file');
        const messageBoxAbsence = document.querySelector('#error-message')
        const uploadBtnAbsence = document.querySelector('#upload-btn')
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
else if(pageValue === "manager-addtask"){
    $(".custom-file-input").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth() + 1; //January is 0!
    var yyyy = today.getFullYear();

    if (dd < 10) {
    dd = '0' + dd;
    }

    if (mm < 10) {
    mm = '0' + mm;
    } 
        
    today = yyyy + '-' + mm + '-' + dd;
    document.getElementById("deadlineAdd").setAttribute("min", today);
}
else if(pageValue === "manager-account"){
    $(".custom-file-input").on("change", function () {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
    const messageBox = document.querySelector('#error-message')
    const uploadBtn = document.querySelector('#upload-btn')
    uploadBtn.disabled = true

    document.querySelector('#file').addEventListener('change', e=>{
        const file = e.target.files[0]
        console.log(file)
        const type = file['name'].split('.')[1].toLowerCase();
        const size = file['size']
        const type_list = ["jpg","png","jpeg","gif"]
        console.log(type, size, type_list)

        if(size===0){
            handleMessage('Please upload your submit image')
        }else if(!type_list.includes(type)){
            handleMessage('Please upload image file type (ex: jpg,png,....)')
        }else if(size>Math.pow(1024,2)){
            handleMessage('This image is larger than 1M')
        }else{
            handleMessage('Your image is ready! Upload now', "success")
            uploadBtn.disabled = false;
        }
    })

    function handleMessage(message, type='danger'){
        messageBox.innerHTML = ''
        messageBox.insertAdjacentHTML('afterbegin',`<div class="alert alert-${type}">${message}</div>`)
        uploadBtn.disabled = true
    }
}
