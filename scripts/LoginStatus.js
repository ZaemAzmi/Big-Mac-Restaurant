$(document).ready(function() {
    // Function to fetch the login status from the server
    function fetchLoginStatus() {
      $.ajax({
        url: "phpfile/login_status.php",
        method: "GET",
        dataType: "json",
        success: function(data) {
          if (data.loggedIn) {
            // User is logged in, update the login button with the username
            $("#logbutton").text(data.username);
          } else {
            // User is not logged in, display the login button
            $("#logbutton").text("Login");
          }
        },
        error: function() {
          // Handle error if unable to fetch login status
          console.log("Error fetching login status.");
        }
      });
    }

    // Call the fetchLoginStatus function on page load
    fetchLoginStatus();
  });