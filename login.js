var username = document.querySelector("#enterUsername");
var password = document.querySelector("#enterPassword");
var form = document.querySelector("#loginForm");

form.addEventListener("submit", function(event){
    event.preventDefault();

    if(username.value=="admin" && password.value=="admin"){
        form.action="Adacc.html";
        form.submit();
    }else if(username.value=="user" && password.value=="user"){
        form.action="Profile.html";
        form.submit();
    }else{
        alert("Wrong username or password.")
    }
});