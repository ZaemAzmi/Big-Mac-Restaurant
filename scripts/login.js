var username = document.querySelector("#enterUsername");
var password = document.querySelector("#enterPassword");
var loginOption = document.querySelector("#loginAs");
var form = document.querySelector("#loginForm");

form.addEventListener("submit", function(event) {
  event.preventDefault();

  var formData = new FormData();
  formData.append("username", username.value);
  formData.append("password", password.value);
  formData.append("loginAs", loginOption.value);

  var xhr = new XMLHttpRequest();
  xhr.open("POST", "LoginVer.php", true);

  xhr.onreadystatechange = function() {
    if (xhr.readyState === 4 && xhr.status === 200) {
      var response = xhr.responseText;
      if (response === "admin") {
        form.action = "Adacc.html";
        form.submit();
      } else if (response === "user") {
        form.action = "Profile.html";
        form.submit();
      } else {
        alert("Wrong username or password.");
      }
    }
  };

  xhr.send(formData);
});

function updateLoginOption(select) {
  document.getElementById('loginOption').value = select.value;
}
