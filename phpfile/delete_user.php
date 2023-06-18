<?php
// Database connection settings
$host = 'sql12.freesqldatabase.com';
$dbName = 'sql12625052';
$user = 'sql12625052';
$password = 'IrYI8vMNgQ';
$port = 3306;

// Get the username from the request
$username = $_POST['username'];

// Connect to the database
$dsn = "mysql:host=$host;dbname=$dbName;port=$port";
$pdo = new PDO($dsn, $user, $password);

// Delete the user from the User_Info table
$query = 'DELETE FROM User_Info WHERE username = :username';
$stmt = $pdo->prepare($query);
$stmt->bindParam(':username', $username, PDO::PARAM_STR);
$stmt->execute();

// Return success message
echo 'User deleted successfully!';
?>
