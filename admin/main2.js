const inputpage = document.querySelector('#page').value;
if(inputpage === 'accountphp'){
    //custom file name
    $(".custom-file-input").on("change", function () {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
    
    //upload avatar
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
else if(inputpage === 'departmentphp'){

    //department.php
    //thêm
    const addForm = document.querySelector('#add-form')
    const errorMess = document.getElementById('error-message')
    addForm.addEventListener('submit', async (e)=>{
        e.preventDefault();
        const departmentNameAdd = document.querySelector('#departmentNameAdd').value
        const departmentNumAdd = document.querySelector('#departmentNumAdd').value
        const departmentDetailAdd = document.querySelector('#departmentDetailAdd').value
        
        if(departmentDeleteName === ''){
            errorMess.style.display = 'block';
            errorMess.innerHTML = 'Please enter department name';
        }
        else if(departmentNumAdd === ''){
            errorMess.style.display = 'block';
            errorMess.innerHTML = 'Please enter department number';
        }
        else if(departmentDetailAdd === ''){
            errorMess.style.display = 'block';
            errorMess.innerHTML = 'Please enter department detail';
        }
    
        const sendRequest = await fetch('add_department.php',{
            method: 'POST',
            body: JSON.stringify({departmentNameAdd,departmentNumAdd,departmentDetailAdd})
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
    const select = document.getElementById('departmentManagerUpdate');
    
    document.querySelector('.close-edit').addEventListener('click',() => {
        select.innerHTML = '';
    })
    
    function handleTransferToUpdate(id,name,number,manager,detail){
        currentID = id;
        document.querySelector('#departmentNameUpdate').value = name;
        document.querySelector('#departmentNumUpdate').value = number;
        // console.log(document.querySelector('#departmentManagerUpdate').value);
        document.querySelector('#departmentDetailUpdate').innerHTML = detail;
        const departmentName = document.querySelector('#departmentNameUpdate').value;
        (async () => {
            // select.insertAdjacentHTML('beforeend','<option value="" disabled selected>Manager Name</option>');
            const departmentName = document.querySelector('#departmentNameUpdate').value;
            
            const request1 = await fetch(`get_manager_name.php?department=${departmentName}`);
            const res = await request1.json();
            let optionSelectDeparment;
            if(res['code']){
                select.innerHTML = '';
                optionSelectDeparment = `<option value="" disabled selected>${res['error']}</option>`;
            }else{
    
                const data = res['data'];
                optionSelectDeparment = data.map(e => `
                    <option value="${e}">${e}</option>		
                `).join('')
                // console.log(optionSelectDeparment.value);
            }
    
            select.insertAdjacentHTML('beforeend',optionSelectDeparment);
        })()
    }
    
    document.getElementById('edit-btn').addEventListener('click',() => {
        document.getElementById('edit-hidden').value = 1;
    })
    //reload
    function reloadPage(res){
        if(res.code===0){
            location.reload();
        }
    }
}
else if(inputpage === 'detailEmployeephp'){
    const nameResetpass = document.querySelector('.name-resetpass');
    let currentUsernme;
    function handleTransferToReset(name){
        nameResetpass.innerHTML = name;
        currentUsernme = name;
    }
    
    let currentID
    //update
    function handleTransferToUpdate(id,firstname,lastname){
        // console.log(id,firstname,lastname,role);
        currentID = id;
        document.querySelector('#firstNameUpdate').value = firstname;
        document.querySelector('#lastNameUpdate').value = lastname
        // document.querySelector('#roleUpdate').value = role
    }

    document.querySelector('#update-form').addEventListener('submit',async (e)=>{
        e.preventDefault();
        const firstname = document.querySelector('#firstNameUpdate').value
        const lastname = document.querySelector('#lastNameUpdate').value
        // const role = document.querySelector('#roleUpdate').value
        const errorMessage = document.getElementById('error-message');
        const successMessage = document.getElementById('success-message');

        if(firstname === ''){
            errorMessage.style.display = "block";
            successMessage.style.display = "none !important";
            errorMessage.innerHTML = 'Please enter firstname of this person';
        }else if(lastname === ''){
            errorMessage.style.display = "block";
            successMessage.style.display = "none !important";
            errorMessage.innerHTML = 'Please enter lastname of this person';
        }else{
            errorMessage.style.display = "none";
            successMessage.style.display = "block";
            successMessage.innerHTML = 'Update success';
        }

        const sendRequest = await fetch('update_employee.php',{
            method: 'POST',
            body: JSON.stringify({id:currentID,firstname,lastname})
        })

        const res = await sendRequest.json();
        
        
        $('#success-message').addClass("d-block");
        setTimeout(function() {
            if(res.code===0){
                location.reload();
            }
        }, 500);
    })

    //reset pass
    document.getElementById('reset-btn').addEventListener('click', () => {
        const successMessage = document.getElementById('succmessage');
        successMessage.style.display = "block";
            successMessage.innerHTML = 'Reset password success';
    })
}
else if(inputpage === 'indexphp'){
    
    
    
    //xóa
    let currentID;
    const employeeDeleteName = document.querySelector('.employee-delete-name');
    function handleTransferToDelete(name, id){
        employeeDeleteName.innerHTML = name;
        currentID = id;
    }
    document.getElementById('btn-del').addEventListener('click',async () =>{
        const request = await fetch('delete_employee.php',{
            method: 'delete',
            body: JSON.stringify({id:currentID}),
            headers: {
                "Content-Type": "application/json"
            },
        })
        
        const res = await request.json();
        reloadPage(res);
    })
    function reloadPage(res){
        if(res.code===0){
            location.reload();
        }
    }
}