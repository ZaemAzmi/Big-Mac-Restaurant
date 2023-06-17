<?php
session_start();
if (isset($_SESSION['username'])) {
  echo json_encode(array(
    "loggedIn" => true,
    "username" => $_SESSION['username'],
    "name" => $_SESSION['name'],
    "phoneNumber" => $_SESSION['phoneNumber'],
    "gender" => $_SESSION['gender'],
    "email" => $_SESSION['email'],
    "birthday" => $_SESSION['birthday'],
    "age" => $_SESSION['age'],
    "propic" => $_SESSION['propic']
));
} else {
  echo json_encode(array("loggedIn" => false));
}
?>
