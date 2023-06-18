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
    
    // Query the respective table based on the login option
    $tableName = ($loginOption === "admin") ? "Admin_Info" : "User_Info";
    $query = "SELECT * FROM $tableName WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($connection, $query);

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

        // Redirect to the home page or profile page based on the login option
        if ($loginOption === "admin") {
            header("Location: /Pr/Adacc.html");
        } else {
            header("Location: /Pr/index.html");
        }
        exit(); // Terminate the current script to prevent further execution
    } else {
        // User doesn't exist or incorrect credentials
        echo "Invalid username or password!";
    }
}

// Close the database connection
mysqli_close($connection);
?>
