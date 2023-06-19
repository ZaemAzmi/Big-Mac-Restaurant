<?php
include_once("config.php");

session_start();

$table = intval($_POST["tableNumber"]);
$username = $_SESSION['username'];
$name = $_SESSION['name'];

$sql = "UPDATE bookingdb SET `Table Number` = ? WHERE Username = ? AND Name = ?";
$statement = $conn->prepare($sql);
$statement->bind_param("iss", $table, $username, $name);
$statement->execute();

$booked = "Booked";
$sql = "UPDATE tabledb SET `Status` = ? WHERE `Table Number` = ?";
$statement = $conn->prepare($sql);
$statement->bind_param("si", $booked, $table);
$statement->execute();

$statement->close();
$conn->close();
?>
