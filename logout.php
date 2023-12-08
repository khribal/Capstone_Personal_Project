<?php
session_start(); // Start the session

// Unset all session variables
session_unset();

// Destroy the session
session_destroy();

// Redirect to the home page or any other page after logout
header('Location: home.php');
exit();
?>