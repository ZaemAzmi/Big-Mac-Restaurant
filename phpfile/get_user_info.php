<?php
// Database connection settings
$host = 'sql12.freesqldatabase.com';
$dbName = 'sql12625052';
$user = 'sql12625052';
$password = 'IrYI8vMNgQ';
$port = 3306;

// Connect to the database
$dsn = "mysql:host=$host;dbname=$dbName;port=$port";
$pdo = new PDO($dsn, $user, $password);

// Retrieve username and email from User_Info table
$query = 'SELECT username, email, "user" as type FROM User_Info';
$stmt = $pdo->query($query);
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Output the data as JSON
header('Content-Type: application/json');
echo json_encode($result);
?>
