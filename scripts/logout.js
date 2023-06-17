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
          $("#name1").text(response.name);
          $("#name2").text(response.name);
          $("#gender").text(response.gender);
          $("#phonenum1").text(response.phoneNumber);
          $("#phonenum2").text(response.phoneNumber);
          $("#age").text(response.age);
          $("#birthday").text(response.birthday);
          $("#email").text(response.email);
          $("#email").text(response.email);
          
          if (response.propic == 1) {
            $("#profile-pic").attr("src", "images/icon1.png");
          } else if (response.propic == 2) {
            $("#profile-pic").attr("src", "images/icon2.png");
          } else if (response.propic == 3) {
            $("#profile-pic").attr("src", "images/icon3.png");
          } else if (response.propic == 4) {
            $("#profile-pic").attr("src", "images/icon4.png");
          } else if (response.propic == 5) {
            $("#profile-pic").attr("src", "images/icon5.png");
          } else if (response.propic == 6) {
            $("#profile-pic").attr("src", "images/icon6.png");
          }
        
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