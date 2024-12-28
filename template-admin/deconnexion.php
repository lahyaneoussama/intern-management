

<?php
// Start the session
session_start();

// Destroy all sessions and redirect to login page
session_destroy();
header("Location:../index.php"); // Redirect to the login page
exit;
?>

