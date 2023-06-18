<?php
// Check if the 'cartData' key is present in the POST request
if (isset($_POST['cartData'])) {
    // Decode the 'cartData' JSON and assign it to $cartData variable
    $cartData = json_decode($_POST['cartData'], true);

    // Check if $cartData is an array
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

            // Prepare the insert statement
            $stmt = $pdo->prepare("INSERT INTO cartdb (Item, Quantity, Price) VALUES (:Item, :Quantity, :Price)");

            // Iterate over the cart data and insert each item into the database
            foreach ($cartData as $item) {
                $stmt->execute([
                    'Item' => $item['Item'],
                    'Quantity' => $item['Quantity'],
                    'Price' => $item['Price']
                ]);
            }

            // Send a success response
            echo json_encode(['status' => 'success']);
        } catch (PDOException $e) {
            // Handle database connection or insertion errors
            echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
        }
    } else {
        // Invalid cartData format
        echo json_encode(['status' => 'error', 'message' => 'Invalid cart data format']);
    }
} else {
    // cartData key not found in the POST request
    echo json_encode(['status' => 'error', 'message' => 'cartData key not found']);
}
?>
