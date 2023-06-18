<?php

$host = "localhost";
$database = "webprogramming";
$user = "user1";
$pass = "user1abc";

$conn = mysqli_connect($host, $user, $pass, $database);

if ( mysqli_connect_errno() ) {
  echo "Database connection failed";
   die( mysqli_connect_error() );
    // die() is equivalent to exit()
}

echo "Database connected successfully<br><br>";

$conn = mysqli_connect('localhost', 'root','','menu_db')

?>