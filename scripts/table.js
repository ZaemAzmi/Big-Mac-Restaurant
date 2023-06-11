function tableClicked(tableNumber) {
    // Send an AJAX request to the server
    const xhr = new XMLHttpRequest();
    xhr.open('POST', 'phpfile/processTable.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onload = function () {
      if (xhr.status === 200) {
        // Handle the server response if needed
        console.log('Table inserted successfully');
      } else {
        console.error('Error inserting table:', xhr.status);
      }
    };
    xhr.onerror = function () {
      console.error('An error occurred while inserting the table.');
    };
    xhr.send('tableNumber=' + encodeURIComponent(tableNumber));
    location.href = 'altPreorder.html';
  }

function previousClicked(){
    location.href = 'book.html';
}

function confirmClicked(){
    location.href = 'altPreorder.html';
}