<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notification</title>
    <link rel="stylesheet" href="reclamation.css">
</head>
<body>
    <header>
    <?php // Include database connection
        include '../php/connexion.php'; 

        
       
    
        // Start the session
        session_start(); 
        
        $Fname = $_SESSION['type']['First_name'];
        $Lname = $_SESSION['type']['last_name'];
        $fil = $_SESSION['str']['description'];
        

       
        ?>
        <div class="logo">
            <img src="../img/logo/lg3.png" alt="Logo" id="img-logo">
        </div>
        <div class="user">
            <div class="notification">
                <a href="#" class="fa-solid fa-bell" id="notifictaion"></a>
            </div>
            <div class="img-person">
                <img src="../img/ph-scoliare/me.jpg" alt="User Image">
            </div>
            <div class="deconnexion">
                <a href="#">Deconnexion</a>
            </div>
        </div>
    </header>
    <div class="home-content" id="homecontact">
        <nav id="navbar" >
            <div class="nav-items">
                <a href="../template_stagaire/main.php">
                    <img src="../img/icons-nav/home.png" alt="">
                    <span id="main-meun">Home</span>
                </a>
            </div>
            <div class="nav-items">
                <a href="../template_stagaire/grads.php">
                    <img src="../img/icons-nav/notes.png" alt="">
                    <span id="main-meun">Notes</span>
                </a>
            </div>
            <div class="nav-items">
                <a href="../template/reclamation.php">
                    <img src="../img/icons-nav/contact.png" alt="">
                    <span id="main-meun">Reclamation</span>
                </a>
            </div>
            <div class="nav-items">
                <a href="../template/licencepro.html">
                    <img src="../img/icons-nav/LEPRO.png" alt="">
                    <span id="main-meun">License Professionnelle</span>
                </a>
            </div>
            <div class="nav-items">
                <a href="../template/orientation.html">
                    <img src="../img/icons-nav/orientation.png" alt="">
                    <span id="main-meun">Orientation</span>
                </a>
            </div>
            <div class="nav-items">
                <a href="?">
                    <img src="../img/icons-nav/Activites.png" alt="">
                    <span id="main-meun">Activités</span>
                </a>
            </div>
            <div class="nav-items">
                <a href="?">
                    <img src="../img/icons-nav/verifier.png" alt="">
                    <span id="main-meun">Verification des donnes</span>
                </a>
            </div>
            
            <div class="nav-items">
                <a href="?">
                    <img src="../img/icons-nav/C-administrateur.png" alt="">
                    <span id="main-meun">Contacter l'administration</span>
                </a>
            </div>
            <div class="nav-items">
                <a href="https://www.ofppt.ma/">
                    <img src="../img/icons-nav/aide.png" alt="">
                    <span id="main-meun">Aide</span>
                </a>
            </div>
            <div class="nav-items" >
                <main id="contact">
                    <img src="../img/icons-nav/contact.png" alt="">
                    <span id="main-meun">Contact</span>
               </main>
            </div>
            <div class="nav-items">
                <a href="../profile/profile.html">
                    <img src="../img/icons-nav/user.png" alt="">
                    <span id="main-meun">Profile</span>
                </a>
            </div>
        </nav>
        <div class="content-page" id="content-page">
            <div class="msg">
                <p>Bienvenue sur votre compte privé</p>
            </div>
            <div class="container">
                <h1>Bonjour <?=  $Fname .' '. $Lname ?></h1>
                <div class="alert">
                    <span class="alert-icon">&#9888;</span>
                    <span class="alert-message">Cette fonctionnalité n'est pas disponible maintenant, merci</span>
                </div>
            </div>
        </div>
        </div>
    
</body>
</html>
