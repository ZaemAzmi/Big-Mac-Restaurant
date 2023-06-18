var username = document.querySelector("#enterUsername");
var password = document.querySelector("#enterPassword");
var loginOption = document.querySelector("#loginAs");
var form = document.querySelector("#loginForm");

form.addEventListener("submit", function (event) {
    event.preventDefault();

    if (username.value === "admin" && password.value === "admin123" && loginOption.value === "admin") {
        form.action = "Adacc.html";
        form.submit();
    } else if (username.value === "user" && password.value === "user123" && loginOption.value === "user") {
        form.action = "Profile.html";
        form.submit();
    } else {
        alert("Wrong username, password, or login credential");
    }
});

function updateLoginOption(select) {
    document.getElementById('loginOption').value = select.value;
}
