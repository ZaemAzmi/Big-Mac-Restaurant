function tableClicked(tableNumber) {
  // Show a confirm dialog box
  var confirmBox = confirm("Are you sure you want to choose this table?");

  if (confirmBox) {
    // Send an AJAX request to the server
    const xhr = new XMLHttpRequest();
    xhr.open('POST', '../phpfile/processTable.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onload = function () {
      if (xhr.status === 200) {
        // Handle the server response if needed
        console.log('Table inserted and updated successfully');
        location.href = 'http://localhost/Pr/phpfile/userMenu.php'; // Redirect to the next page
      } else {
        console.error('Error inserting and updating table:', xhr.status);
      }
    };
    xhr.onerror = function () {
      console.error('An error occurred while inserting and updating the table.');
    };
    xhr.send('tableNumber=' + encodeURIComponent(tableNumber));
  }
}

function previousClicked() {
  location.href = 'http://localhost/Pr/book.html';
}
