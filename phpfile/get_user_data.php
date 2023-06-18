<?php
// Database connection settings
$host = 'sql12.freesqldatabase.com';
$dbName = 'sql12625052';
$user = 'sql12625052';
$password = 'IrYI8vMNgQ';
$port = 3306;

// Retrieve the username from the request
$username = $_GET['username'];

try {
    // Connect to the database
    $dsn = "mysql:host=$host;dbname=$dbName;port=$port";
    $pdo = new PDO($dsn, $user, $password);

    // Prepare and execute the query
    $query = 'SELECT * FROM User_Info WHERE username = :username';
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':username', $username);
    $stmt->execute();

    // Fetch the user data
    $userData = $stmt->fetch(PDO::FETCH_ASSOC);

    // Output the data as JSON
    header('Content-Type: application/json');
    echo json_encode($userData);
} catch (PDOException $e) {
    // Handle database errors
    die('Error: ' . $e->getMessage());
}
?>
