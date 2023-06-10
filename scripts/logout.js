// Check login status
$(document).ready(function() {
    $.ajax({
      url: "phpfile/login_status.php",
      type: "GET",
      dataType: "json",
      success: function(response) {
        if (response.loggedIn) {
          $("#logbutton").text("Welcome, " + response.username);
          $("#logoutButton").show();
          $("#accicon").show();
          // $("#logbutton").click(function() {
          //   window.location.href = "profile.html";
          // });
        } else {
          $("#logbutton").text("Login");
          $("#logoutButton").hide();
          $("#accicon").hide();
          $("#dropdownContainer").hide();
          $("#logbutton").click(function() {
            window.location.href = "login.html";
          });
        } 
      },
      error: function() {
        console.log("Error fetching login status.");
      }
    });
  });

  // Logout function
  function logout() {
    $.ajax({
      url: "phpfile/logout.php",
      type: "GET",
      dataType: "json",
      success: function(response) {
        window.location.href = "login.html";
        if (response.success) {
          location.reload();
        }
      }
    });
  }