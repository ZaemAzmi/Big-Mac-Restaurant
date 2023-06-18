<?php
// @include 'config.php';

$host = "localhost";
$database = "webprogramming";
$user = "root";
$pass = "";

$connection = mysqli_connect($host, $user, $pass, $database);
if ( mysqli_connect_errno() ) {
    echo "Database connection failed";
    die( mysqli_connect_error() );
    // die() is equivalent to exit()
}

// echo "Database connected successfully<br><br>";

$sql = "SELECT * FROM bookingdb";
$result = $connection->query($sql);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['BookingID'] . "</td>";
        echo "<td>" . $row['Username'] . "</td>";
        echo "<td>" . $row['Name'] . "</td>";
        echo "<td>" . $row['Phone Number'] . "</td>";
        echo "<td>" . $row['Cost'] . "</td>";
        echo "<td>" . $row['Amount People'] . "</td>";
        echo "<td>" . $row['Table Number'] . "</td>";
        echo "<td>" . $row['Date and Time'] . "</td>";
        echo "<td>" . $row['Preorder Menu'] . "</td>";

        echo "</tr>";
    }
} else {
    echo " No available data.";
}
$connection->close();
?>
