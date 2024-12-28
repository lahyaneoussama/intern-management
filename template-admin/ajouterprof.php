<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion de stagiaire</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="css/inscription.css">
</head>
<body>
<?php
// Include database connection
include '../php/connexion.php';
// Start the session
session_start(); 

$Fname = $_SESSION['type']['Nom'];
$Lname = $_SESSION['type']['Prenom'];

if (isset($_POST['valider'])) {
    // Retrieve and sanitize form input
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $fillier = $_POST['fillier'];
    $genre = $_POST['Genre'];
    $date_n = $_POST['date_n'];
    $adresse =$_POST['adresse'];
    $phone = $_POST['phone'];
    $Niveau = $_POST['Niveau'];
    $Pays = $_POST['Pays'];
    $class = $_POST['class'];
    $email = $_POST['email'];
    $cin = $_POST['N-stagaire'];
    $login = $_POST['Login'];
    $password = $_POST['password']; 
    $annscolaire = $_POST['Anne_scolaire'];
    $Etablissement = $_POST['Etablissement'];
    $Ville = $_POST['Ville'];
    $role = $_POST['Role'];


    


if($_POST['Role'] == 'Prof'){
    $sql = "INSERT INTO `users`(`User_id`, `Password`, `Nom`, 
    `Prenom`, `Genre`, `pays`, `Email`, `Role`, `adresse`, 
    `Phone`, `Date_naissance`, `Etablissement`, `Ville`) 
    VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)";

    $requite= $db->prepare($sql);
    $requite->bindValue(1, $login, PDO::PARAM_STR);
    $requite->bindValue(2, $password, PDO::PARAM_STR);
    $requite->bindValue(3, $nom, PDO::PARAM_STR);
    $requite->bindValue(4, $prenom, PDO::PARAM_STR);
    $requite->bindValue(5, $genre, PDO::PARAM_STR);
    $requite->bindValue(6, $Pays, PDO::PARAM_STR);
    $requite->bindValue(7, $email, PDO::PARAM_STR);
    $requite->bindValue(8, $role, PDO::PARAM_STR);
    $requite->bindValue(9, $adresse, PDO::PARAM_STR);
    $requite->bindValue(10,$phone, PDO::PARAM_STR);
    $requite->bindValue(11,$date_n, PDO::PARAM_STR);
    $requite->bindValue(12,$Etablissement, PDO::PARAM_STR);
    $requite->bindValue(13,$Ville, PDO::PARAM_STR);
    
    $requite->execute();

    $sql2 ="INSERT INTO `stagaire`(`str_id`, `filiere_id`, `class_id`, `User_id`, `id_AnneS` , `id_niveau`) 
            VALUES (?,?,?,?,?,?)";

    
    $req2 = $db->prepare($sql2);
    
     $req2->bindValue(1, $cin, PDO::PARAM_STR);
     $req2->bindValue(2, $fillier, PDO::PARAM_STR);
     $req2->bindValue(3, $class, PDO::PARAM_STR);
     $req2->bindValue(4, $login, PDO::PARAM_STR);
     $req2->bindValue(5, $annscolaire ,PDO::PARAM_STR);
     $req2->bindValue(6, $Niveaux ,PDO::PARAM_STR);
     $req2->execute();

    header("location:stagaire.php");

}
};
?>

