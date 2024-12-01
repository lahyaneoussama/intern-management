<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion de stagiaire</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="inscription.css">
</head>
<body>
<?php
// Include database connection
include '../php/connexion.php';
// Start the session
session_start(); 

$Fname = $_SESSION['type']['First_name'];
$Lname = $_SESSION['type']['last_name'];
// Retrieve and sanitize form input
$User_id=$_GET['User_id'];

$sql =  "SELECT * FROM `users` where User_id=?";
$requite= $db->prepare($sql);
$requite->execute([$User_id]);
$information = $requite->fetch(PDO::FETCH_ASSOC);

if (isset($_POST['update'])) {
    // Retrieve and sanitize form input
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $fillier = $_POST['fillier'];
    $genre = $_POST['Genre'];
    $date_n = $_POST['date_n'];
    $adresse = $_POST['adresse'];
    $phone = $_POST['phone'];
    $annee = $_POST['Année'];
    $nationalite = $_POST['nationalite'];
    $class = $_POST['class'];
    $email = $_POST['email'];
    $n_stagaire = $_POST['N-stagaire'];
    $login = $_POST['Login'];
    $password = $_POST['password']; // Hash the password
    $annscolaire = $_POST['Anne_scolaire'];
    $enrollement = $_POST['Enrollement'];
    $role = $_POST['Role'];
    $user_id = $_GET['User_id']; // Assuming you pass the User_id

    try {
        if($_POST['Role'] == 'Stagaire'){
            // First SQL update statement
            $sql = "UPDATE `users` 
                    SET `Password`=?,
                    `First_name`=?,
                    `last_name`=?, 
                    `Genre`=?,
                    `nationalite`=?,
                    `Email`=?,`Role`=?, 
                    `adresse`=?,
                    `Phone`=?,
                    `Date_naissance`=?, 
                    `Anne_scolaire`=?,
                    `Enrollement`=?,
                    `anne`=?
                    WHERE `User_id`=?";

            $requite = $db->prepare($sql);
            $requite->bindValue(1, $password, PDO::PARAM_STR);
            $requite->bindValue(2, $nom, PDO::PARAM_STR);
            $requite->bindValue(3, $prenom, PDO::PARAM_STR);
            $requite->bindValue(4, $genre, PDO::PARAM_STR);
            $requite->bindValue(5, $nationalite, PDO::PARAM_STR);
            $requite->bindValue(6, $email, PDO::PARAM_STR);
            $requite->bindValue(7, $role, PDO::PARAM_STR);
            $requite->bindValue(8, $adresse, PDO::PARAM_STR);
            $requite->bindValue(9, $phone, PDO::PARAM_STR);
            $requite->bindValue(10, $date_n, PDO::PARAM_STR);
            $requite->bindValue(11, $annscolaire, PDO::PARAM_STR);
            $requite->bindValue(12, $enrollement, PDO::PARAM_STR);
            $requite->bindValue(13, $annee, PDO::PARAM_STR);
            $requite->bindValue(14, $user_id, PDO::PARAM_INT);
            $requite->execute();

            // Second SQL update statement
            $sql2 = " UPDATE `stagaire` 
                      SET `str_id`=?,
                      `filiere_id`=?,
                      `Anne`=?,
                      `class_id`=? 
                      WHERE `User_id`=?";

            $requite2 = $db->prepare($sql2);
            $requite2->bindValue(1, $n_stagaire, PDO::PARAM_STR);
            $requite2->bindValue(2, $fillier, PDO::PARAM_STR);
            $requite2->bindValue(3, $annee, PDO::PARAM_STR);
            $requite2->bindValue(4, $class, PDO::PARAM_STR);
            $requite2->bindValue(5, $user_id, PDO::PARAM_INT);
            $requite2->execute();

            // Redirect if successful
            header("Location:stagaire.php");
            exit();
        } else {
            echo "The role is not 'Stagaire'. No update was performed.";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

?>

<div class="container">
    <header>
        <img src="../img/logo.png" alt="Logo" class="logo">
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
                    <p><a href="#"><i class="fa-solid fa-gear"></i> Ajouter Année Scolaire</a></p>
                    <p><a href="#"><i class="fa-solid fa-gear"></i> Ajouter des Modules</a></p>
                    <p><a href="#"><i class="fa-solid fa-gear"></i> Ajouter des Matières</a></p>
                    <p><a href="#"><i class="fa-solid fa-gear"></i> Ajouter des Matières</a></p>
                    <div class="deconexion">
                        <a href="#"><i class="fa-solid fa-right-from-bracket"></i> Déconnexion</a> 
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
                    <img src="<?php 

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
                        <p><?= htmlspecialchars($Fname . ' ' . $Lname) ?></p>
                    </li>
                    <li><a href="home.php">Tableau de Bord</a></li>
                  
                    <li><a href="note.php">Notes</a></li>
                    <li><a href="stagaire.php">Stagiaire</a></li>
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
                    <label for="nom">Nom:*</label>
                    <input type="text" id="nom" name="nom" placeholder="Nom"  value="<?php echo $information['First_name'] ?>" required> 
                </div>
                <div class="info">
                    <label for="prenom">Prénoms:*</label>
                    <input type="text" id="prenom" name="prenom" placeholder="Prénom" value="<?php echo $information['last_name'] ?>" required>
                </div>
            </div>

            <div class="start">
                <div class="info">
                    <label for="fillier">Filière:</label>
                    <select name="fillier" id="fillier">
                        <?php
                        $mysql = "SELECT filiere_id, filiere_name FROM `filiere`";
                        $req = $db->prepare($mysql);
                        $req->execute();
                        $fillieres = $req->fetchAll(PDO::FETCH_ASSOC);
                        foreach ($fillieres as $fil):
                        ?>
                            <option value="<?php echo $fil['filiere_id'] ?>"><?= $fil['filiere_name'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="info">
                    <label for="Genre">Genre:*</label>
                    <select id="Genre" name="Genre" required>
                        <option value="homme">Homme</option>
                        <option value="femme">Femme</option>
                    </select> 
                </div>
            </div>

            <div class="start">
                <div class="info">
                    <label for="date_n">Date de naissance:*</label>
                    <input type="date" id="date_n" name="date_n" placeholder="jj/mm/aaaa" required value="<?php echo $information['Date_naissance'] ?>">
                </div>
                <div class="info">
                    <label for="adresse">Adresse:</label>
                    <input type="text" id="adresse" name="adresse" placeholder="Adresse" value="<?php echo $information['adresse'] ?>">
                </div>
            </div>

            <div class="start">
                <div class="info">
                    <label for="nationalite">Nationalité:*</label>
                    <input type="text" id="nationalite" name="nationalite" required value="<?php echo $information['nationalite'] ?>">
                </div>
                <div class="info">
                    <label for="class">Classe:*</label>
                    <select name="class" id="class">
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
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" value="<?php echo $information['Email'] ?>">
                </div>
                <div class="info">
                    <label for="phone">Téléphone:</label>
                    <input type="tel" id="phone" name="phone" required value="<?php echo $information['Phone'] ?>">
                </div>
            </div>

            <div class="start">
                <div class="info">
                    <label for="Année">Année:</label>
                    <select id="Année" name="Année" required>
                        <option value="1er Anne">1ère Année</option>
                        <option value="2e Anne">2e Année</option>
                    </select> 
                </div>
                <div class="info">
                    <label for="Anne_scolaire">Année Scolaire:</label>
                    <select name="Anne_scolaire" id="Anne_scolaire">
                        <?php
                        $annes = "SELECT `id_Anne`, `date_anne` FROM `annes` WHERE 1";
                        $req2 = $db->prepare($annes);
                        $req2->execute();
                        $AnneScolaire = $req2->fetchAll(PDO::FETCH_ASSOC);
                        foreach ($AnneScolaire as $AneS):
                        ?>
                            <option value="<?= $AneS['id_Anne']?>"><?= $AneS['date_anne'] ?></option>
                        <?php endforeach; ?>
                    </select>
                    
                </div>
            </div>

            <div class="start">
                <div class="info">
                    <label for="N-stagaire">Numéro Stagiaire:</label>
                    <input type="text" id="N-stagaire" name="N-stagaire" value="<?php echo $information['adresse'] ?>">
                </div>
        

                <div class="info">
                    <label for="Enrollement">Enrôlement:*</label>
                    <input type="date" id="Enrollement" name="Enrollement" value="<?php echo $information['Enrollement'] ?>">
                </div>
            </div>
            <div class="start">
                <div class="info">
                   <label for="Role">Rôle:*</label>
                    <select name="Role" id="Role">
                        <option value="Stagaire">Stagaire</option>     
                    </select>
                </div>
                <div class="info">
                    <label for="Login">Login:*</label>
                    <input type="text" id="Login" name="Login" value="<?php echo $information['User_id'] ?>">
                </div>
            </div>
             <div class="start">
                    <div class="info">
                        <label for="password">Mot de Passe:*</label>
                        <input type="text" id="password" name="password" required value="<?php echo $information['Password'] ?>">
                    </div>
             </div>
                <div class="start">
                <input type="submit" class="valider" name="update" value="update l'inscription">
                <input type="reset" class="annule" onclick="Annule()" value="Annuler l'inscription">   
                </div>
        </div>
                
        </form>
    </div>

    <script src="../fromwoke/jquery-3.7.1.min.js"></script>
    <script src="../js/jus.js"></script>
</body>
</html>
