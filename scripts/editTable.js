var table=document.querySelector("table");
var delIcon = document.querySelectorAll(".delete");

for(var i=0; i<delIcon.length; i++){

    delIcon[i].addEventListener("click", function(event){
        var clicked = event.target;
        var row = clicked.closest("tr");
        table.deleteRow(row.rowIndex);
    });
}