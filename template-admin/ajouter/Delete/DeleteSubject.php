<?php
// Include database connection
include '../../../php/connexion.php';

 
    




$sql2 = "DELETE FROM `subject` WHERE subject_id=?";

// Prepare the statement
$stmt2 = $db->prepare($sql2);

// Execute the statement
$stmt2->execute([$_GET['subject_id']]);



header("location:../Show/showMatiere.php")

 
   


?>