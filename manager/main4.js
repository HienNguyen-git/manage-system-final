const pageValue = document.querySelector('#page').value
if(pageValue==='manager-absence'){

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
}

function reloadPage(res){
    if(res.code===0){
        location.reload();
    }
}