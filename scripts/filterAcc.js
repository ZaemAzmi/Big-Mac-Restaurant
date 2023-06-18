$(document).ready(function() {
    // Fetch user info from the PHP file for User_Info table
    $.getJSON('pr/phpfile/get_user_info.php', function(userData) {
      // Fetch user info from the PHP file for Admin_Info table
      $.getJSON('pr/phpfile/get_admin_info.php', function(adminData) {
        // Combine user and admin data into a single array
        var data = userData.concat(adminData);
  
        // Generate HTML table rows
        var rows = '';
        $.each(data, function(index, user) {
          rows += '<tr>';
          rows += '<td>' + (index + 1) + '</td>';
          rows += '<td class="username">' + user.username + '</td>';
          rows += '<td>' + user.email + '</td>';
          rows += '<td class="userType">' + (user.type === 'admin' ? 'Admin' : 'User') + '</td>';
          rows += '<td>';
          rows += '<p style="text-align: center;">';
          rows += '<img src="images/editicon.png" alt="acc" width="30" height="30">&nbsp;&nbsp;';
          rows += '<img id="' + (index + 1) + '" class="delete" src="images/delicon.png" alt="acc" width="30" height="30">';
          rows += '</p>';
          rows += '</td>';
          rows += '</tr>';
        });
  
        // Update the table body with the generated rows
        $('#accTab tbody').html(rows);
      });
    });
  
    // Filter table based on user type selection
    $('#filter').on('change', function() {
      var userType = $(this).val();
  
      // Show/hide rows based on user type
      if (userType === 'user') {
        $('.userType').each(function() {
          var type = $(this).text();
          if (type !== 'User') {
            $(this).closest('tr').hide();
          } else {
            $(this).closest('tr').show();
          }
        });
      } else if (userType === 'admin') {
        $('.userType').each(function() {
          var type = $(this).text();
          if (type !== 'Admin') {
            $(this).closest('tr').hide();
          } else {
            $(this).closest('tr').show();
          }
        });
      } else {
        $('tbody tr').show();
      }
    });
  });
  