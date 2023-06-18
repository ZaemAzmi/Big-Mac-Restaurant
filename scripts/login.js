var username = document.getElementById("enterUsername");
var password = document.getElementById("enterPassword");
var loginOption = document.getElementById("loginAs");
var form = document.getElementById("loginForm");

form.addEventListener("submit", function (event) {
    event.preventDefault();

    var xhr = new XMLHttpRequest();
    xhr.open("POST", "phpfile/LoginVer.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    xhr.onreadystatechange = function () {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                if (xhr.responseText === "success") {
                    if (loginOption.value === "admin") {
                        form.action = "Adacc.html";
                    } else {
                        form.action = "index.html";
                    }
                    form.submit();
                } else {
                    alert("Invalid username, password, or login credential");
                }
            } else {
                alert("An error occurred while processing the request.");
            }
        }
    };

    var params = "username=" + encodeURIComponent(username.value) + "&password=" + encodeURIComponent(password.value) + "&loginAs=" + encodeURIComponent(loginOption.value);
    xhr.send(params);
});

function updateLoginOption(select) {
    document.getElementById('loginOption').value = select.value;
}
