<?php
// Include database connection
include '../../../php/connexion.php';

 
    



$sql2 = "DELETE FROM `niveau` WHERE id_niveau=?";

// Prepare the statement
$stmt2 = $db->prepare($sql2);

// Execute the statement
$stmt2->execute([$_GET['id_niveau']]);



header("location:../Show/showNiveau.php")

 
   


?>