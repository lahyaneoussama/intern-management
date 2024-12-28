<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion de stagaire</title>
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
            $IdClass = $_POST['ClassId'];
            $NomClass = $_POST['ClassName'];
            $FilliereId = $_POST['fillier'];
            $NiveauID = $_POST['Niveau'];

            $sql = "INSERT INTO `class`(`class_id`, `class_name`, `filiere_id`, `id_niveau`)
             VALUES (?,?,?,?)";
            $requite= $db->prepare($sql);
            $requite->bindValue(1, $IdClass, PDO::PARAM_STR);
            $requite->bindValue(2, $NomClass, PDO::PARAM_STR);
            $requite->bindValue(3, $FilliereId, PDO::PARAM_STR);
            $requite->bindValue(4, $NiveauID, PDO::PARAM_STR);
            $requite->execute();
            header("location:../Show/showClass.php");

         
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
                <p><a href="#"><i class="fa-solid fa-gear"></i> Ajouter Année Scolaire</a></p>
                <p><a href="./matiere.php"><i class="fa-solid fa-gear"></i> Ajouter une Matière</a></p>
                <p><a href="./Filliere.php"><i class="fa-solid fa-gear"></i> Ajouter une Filliere</a></p>
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
        <h1>Créer une Nouvelle Classe</h1>
        
        <form action="#" method="POST">
            <!-- Champ pour ID de la classe -->
            <div class="form-group">
                <label for="class-name">ID de la Classe</label>
                <input type="text" id="class-name" name="ClassId" placeholder="Entrez le nom de la classe" required>
            </div>
            
            <!-- Champ pour le nom de la class -->
            <div class="form-group">
                <label for="instructor">Nom de la Classe</label>
                <input type="text" id="instructor" name="ClassName" placeholder="Entrez le nom de l'instructeur" required>
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
           
            <label for="Niveau">Niveau:</label>
                    <select name="Niveau" id="Niveau" required>
                        <option hidden>--choix--</option>
                        <?php
                        $requice = "SELECT id_niveau, nom_niveau FROM `niveau`";
                        $niv = $db->prepare($requice);
                        $niv->execute();
                        $niveaux = $niv->fetchAll(PDO::FETCH_ASSOC);
                        foreach ($niveaux as $niveau):
                        ?>
                            <option value="<?= ($niveau['id_niveau']) ?>"><?= ($niveau['nom_niveau']) ?></option>
                        <?php endforeach; ?>
                    </select>
            </div>
            <div class="form-group">
                <!-- Bouton de soumission -->
                <button type="submit" name="creer" class="submit-btn">Créer la Classe</button>           
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
