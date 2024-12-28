<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Option</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="../css/matiere.css">
</head>
<body>
    <?php
        // Include database connection
        include '../../../php/connexion.php'; 

        // Start the session
        session_start(); 

        $Fname = $_SESSION['type']['Nom'];
        $Lname = $_SESSION['type']['Prenom'];

        
        if (isset($_POST['creer'])) {
            // Retrieve and sanitize form input
            $IdOption = $_POST['OptionId'];
            $NomOption = $_POST['OptionName'];
            $FilliereId = $_POST['fillier'];
            $Description = $_POST['Description'];

            $sql = "INSERT INTO `options`(`id_option`, `filiere_id`, `name` , `description`)
             VALUES (?,?,?,?)";
            $requite= $db->prepare($sql);
            $requite->bindValue(1, $IdOption, PDO::PARAM_STR);
            $requite->bindValue(2, $FilliereId, PDO::PARAM_STR);
            $requite->bindValue(3, $NomOption, PDO::PARAM_STR);
            $requite->bindValue(4, $Description, PDO::PARAM_STR);
            $requite->execute();
            header("location:../Show/showOption.php");

           
        }
        
    ?>
    
    <div class="container">
    <header>
        <img src="../../../img/logo/lg3.png" alt="Logo" class="logo">
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
                    echo '../../../img/ph-scoliare/user/man.png';
                } else if ($_SESSION['type']['Genre'] == 'femme') {
                    // If the user is a woman, use the lic.jpg image
                    echo '../../../img/ph-scoliare/user/women.png';
                } 
                ?>" alt="Admin" class="profile-pic">
                <span id="name">
                    <i class="fa-solid fa-angle-down"></i>
                </span>
                <div id="nav-systeme">
                <p><a href="./Annee.php"><i class="fa-solid fa-gear"></i> Ajouter Année Scolaire</a></p>
                <p><a href="./matiere.php"><i class="fa-solid fa-gear"></i> Ajouter une Matière</a></p>
                <p><a href="./Class.php"><i class="fa-solid fa-gear"></i> Ajouter une Classe</a></p>
                <p><a href="./Option.php"><i class="fa-solid fa-gear"></i> Ajouter une Option</a></p>
                <p><a href="./Niveau.php"><i class="fa-solid fa-gear"></i> Ajouter un Niveau</a></p>

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
                        echo '../../../img/ph-scoliare/user/man.png';
                    } else if ($_SESSION['type']['Genre'] == 'femme') {
                        // If the user is a woman, use the lic.jpg image
                        echo '../../../img/ph-scoliare/user/women.png';
                    } 
                    ?>
                    " alt="">
                    
                    <p><?=  $Fname .' '. $Lname ?></p></li>
                  <li><a href="../../home.php">Tableau de Bord</a></li>
                    <li><a href="../../note.php">Notes</a></li>
                    <li><a href="../../stagaire.php">Stagaire</a></li>
                    <li><a href="../../prof.php">Prof</a></li>
                    <!-- <li><a href="?">Demandes d'Attestation</a></li> -->
                    <li><a href="../../notification.php">Notification</a> </li>
                </ul>
            </nav>
            <button>
                <a href="Profil.php">View Profile</a>
            </button>
        </aside>
        <div class="form-container">
        <h1>Créer une Nouvelle Option</h1>
        
        <form method="POST">
            <!-- Champ pour ID de la Option -->
            <div class="form-group">
                <label for="Option">ID de la Option</label>
                <input type="text" id="class-name" name="OptionId" placeholder="Entrez le nom de la Option" required>
            </div>
            
            <!-- Champ pour le nom de la Option -->
            <div class="form-group">
                <label for="Option">Nom de la Option</label>
                <input type="text" id="instructor" name="OptionName" placeholder="Entrez le nom de Option" required>
            </div>
            
             <!-- Option Select -->
            <div class="form-group">
                    <label for="fillier">Filière:</label>
                    <select name="fillier" id="fillier" required>
                        <option hidden>--choix--</option>
                        <?php
                        $mysql = "SELECT filiere_id, filiere_name FROM `filiere`";
                        $req = $db->prepare($mysql);
                        $req->execute();
                        $fillieres = $req->fetchAll(PDO::FETCH_ASSOC);
                        foreach ($fillieres as $fil):
                        ?>
                            <option value="<?= ($fil['filiere_id']) ?>"><?= ($fil['filiere_name']) ?></option>
                        <?php endforeach; ?>
                    </select>
            </div>
            
            <div class="form-group">
                <label for="Description">Description</label>
                <textarea name="Description"  cols="99" rows="5" placeholder="Entrez le nom de Description" required>
                </textarea>
            </div>
           
           
            <div class="form-group">
                <button type="submit" name="creer" class="submit-btn">Créer la Option</button>           
            </div>
            
         
        </form>
    </div>
       
        
    </div>
   
        <script src="../../../fromwoke/jquery-3.7.1.min.js"></script>
        <script src="../../../js/jus.js"></script>
        <script src="../../../js/nav.js"></script>
        <script src="../../../js//Travailfaire.js"></script>
   
</body>
</html> 
