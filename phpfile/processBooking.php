<?php

include_once("config.php");

$name = $_POST["Name"];
$phoneNum = $_POST["PhoneNum"];
$dateTime = $_POST["DateTime"];
$people = $_POST["people"];

$sql="INSERT INTO bookingdb ( `Name`, `Phone Number`, `Date and Time`, `Amount People`) VALUES (?, ?, ?, ?)";
$statement = $connection->prepare($sql);
$statement->bind_param("siss", $name, $phoneNum, $dateTime, $people);
$statement->execute();

$statement->close();
$connection->close();

?>