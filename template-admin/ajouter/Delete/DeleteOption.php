<?php
// Include database connection
include '../../../php/connexion.php';

 
    



$sql2 = "DELETE FROM `options` WHERE id_option=?";

// Prepare the statement
$stmt2 = $db->prepare($sql2);

// Execute the statement
$stmt2->execute([$_GET['id_option']]);



header("location:../Show/showOption.php")

 
   


?>