<?php
session_start();

// Clear all session variables
$_SESSION = array();

// Destroy the session
session_destroy();

// Return a response to indicate successful logout
echo json_encode(array("loggedOut" => true));
?>
