<?php
// Include database connection
include '../../../php/connexion.php';

 


$sql2 = "DELETE FROM filiere WHERE filiere_id=?";

// Prepare the statement
$stmt2 = $db->prepare($sql2);

// Execute the statement
$stmt2->execute([$_GET['filiere_id']]);



header("location:../Show/showFiliere.php")

 
   


?>