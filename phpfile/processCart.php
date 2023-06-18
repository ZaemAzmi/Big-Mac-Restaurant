<?php
// Check if the 'cartData' and 'bookingData' keys are present in the POST request
if (isset($_POST['cartData'])) {
    // Retrieve the 'Username' and 'Name' values from the session
    session_start();
    $username = $_SESSION['username'];
    $name = $_SESSION['name'];

    // Decode the 'cartData' and 'bookingData' JSON and assign them to variables
    $cartData = json_decode($_POST['cartData'], true);
    // $bookingData = json_decode($_POST['bookingData'], true);

    // Check if $cartData and $bookingData are arrays
    if (is_array($cartData)) {
        // Database connection configuration
        $host = "localhost";
        $dbname = "webprogramming";
        $user = "root";
        $password = "";

        // Create a new PDO instance
        try {
            $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Insert cart data into 'cartdb' table
            $stmtCart = $pdo->prepare("INSERT INTO cartdb (Username, Name, Item, Quantity, Price) VALUES (:Username, :Name, :Item, :Quantity, :Price)");
            foreach ($cartData as $item) {
                $stmtCart->execute([
                    'Username' => $username,
                    'Name' => $name,
                    'Item' => $item['Item'],
                    'Quantity' => $item['Quantity'],
                    'Price' => $item['Price']
                ]);
            }

            // Insert booking data into 'bookingdb' table
            // $stmtBooking = $pdo->prepare("INSERT INTO bookingdb (Price) VALUES (:Price)");
            // $stmtBooking->execute([
            //     'Price' => $totalPrice

            // ]);

            // Send a success response
            echo json_encode(['status' => 'success']);
        } catch (PDOException $e) {
            // Handle database connection or insertion errors
            echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
        }
    } else {
        // Invalid cartData or bookingData format
        echo json_encode(['status' => 'error', 'message' => 'Invalid cart or booking data format']);
    }
} else {
    // cartData or bookingData key not found in the POST request
    echo json_encode(['status' => 'error', 'message' => 'cartData or bookingData key not found']);
}
?>
