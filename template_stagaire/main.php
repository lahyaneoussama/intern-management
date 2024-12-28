<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="css/main.css">
</head>
<?php // Include database connection
        include '../php/connexion.php'; 

        
       
    
        // Start the session
        session_start(); 
        
        $Fname = $_SESSION['type']['Prenom'];
        $Lname = $_SESSION['type']['Nom'];
        $fil = $_SESSION['str']['description'];

            $sql = "SELECT * FROM notes limit 4";
            $requete = $db->prepare($sql);
        
            $requete->execute();
            $info = $requete->fetchAll(PDO::FETCH_ASSOC);
        
       
        ?>

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
            <img src="<?php 

                    // Determine the appropriate image based on the user's gender
                    if ($_SESSION['type']['Genre'] == 'homme') {
                        // If the user is a man, use the user.jpeg image
                        echo '../img/ph-scoliare/user/man.png';
                    } else if ($_SESSION['type']['Genre'] == 'femme') {
                        // If the user is a woman, use the lic.jpg image
                        echo '../img/ph-scoliare/user/women.png';
                    } 
                    ?>">
            </div>
            <div class="deconnexion">
                <a href="../template-admin/deconnexion.php">Deconnexion</a>
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
           
                <div class="S-job">
                    <div class="description-stagaire">
                        <div class="content-stagaire">
                            <img src="<?php 

                                // Determine the appropriate image based on the user's gender
                                if ($_SESSION['type']['Genre'] == 'homme') {
                                    // If the user is a man, use the user.jpeg image
                                    echo '../img/ph-scoliare/user/man.png';
                                } else if ($_SESSION['type']['Genre'] == 'femme') {
                                    // If the user is a woman, use the lic.jpg image
                                    echo '../img/ph-scoliare/user/women.png';
                                } 
                                ?>" alt="">
                            <div class="information-prsonelle">
                                <p><?=  $Fname .' '. $Lname ?> <br><span><?php echo $fil ?></span></p>
                            </div>
                        </div>
                    </div>
                    <div class="scheduler">
                        <div class="title-scheduler">
                            <h2>Travail à faire <span id="nbr-count">(0)</span></h2>
                            <div class="icons-scheduler">
                                <a href="#"><i class="fa-solid fa-rotate"></i></a>
                                <a href="#"><i class="fa-solid fa-arrow-right-arrow-left"></i></a>
                            </div>

                        </div>
                        <div class="day-nav">
                            <button id="prev-day" class="nav-button"><i class="fa-solid fa-caret-left"></i></button>
                            <button class="day-button" data-day="lun">Lun</button>
                            <button class="day-button" data-day="mar">Mar</button>
                            <button class="day-button" data-day="mer">Mer</button>
                            <button class="day-button" data-day="jeu">Jeu</button>
                            <button class="day-button" data-day="ven">Ven</button>
                            <button class="day-button" data-day="sam">Sam</button>
                            <button id="next-day" class="nav-button"><i class="fa-solid fa-caret-right"></i></button>
                        </div>
                    </div>
                </div>
                <div class="S-notes">
                    <div class="photo-card">

                        <div class="slideshow-container">
                            <img id="slideimg" src="../img/logo.png" alt="Slideshow Image">
                        </div>

                    </div>
                    <div class="notes-container">
                        <div class="notes-header">
                            Dernières notes <span><a href="#" class="fa-solid fa-rotate"></a></span>
                        </div>
                        <?php foreach($info as $inf): ?>
                            <div class="notes">
                                
                                    <tr>
                                    <div class="note-title"><?= $inf['subject_id']?></div>
                                    <div class="note-subtitle"><?= $inf['id_Evaluation']?></div>
                                    <div class="note-date"><?= $inf['date_evaluation']?></div>
                                <div class="note-score"><?= $inf['NameNote']?></div>       
                               </div>
                        <?php endforeach; ?>
                        </div>                        
                    </div>
                    <div class="L-pro">
                  <div class="Licene">
                    <div class="Lic-img">
                    <img src="../img/icons-nav/Licenece pro.png" alt="">
                    <h3>Liecene Professionnelle</h3>
                    </div>
                    <button><a href="../template/licencepro.html">Cliquez ici</a></button>
                  </div>
                </div>
                </div>
                
            </div>
             
                
        </div>


        <script src="../fromwoke/jquery-3.7.1.min.js"></script>
        <script src="../js/nav.js"></script>
        <script src="../js/jquer.js"></script>
        <script src="../js/Travailfaire.js"></script>
</body>

</html>