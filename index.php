<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Network Classroom</title>
    <link rel="stylesheet" href="./template_stagaire/css/login.css">
</head>
<body>

    <header>
        <div class="logo"><img src="img/logo/lg3.png" alt=""></div>
        
    </header>

    <!-- Main content -->
    <section class="main-content">
        <!-- Left section: Title and description -->
        <div class="text-content">
            <h1>MyTakwine</h1>
            <p>Online education</p>
            <p>Un système d'information intégré dédié à la gestion des stagiaires de l’OFPPT.
                 Il permet le suivi des performances, l’évaluation des résultats et 
                 l’organisation des données de manière efficace. Conçu pour répondre
                 aux besoins des formateurs et des apprenants,
                 ce système simplifie les processus administratifs tout en améliorant 
                 l’expérience pédagogique grâce à une interface moderne et intuitive.</p>
            <button>Learn more</button>
        </div>

        <!-- Right section: Image illustration -->
        <div class="image-container">
        <div class="form">

<h4><span>Log</span>in</h4>
<!-- Formulaire de connexion -->
<form  method="post">
    <!-- Champ de saisie pour le login et mot de passe -->
    <span>
        <?php
               // Include database connection
include 'php/connexion.php';

// Check if the form has been submitted
if (isset($_POST['Connexion'])) {
    // Retrieve username and password from POST data
    $username = $_POST['username'];
    $pass = $_POST['pass'];

    // Ensure both username and password fields are not empty
    if (!empty($username) && !empty($pass)) {
        
        // Prepare SQL query
        $sql = "SELECT * FROM users WHERE User_id = ? AND Password = ?";
        $requete = $db->prepare($sql);
        
       
        $requete->bindValue(1, $username, PDO::PARAM_STR);
        $requete->bindValue(2, $pass);

        $requete->execute();

        $sql = "SELECT * FROM filiere";
        $requete1 = $db->prepare($sql);
        $requete1->execute();
        
            

        
        if ($requete->rowCount() == 1 ) {

            $str = $requete1->fetch(PDO::FETCH_ASSOC);
            $user = $requete->fetch(PDO::FETCH_ASSOC);
            
            // Start a session 
            session_start();
            $_SESSION['str'] = $str; 
            $_SESSION['type'] = $user; 
            $_SESSION['Role'] = $user['Role']; 
            $_SESSION['filiere_id'] = $str['filiere_id']; 

            // Redirect based on user role
            if ($user['Role'] == 'Admin') {
                // Redirect to admin page
                header('Location:template-admin/home.php');
                exit(); 
            } else if ($user['Role'] == 'Stagaire') {
                // Redirect to stagiaire page
                header('Location:template_stagaire/main.php');
                exit();
            } else if ($user['Role'] == 'Prof') {
                header('Location:template_prof/home.php');;
            } else {
                echo 'Unknown user type '; }} else {
                    echo '<p style="color:red">Username or password incorrect</p>';  }} else {
                    echo '<p style="color:red">Tous les champs sont obligatoires</p>';
                     }};  
             
        
        ?>
            </span>
            <input type="text" id="username" name="username" placeholder="username"> <br>
            <input type="password" id="pass" name="pass" placeholder="password"><br>
            <span><a href="?">Forget Password?</a></span> <br>
            <!-- Boutton de soumission du formulaire -->
            <input type="submit" value="CONNEXION" id="Connexion" name="Connexion">
        </form>
        </div>
        </div>
    </section>
    <div class="ofppt">
        <img src="img/logo/logo.png" alt="">
    </div>
</body>
</html>