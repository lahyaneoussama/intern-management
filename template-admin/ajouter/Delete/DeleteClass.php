<?php
// Include database connection
include '../../../php/connexion.php';

 
    


$sql2 = "DELETE FROM `class` WHERE class_id=?";

// Prepare the statement
$stmt2 = $db->prepare($sql2);

// Execute the statement
$stmt2->execute([$_GET['class_id']]);



header("location:../Show/showClass.php")


?>