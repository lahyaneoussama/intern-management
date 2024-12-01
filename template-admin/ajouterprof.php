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

if (isset($_POST['valider'])) {
    // Retrieve and sanitize form input
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];  
    $genre = $_POST['Genre'];
    $date_n = $_POST['date_n'];
    $adresse =$_POST['adresse'];
    $phone = $_POST['phone'];
    $nationalite = $_POST['nationalite'];
    $email = $_POST['email'];
    $login = $_POST['Login'];
    $password = $_POST['password']; // Hash the password
    $role = $_POST['Role'];  

    $n_prof = $_POST['N-Prof'];
    $departement = $_POST['departement'];  
    $Salary = $_POST['Salary'];  
    $HireDate = $_POST['HireDate'];  
    $OfficeHours = $_POST['OfficeHours'];  
    $CoursesTaught = $_POST['CoursesTaught'];  


if($_POST['Role'] == 'Prof'){
    $sql = "INSERT INTO `users`(`User_id`, `Password`, 
    `First_name`, `last_name`, `Genre`, `nationalite`,
    `Email`, `Role`, `adresse`, `Phone`,
    `Date_naissance`
    ) 
    VALUES (?,?,?,?,?,?,?,?,?,?,?)";

    $requite= $db->prepare($sql);
    $requite->bindValue(1, $login, PDO::PARAM_STR);
    $requite->bindValue(2, $password, PDO::PARAM_STR);
    $requite->bindValue(3, $nom, PDO::PARAM_STR);
    $requite->bindValue(4, $prenom, PDO::PARAM_STR);
    $requite->bindValue(5, $genre, PDO::PARAM_STR);
    $requite->bindValue(6, $nationalite, PDO::PARAM_STR);
    $requite->bindValue(7, $email, PDO::PARAM_STR);
    $requite->bindValue(8, $role, PDO::PARAM_STR);
    $requite->bindValue(9, $adresse, PDO::PARAM_STR);
    $requite->bindValue(10, $phone, PDO::PARAM_STR);
    $requite->bindValue(11, $date_n, PDO::PARAM_STR);
    
    $requite->execute();

    $sql2 ="INSERT INTO `prof`(`ProfessorID`, `Department`, `HireDate`, `Salary`, `OfficeHours`, `CoursesTaught`, `User_id`) 
    VALUES (?,?,?,?,?,?,?)";

    
    $requite2 = $db->prepare($sql2);
    $requite2->bindValue(1,$n_prof, PDO::PARAM_STR);
    $requite2->bindValue(2,$departement, PDO::PARAM_STR);
    $requite2->bindValue(3, $HireDate, PDO::PARAM_STR);
    $requite2->bindValue(4, $Salary, PDO::PARAM_STR);
    $requite2->bindValue(5, $OfficeHours, PDO::PARAM_STR);
    $requite2->bindValue(6, $CoursesTaught, PDO::PARAM_STR);
    $requite2->bindValue(7, $login, PDO::PARAM_STR);
    $requite2->execute();

    header("location:prof.php");

}
};
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
                    <li><a href="inscription.php">fillier</a></li>
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
                    <input type="text" id="nom" name="nom" placeholder="Nom" required> 
                </div>
                <div class="info">
                    <label for="prenom">Prénom:*</label>
                    <input type="text" id="prenom" name="prenom" placeholder="Prénom" required>
                </div>
            </div>

            <div class="start">
                <div class="info">
                    <label for="CoursesTaught">CoursesTaught:*</label>
                    <input type="text" name="CoursesTaught" id="CoursesTaught" placeholder="CoursesTaught">
                </div>
                <div class="info">
                    <label for="Genre">Genre:*</label>
                    <select id="Genre" name="Genre" required>
                        <option value="">-- Choix --</option>
                        <option value="homme">Homme</option>
                        <option value="femme">Femme</option>
                    </select> 
                </div>
            </div>

            <div class="start">
                <div class="info">
                    <label for="date_n">Date de naissance:*</label>
                    <input type="date" id="date_n" name="date_n" placeholder="jj/mm/aaaa" required>
                </div>
                <div class="info">
                    <label for="adresse">Adresse:*</label>
                    <input type="text" id="adresse" name="adresse" placeholder="Adresse" required>
                </div>
            </div>

            <div class="start">
                <div class="info">
                    <label for="nationalite">Nationalité:*</label>
                    <input type="text" id="nationalite" name="nationalite" required placeholder="Nationalité">
                </div>
                <div class="info">
                    <label for="departement">departement:*</label>
                    <select id="departement" name="departement" required>
                        <option displyed>-- Choix --</option>
                        <option value="DEV">Developpemt digitale</option>
                        <option value="AA">Assistant Administratif</option>
                        <option value="ID">Infrastructure digitale</option>
                        <option value="GES">Gestion des Entreprises</option>
                    </select> 
                
                </div>
            </div>

            <div class="start">
                <div class="info">
                    <label for="email">Email:*</label>
                    <input type="email" id="email" name="email" placeholder="E-mail@gmail.com" required>
                </div>
                <div class="info">
                    <label for="phone">Téléphone:*</label>
                    <input type="tel" id="phone" name="phone" placeholder="+212*********" required>
                </div>
            </div>

            <div class="start">
                <div class="info">
                    <label for="OfficeHours">Office Hours:*</label>
                    <input type="text" name="OfficeHours" id="OfficeHours" placeholder="Office-Hours"> 
                </div>
                <div class="info">
                    <label for="Salary">Salary:*</label>
                    <input type="text" name="Salary" id="Salary" placeholder="********* DH" required>
                </div>
            </div>

            <div class="start">
                <div class="info">
                    <label for="N-Prof">Numéro De Prof:*</label>
                    <input type="text" id="N-Prof" name="N-Prof" required>
                </div>
        

                <div class="info">
                    <label for="HireDate">HireDate:*</label>
                    <input type="date" id="HireDate" name="HireDate" required placeholder="jj/mm/aaaa">
                </div>
            </div>
            <div class="start">
                <div class="info">
                   <label for="Role">Rôle:*</label>
                    <select name="Role" id="Role" > 
                        <option value="Prof">Prof</option>
                    </select>
                </div>
                <div class="info">
                    <label for="Login">Login:*</label>
                    <input type="text" id="Login" name="Login" required placeholder="Username">
                </div>
            </div>
             <div class="start">
                    <div class="info">
                        <label for="password">Mot de Passe:*</label>
                        <input type="password" id="password" name="password" required>
                    </div>
             </div>
                <div class="start">
                <input type="submit" class="valider" name="valider" value="Valider l'inscription">
                <input type="reset" class="annule" onclick="Annule()" value="Annuler l'inscription">   
                </div>
        </div>
                
        </form>
    </div>

    <script src="../fromwoke/jquery-3.7.1.min.js"></script>
    <script src="../js/jus.js"></script>
</body>
</html>
