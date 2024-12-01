<?php 

// Database connection 
$user = "root"; // Database username
$pass = ""; // Database password 
$dsn = "mysql:host=localhost;dbname=g_stagaire"; // Data Source Name

// Attempt to create a new PDO instance
try {

    // Create a new PDO instance with (DSN, username, and password) 
    $db = new PDO($dsn, $user, $pass);
 
}
catch(PDOException $e) {
    // If an exception is thrown, catch it and display an error message
    echo "Error: " . $e->getMessage();
};
?>
