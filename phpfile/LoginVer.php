<?php

include "config.php";
// Database connection details
$host = 'sql12.freesqldatabase.com';
$dbName = 'sql12625052';
$username = 'sql12625052';
$password = 'IrYI8vMNgQ';
$port = 3306;

// Establish the database connection
$connection = mysqli_connect($host, $username, $password, $dbName, $port);

// Check if the connection was successful
if (!$connection) {
    die('Database connection failed: ' . mysqli_connect_error());
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the username and password from the form
    $username = $_POST["username"];
    $password = $_POST["password"];
    
    // Query the database to check if the user exists
    $query = "SELECT * FROM User_Info WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($connection, $query);

    if (mysqli_num_rows($result) == 1) {
        // User exists, login successful
        // Redirect to the home page
        // User exists, login successful
        // Store the username in a session variable
        session_start();
        $_SESSION['username'] = $username;

        // Store the username in a session variable
        header("Location: /Pr/index.html");
        exit(); // Terminate the current script to prevent further execution
    } else {
        // User doesn't exist or incorrect credentials
        echo "Invalid username or password!";
    }

    // Debugging statements
// if (!$result) {
//     echo "Query execution failed: " . mysqli_error($connection);
// } else {
//     echo "Query executed successfully. Rows: " . mysqli_num_rows($result);
// }
}

// Close the database connection
mysqli_close($connection);
?>
