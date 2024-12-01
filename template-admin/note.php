<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="stagaire.css">
    <title>Gestion de stagair</title>
</head>
<body>
<?php
// Include database connection
include '../php/connexion.php';
// Start the session
session_start(); 

$Fname = $_SESSION['type']['First_name'];
$Lname = $_SESSION['type']['last_name']; ?>
    
        <header>
            <img src="../img/logo.png" alt="Logo" class="logo">
            <div class="header-admin">
                <p>Opérateur de saisie - Année Scolaire: <select id="year-select">
                    <option value="2023-2024">2023-2024</option>
                    <!-- Add more years here -->
                </select></p>
                <div class="profile">
                    <img src="<?php 

                        // Determine the appropriate image based on the user's gender
                        if ($_SESSION['type']['Genre'] == 'homme') {
                            // If the user is a man, use the user.jpeg image
                            echo '../img/ph-scoliare/user/man.png';
                        } else if ($_SESSION['type']['Genre'] == 'femme') {
                            // If the user is a woman, use the lic.jpg image
                            echo '../img/ph-scoliare/user/women.png';
                        } 
                        ?>" alt="Admin" class="profile-pic">
                    <span id="name">
                        <i class="fa-solid fa-angle-down"></i>
                    </span>
                    <div id="nav-systeme">
                      <p> <a href=""><i class="fa-solid fa-gear"></i>Ajoute Année Scolaire</a></p>
                      <p> <a href=""><i class="fa-solid fa-gear"></i>Ajoute de modules</a></p>
                      <p> <a href=""><i class="fa-solid fa-gear"></i>Ajoute de Matieres</a></p>
                      <p> <a href=""><i class="fa-solid fa-gear"></i>Ajoute de Matieres</a></p>
                      <div class="deconexion">
                        <a href=""><i class="fa-solid fa-right-from-bracket"></i>Deconnecion</a> 
                      </div>
                    </div>
                </div>
            </div>
        </header>
        <div class="content">
        <aside class="aside">
            <nav>
                <ul>
                <li class="img-admin">
                        <img class='img-admin' src="<?php 

                    // Determine the appropriate image based on the user's gender
                    if ($_SESSION['type']['Genre'] == 'homme') {
                        // If the user is a man, use the user.jpeg image
                        echo '../img/ph-scoliare/user/man.png';
                    } else if ($_SESSION['type']['Genre'] == 'femme') {
                        // If the user is a woman, use the lic.jpg image
                        echo '../img/ph-scoliare/user/women.png';
                    } 
                    ?>
                    " alt="">
                    
                    <p><?=  $Fname .' '. $Lname ?></p></li>
                    <li><a href="home.php">Tableau de Bord</a></li>
                    
                    <li><a href="note.php">Notes</a></li>
                    <li><a href="stagaire.php">Stagaire</a></li>
                    <li><a href="prof.php">Prof</a></li>
                    <li><a href="notification.php">Notification</a> </li>
                    
                </ul>
            </nav>
            <button>View Profile</button>
        </aside>
    <div class="content-page" id="content-page">
        <div class="container-header">
            <div class="notes-header">
                <h2> Notes</h2>
                <div class="filter-container">
                    <div class="filter">
                        <label for="annee-scolaire">Fiellier</label>
                        <select id="annee-scolaire">
                        <?php
                        $mysql = "SELECT filiere_id, filiere_name FROM `filiere`";
                        $req = $db->prepare($mysql);
                        $req->execute();
                        $fillieres = $req->fetchAll(PDO::FETCH_ASSOC);
                        foreach ($fillieres as $fil):
                        ?>
                            <option value="<?= ($fil['filiere_id']) ?>"><?= ($fil['filiere_name']) ?></option>
                        <?php endforeach; ?>
                            <!-- Add more options as needed -->
                        </select>
                    </div>
                    <div class="filter">
                        <label for="session">Annee</label>
                        <select id="session">
                            <option>Premier Annee</option>
                            <option>deuixeme Annee</option>
                            
                            <!-- Add more options as needed -->
                        </select>
                    </div>
                    <div class="filter">
                        <label for="session">class</label>
                        <select id="session">
                            <?php
                        $clas = "SELECT `class_id`,`class_name` FROM `class`";
                        $req3 = $db->prepare($clas);
                        $req3->execute();
                        $classes = $req3->fetchAll(PDO::FETCH_ASSOC);
                        foreach ($classes as $classe):
                        ?>
                            <option value="<?= $classe['class_id']?>"><?= $classe['class_name'] ?></option>
                        <?php endforeach; ?>
                        </select>
                    </div>
                    <button class="search-btn" id="search" style="color:white">Rechercher 🔍</button>
                 
                    
                </div>
            </div>
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>Numero De Stagiaire</th>
                            <th>Nom & Prenom</th>
                            <th>date Naissance </th>
                            <th>Fiellier</th>
                            <th>Class</th>
                            <th>Note 1er Année</th>
                            <th>Note 2er Année</th>
                        
                            <th>Action</th>
                        </tr>
                    </thead>
                  <tbody></tbody>
                       
                </table>
            </div>
        </div>
       <script src="../fromwoke/jquery-3.7.1.min.js"></script>
       <script src="../js/jus.js"></script>
</body>
</html>