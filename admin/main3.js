function suggest(value) {
    $.get(
    "searchEmployee.php?search-text=" + value,
    (data) => {
        $("#suggestions li").remove();
        data.forEach((country) => {
        let item = `<li onclick="handleClickLi(this)" class="list-group-item" style="cursor: pointer;">${capitalizeFirstLetter(
            country
        )}</li>`;
        $("#suggestions").append(item);
        });
    },
    "json"
    );
}
function capitalizeFirstLetter(string) {
    return string.charAt(0).toUpperCase() + string.slice(1);
}

let inputSearch = document.querySelector('.input-search-employee')
let listGroupItem = document.querySelectorAll('.list-group-item');

function handleClickLi(nameitem){
    inputSearch.value = nameitem.innerHTML;
    $("#suggestions li").remove();
}

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