<?php
// Retrieve form data
$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$gender = $_POST['gender'];
$birthday = $_POST['birthday'];
$username = $_POST['username'];
$password = $_POST['password'];
$propic = $_POST['propic'];

// Database connection parameters
$host = 'sql12.freesqldatabase.com';
$dbName = 'sql12625052';
$dbUser = 'sql12625052';
$dbPassword = 'IrYI8vMNgQ';
$port = 3306;

// Create a new PDO instance
try {
    $dsn = "mysql:host=$host;port=$port;dbname=$dbName;charset=utf8";
    $pdo = new PDO($dsn, $dbUser, $dbPassword);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

// Check for existing records
$stmt = $pdo->prepare("SELECT * FROM User_Info WHERE username = ? OR email = ? OR phone = ?");
$stmt->execute([$username, $email, $phone]);

if ($stmt->rowCount() > 0) {
    // Display error message and prompt user to enter unique details
    echo "Username, email, or phone number is already in use. Please enter unique details.";
} else {
    // Insert new record
    $insertStmt = $pdo->prepare("INSERT INTO User_Info (name, phone, email, gender, birthday, username, password, propic) 
                                VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $insertStmt->execute([$name, $phone, $email, $gender, $birthday, $username, $password, $propic]);

    // Check if the insertion was successful
    if ($insertStmt->rowCount() > 0) {
        // Redirect to login.html
        header('Location: /Pr/login.html');
        exit();
    } else {
        echo "Registration failed.";
    }
}
?>
