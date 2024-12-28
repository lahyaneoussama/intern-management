<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion de stagaire</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="css/Profil.css">
</head>
<body>
    <?php
        // Include database connection
        include '../php/connexion.php'; 

        // Start the session
        session_start(); 

        $Lname = $_SESSION['type']['Nom'];
        $Fname = $_SESSION['type']['Prenom'];
        $email = $_SESSION['type']['Email'];
        $Genre = $_SESSION['type']['Genre'];
        $DteNa = $_SESSION['type']['Date_naissance'];
        $Enrollement = $_SESSION['type']['Enrollement'];
        $pays = $_SESSION['type']['pays'];
        $adresse = $_SESSION['type']['adresse'];
        $Phone = $_SESSION['type']['Phone'];
        $Etablissement = $_SESSION['type']['Etablissement'];
        $Ville = $_SESSION['type']['Ville'];
        $role = $_SESSION['type']['Role'];
        

    
       

    ?>
    
    <div class="container1">
    <header>
        <img src="../img/logo/lg3.png" alt="Logo" class="logo">
        <div class="header-admin">
            <p>Opérateur de saisie - Année Scolaire: 
                <select id="year-select">
                    <option value="2023-2024">2023-2024</option>
                    <!-- Add more years here -->
                </select>
            </p>
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
                <p><a href="./ajouter/Insert/AnneScolaire.php"><i class="fa-solid fa-gear"></i> Ajouter  Année Scolaire</a></p>
                <p><a href="./ajouter/Insert/matiere.php"><i class="fa-solid fa-gear"></i> Ajouter une Matière</a></p>
                <p><a href="./ajouter/Insert/Class.php"><i class="fa-solid fa-gear"></i> Ajouter une Classe</a></p>
                <p><a href="./ajouter/Insert/Filliere.php"><i class="fa-solid fa-gear"></i> Ajouter une Filliere</a></p>
                <p><a href="./ajouter/Insert/Option.php"><i class="fa-solid fa-gear"></i> Ajouter une Option</a></p>
                <p><a href="./ajouter/Insert/Niveau.php"><i class="fa-solid fa-gear"></i> Ajouter un Niveau</a></p>

                    <div class="deconexion">
                        <a href="deconnexion.php" name="Déconnexion"><i class="fa-solid fa-right-from-bracket"></i>Déconnexion</a> 
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
                    
                    <p><?=  $Lname .' '. $Fname ?></p></li>
                  <li><a href="home.php">Tableau de Bord</a></li>
                    <li><a href="note.php">Notes</a></li>
                    <li><a href="stagaire.php">Stagaire</a></li>
                    <li><a href="prof.php">Prof</a></li>
                    <!-- <li><a href="?">Demandes d'Attestation</a></li> -->
                    <li><a href="notification.php">Notification</a> </li>
                </ul>
            </nav>
            <button>
                <a href="Profil.php">View Profile</a>
            </button>
        </aside>

        <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="profile.css">
</head>
<body>
    <div class="profile-container">
        <div class="profile-header">
            <div class="profile-image">
                <img src="../img/ph-scoliare/user/man.png" alt="User Photo">
            </div>
            <div class="profile-details">
                <h2><?=  $Fname.' '.$Lname ?></h2>
                <hr>
                <p class="Role"><?=  $role ?></p>
                <p class="Etablisement"><?=  $Etablissement ?></p>
                
            </div>
            <button class="edit-button">
                <i class="fa-solid fa-pen"></i> Edit
            </button>
        </div>

        <div class="profile-section">
            <h3>Informations personnelles</h3>
            
            <div class="section-content">
                <div class="info-group">
                    <label>Prénom</label>
                    <p><?=$Fname ?></p>
                </div>
                <div class="info-group">
                    <label>Nom</label>
                    <p><?=  $Lname ?></p>
                </div>
                <div class="info-group">
                    <label>Adresse e-mai</label>
                    <p><?=  $email ?></p>
                </div>
                <div class="info-group">
                    <label>Téléphone</label>
                    <p>+212 <?= $Phone ?></p>
                </div>
                <div class="info-group">
                    <label>Date Naissance</label>
                    <p><?= $DteNa ?></p>
                </div>
            </div>
        </div>

        <div class="profile-section">
            <h3>Adresse</h3>
           
            <div class="section-content">
                <div class="info-group">
                    <label>Pays</label>
                    <p><?=  $pays ?></p>
                </div>
                <div class="info-group">
                    <label>Ville</label>
                    <p><?=  $Ville ?></p>
                </div>
                <div class="info-group">
                    <label>Adresse</label>
                    <p><?= $adresse ?></p>
                </div>
                <div class="info-group">
                    <label>Enrollement</label>
                    <p><?= $Enrollement ?></p>
                </div>
                
            </div>
        </div>
    </div>
</body>
</html>

    </div>


    <script src="../fromwoke/jquery-3.7.1.min.js"></script>
    <script src="../js/jus.js"></script>
   
</body>
</html> 