<div class="container">
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
                <p><a href="#"><i class="fa-solid fa-gear"></i> Ajouter  Année Scolaire</a></p>
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

                    // Determine the appropriate image based on the users gender
                    if ($_SESSION['type']['Genre'] == 'homme') {
                        // If the user is a man, use the man.png image
                        echo '../img/ph-scoliare/user/man.png';
                    } else if ($_SESSION['type']['Genre'] == 'femme') {
                        // If the user is a woman, use the women.png image
                        echo '../img/ph-scoliare/user/women.png';
                    } 
                    ?>
                    " alt="">
                    
                    <p><?=  $Fname .' '. $Lname ?></p></li>
                    </li>
                    <li><a href="home.php">Tableau de Bord</a></li>
                    <li><a href="note.php">Notes</a></li>
                    <li><a href="stagaire.php">Stagaire</a></li>
                    <li><a href="prof.php">Prof</a></li>
                    <li><a href="notification.html">Notification</a></li>
                </ul>
            </nav>
            <button>View Profile</button>
        </aside>
        <form class="registration-form" method="post" >
            <h2>Nouvelle Inscription</h2>
            <p>Les informations suivies d'un astérisque sont obligatoires</p>

            <div class="start">
                <div class="info">
                    <label for="nom">Nom</label>
                    <input type="text" id="nom" name="nom" placeholder="Nom" required> 
                </div>
                <div class="info">
                    <label for="prenom">Prénom</label>
                    <input type="text" id="prenom" name="prenom" placeholder="Prénom" required>
                </div>
            </div>

            <div class="start">
                <div class="info">
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
                <div class="info">
                    <label for="Genre">Genre</label>
                    <select id="Genre" name="Genre" required>
                        <option hidden>--choix--</option>
                        <option value="homme">Homme</option>
                        <option value="femme">Femme</option>
                    </select> 
                </div>
            </div>

            <div class="start">
                <div class="info">
                    <label for="date_n">Date de Naissance</label>
                    <input type="date" id="date_n" name="date_n" placeholder="jj/mm/aaaa" required>
                </div>
                <div class="info">
                    <label for="adresse">Adresse</label>
                    <input type="text" id="adresse" name="adresse" placeholder="Adresse" required>
                </div>
            </div>

            <div class="start">
                <div class="info">
                    <label for="nationalite">Pays</label>
                    <input type="text" id="nationalite" name="Pays" placeholder="Pays" required>
                </div>
                <div class="info">
                    <label for="class">Classe</label>
                    <select name="class" id="class" required>
                    <option hidden>--choix--</option>
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
            </div>

            <div class="start">
                <div class="info">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required placeholder="Exemple@gmail.com">
                </div>
                <div class="info">
                    <label for="phone">Téléphone</label>
                    <input type="tel" id="phone" name="phone" required placeholder="06********">
                </div>
            </div>

            <div class="start">
                <div class="info">
                    <label for="Année">Niveau</label>
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
                <div class="info">
                    <label for="Anne_scolaire">Année Scolaire:</label>
                    <select name="Anne_scolaire" required> 
                    <option hidden>--choix--</option>     
                        <?php
                        $MyAnne = "SELECT `id_AnneS`, `annee` FROM `anneescolaire`";
                        $AnneS = $db->prepare($MyAnne);
                        $AnneS->execute();
                        $AnneScolaire = $AnneS->fetchAll(PDO::FETCH_ASSOC);
                        foreach ($AnneScolaire as $AnSc):
                        ?>
                            <option value="<?= $AnSc['id_AnneS'] ?>"><?= $AnSc['annee'] ?></option>
                        <?php endforeach; ?>
                </select>
                    
                </div>
            </div>

            <div class="start">
                <div class="info">
                    <label for="N-stagaire">CIN</label>
                    <input type="text" id="N-stagaire" name="N-stagaire" required placeholder="CIN">
                </div>
        

                <div class="info">
                    <label for="Enrollement">Ville</label>
                    <input type="text" id="Enrollement" name="Ville" required placeholder="Ville">
                </div>
            </div>
            <div class="start">
                <div class="info">
                   <label for="Role">Rôle</label>
                    <select name="Role" id="Role" required>
                        <option value="Stagaire">Stagaire</option>     
                    </select>
                </div>
                <div class="info">
                    <label for="Login">Etablissement</label>
                    <input type="text" id="Etablissement" name="Etablissement" required placeholder="Etablissement">
                </div>
            </div>
             <div class="start">
                    <div class="info">
                            <label for="Login">Login</label>
                            <input type="text" id="Login" name="Login" required placeholder="Login">
                    </div>
                    <div class="info">
                        <label for="password">Mot de Passe</label>
                        <input type="text" id="password" name="password" required placeholder="Password">
                    </div>
             </div>
                <div class="start">
               <div class="info">
                    <input type="submit" class="valider" name="valider" value="Valider l'inscription">
               </div>   
               <div class="info">
                    <input type="reset" class="annule" onclick="Annule()" value="Annuler l'inscription"> 
               </div>                 
                </div>
        </div>
                
        </form>
    </div>

    <script src="../fromwoke/jquery-3.7.1.min.js"></script>
    <script src="../js/jus.js"></script>
</body>
</html>
