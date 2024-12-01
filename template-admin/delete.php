<?php
// Include database connection
include '../php/connexion.php';

 
    


// Prepare the DELETE SQL statement
$sql = "DELETE FROM `users` WHERE User_id=?";

// Prepare the statement
$stmt = $db->prepare($sql);



// Execute the statement
$stmt->execute([$_GET['User_id']]);

$sql2 = "DELETE FROM `stagaire` WHERE User_id=?";

// Prepare the statement
$stmt2 = $db->prepare($sql2);

// Execute the statement
$stmt2->execute([$_GET['User_id']]);



header("location:stagaire.php")

 
   


?>
