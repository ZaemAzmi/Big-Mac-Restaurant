<?php
include_once("config.php");

session_start();

$table = $_POST["tableNumber"];
$intTable = intval($table);
$username = $_SESSION['username'];
$name = $_SESSION['name'];

$sql = "UPDATE bookingdb SET `Table Number` = ? WHERE Username = ? AND Name = ?";
$statement = $conn->prepare($sql);
$statement->bind_param("sss", $table, $username, $name);
$statement->execute();

$booked = "Booked";
$sql = "UPDATE tabledb SET `Status` = ? WHERE `Table Number` = ?";
$statement = $conn->prepare($sql);
$statement->bind_param("si", $booked, $intTable);
$statement->execute();

$statement->close();
$conn->close();
?>
