<?php

include_once("config.php");

session_start();

$name = $_POST["Name"];
$phoneNum = $_POST["PhoneNum"];
$dateTime = $_POST["DateTime"];
$people = $_POST["people"];

$_SESSION['name'] = $name;
$_SESSION['phoneNum'] = $phoneNum;
$_SESSION['dateTime'] = $dateTime;
$_SESSION['people'] = $people;

$sql="INSERT INTO bookingdb ( `Name`, `Phone Number`, `Date and Time`, `Amount People`) VALUES (?, ?, ?, ?)";
$statement = $connection->prepare($sql);
$statement->bind_param("siss", $name, $phoneNum, $dateTime, $people);
$statement->execute();

$statement->close();
$connection->close();

?>