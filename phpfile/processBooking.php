<?php

include_once("config.php");

session_start();

$username = $_SESSION['username'];
$name = $_POST["Name"];
$phoneNum = $_POST["PhoneNum"];
$dateTime = $_POST["DateTime"];
$people = $_POST["people"];

$_SESSION['name'] = $name;
$_SESSION['phoneNum'] = $phoneNum;
$_SESSION['dateTime'] = $dateTime;
$_SESSION['people'] = $people;

$sql="INSERT INTO bookingdb ( `Username`, `Name`, `Phone Number`, `Date and Time`, `Amount People`) VALUES (?, ?, ?, ?, ?)";
$statement = $conn->prepare($sql);
$statement->bind_param("ssiss", $username, $name, $phoneNum, $dateTime, $people);
$statement->execute();

$statement->close();
$conn->close();

?>