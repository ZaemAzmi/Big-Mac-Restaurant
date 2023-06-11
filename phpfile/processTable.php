<?php

include_once("config.php");

session_start();

$table = $_POST["tableNumber"];

$_SESSION['table'] = $table;

$sql="UPDATE bookingdb SET `Table Number` = ? WHERE Name = ?";
$statement = $connection->prepare($sql);
$statement->bind_param("ss", $table, $_SESSION['name']);
$statement->execute();

$statement->close();
$connection->close();

?>