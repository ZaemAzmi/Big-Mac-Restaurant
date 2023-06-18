<?php
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
    // Get the username, password, and login option from the form
    $username = $_POST["username"];
    $password = $_POST["password"];
    $loginOption = $_POST["loginAs"];
    
    // Set the table name based on the login option
    $tableName = ($loginOption === "admin") ? "Admin_Info" : "User_Info";

    // Prepare the query to prevent SQL injection
    $query = "SELECT * FROM $tableName WHERE username = ? AND password = ?";
    $statement = mysqli_prepare($connection, $query);
    mysqli_stmt_bind_param($statement, "ss", $username, $password);
    mysqli_stmt_execute($statement);
    $result = mysqli_stmt_get_result($statement);

    if (mysqli_num_rows($result) == 1) {
        // User exists, login successful
        // Retrieve the user's details
        $user = mysqli_fetch_assoc($result);

        // Store the user's details in session variables
        session_start();
        $_SESSION['username'] = $username;
        $_SESSION['name'] = $user['name'];
        $_SESSION['phoneNumber'] = $user['phone'];
        $_SESSION['gender'] = $user['gender'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['birthday'] = $user['birthday'];
        $_SESSION['age'] = $user['age'];
        $_SESSION['propic'] = $user['propic'];

        echo "success";
        exit(); // Terminate the script after sending the response
    } else {
        // User doesn't exist or incorrect credentials
        echo "invalid";
        exit(); // Terminate the script after sending the response
    }
}

// Close the statement and database connection
mysqli_stmt_close($statement);
mysqli_close($connection);
?>
