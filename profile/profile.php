<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Information</title>
    <link rel="stylesheet" href="profile.css">
</head>
<body>

    <header>
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
                <a href="../template_stagaire/notes.html">
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
                <a href="?">
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
                <a href="../profile/profile.php">
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
        <!-- Section for Personal Information -->
        <section class="personal-info">
            <h2>Mes informations personnelles</h2>
            <div class="info">
                <div class="info-row">
                    <div class="info-column">
                        <img src="../img/user.jpeg" alt="">
                        
                    </div>
                    <!-- First Column of Personal Information -->
                    <div class="info-column">
                        <p><strong>Prénom:</strong> oussama</p>
                        <p><strong>Téléphone Tuteur:</strong>06 74 81 19 90</p>
                        <p><strong>Date Naissance:</strong> 2003/09/03</p>
                    </div>
                    <!-- Second Column of Personal Information -->
                    <div class="info-column">
                        <p><strong>Code stagiaire:</strong> 2003090300402</p>
                        <p><strong>Nom:</strong>LAHYANE</p>
                        <p><strong>Genre:</strong> mâle</p>
                        
                    </div>
                    <!-- Third Column of Personal Information -->
                    <div class="info-column">
                        <p><strong>Lieu de naissance:</strong>EL AIOUN</p>
                        <p><strong>Etablissement:</strong>lista lazaret</p>
                        <p><strong>Académie:</strong> Oriental</p>
                        <p><strong>Direction provinciale:</strong> Province: oujda</p>
                    </div>
                </div>
                
            </div>
        </section>
        
        <!-- Section for Additional Information -->
        <section class="additional-info">
            <h2>Information additionnelle</h2>
            <div class="additional-row">
                <!-- Column for Phone Number -->
                <div class="info-column">
                    <label for="phone">Téléphone:</label>
                    <input type="text" name="phone" id="phone">
                </div>
                <!-- Section for Additional Phone Information -->
                <div class="information-tel">
                    <div class="info-tele">
                        <label for="father-phone">Téléphone du père:</label>
                        <input type="checkbox" name="father-phone" id="father-phone">
                    </div>
                    <div class="info-tele">
                        <label for="mother-phone">Téléphone de la mère:</label>
                        <input type="checkbox" name="mother-phone" id="mother-phone">
                    </div>
                    <div class="info-tele">
                        <label for="tutor-phone">Téléphone Tuteur:</label>
                        <input type="checkbox" id="tutor-phone">
                    </div>
                </div>
            </div>
            <!-- Save Button for Additional Information -->
            <button class="save-button">Save</button>
        </section>
        
        <!-- Section for Password Recovery Information -->
        <section class="password-recovery">
            <h2>Information de récupération le mot de passe</h2>
            <div class="info-row">
                <div class="info-column">
                    <label for="email">Email:</label>
                    <input type="email" id="email" value="lahyaneoussama2011@gmail.com">
                    <p class="info-note">Cet email est utilisé en cas de perte de mot de pass</p>
                </div>
            </div>
            <!-- Save Button for Password Recovery Information -->
            <button class="save-button">Save</button>
        </section>
        
       
    </div>
</body>
</html>
