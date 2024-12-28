<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suivi des Notes</title>
    <link rel="stylesheet" href="css/notesprof.css">
</head>
<body><header>
    <div class="logo">
        <img src="../img/logo/lg3.png" alt="Logo" id="img-logo">
    </div>
    <div class="user">
        <div class="notification">
            <a href="#" class="fa-solid fa-bell" id="notifictaion"></a>
        </div>
        <div class="img-person">
            <img src="
            <?php 
            // Determine the appropriate image based on the user's gender
            if ($_SESSION['type']['Genre'] == 'homme') {
                // If the user is a man, use the user.jpeg image
                echo '../img/ph-scoliare/user/man.png';
            } else if ($_SESSION['type']['Genre'] == 'femme') {
                // If the user is a woman, use the lic.jpg image
                echo '../img/ph-scoliare/user/women.png';
            }                
                ?>" alt="User Image">
        </div>
        <div class="deconnexion">
            <a href="../template-admin/deconnexion.php">Deconnexion</a>
        </div>
    </div>
</header>
<div class="home-content" id="homecontact">

    <nav id="navbar" >
        <div class="nav-items">
            <a href="./home.php">
                <img src="../img/icons-nav/main.png" alt="">
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
            <a href="?">
                <img src="../img/icons-nav/LEPRO.png" alt="">
                <span id="main-meun">License Professionnelle</span>
            </a>
        </div>
        <div class="nav-items">
            <a href="?">
                <img src="../img/icons-nav/home.png" alt="">
                <span id="main-meun">.....</span>
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
            <a href="?">
                <img src="../../img/icons-nav/user.png" alt="">
                <span id="main-meun">Profile</span>
            </a>
        </div>
    </nav>
    <div id="nav-displye">
        <p>contact   <br>
            +212 1111111112

        </p>

    </div>
    <div class="content-page" id="content-page">
        <div class="msg">
            <p>Bienvenue sur votre compte privé</p>
        </div>
    <div class="container-header">
        <main class="main-header">
            <img src="../img/user.jpeg" alt="Profile Picture">
            <div class="header-info">
                <p><strong>M.zarori amira</strong></p>
                <p>Filiere: Developpement Digitale</p>
                <p></p>
            </div>
        </main>
        <div class="notes-header">
            <h2>Suivi des notes</h2>
            <div class="filter-container">
                <div class="filter">
                    <label for="annee-scolaire">Fiellier</label>
                    <select id="annee-scolaire">
                        <option>devloppement digitale</option>
                       
                        <!-- Add more options as needed -->
                    </select>
                </div>
                <div class="filter">
                    <label for="session">Annee</label>
                    <select id="session">
                        <option>Premier Annee</option>
                        
                        <!-- Add more options as needed -->
                    </select>
                </div>
                <div class="filter">
                    <label for="session">class</label>
                    <select id="session">
                        <option>dav101 </option>
                        <option>dav102 </option>
                        <option>dav103 </option>
                        <option>dav104 </option>
                        
                        <!-- Add more options as needed -->
                    </select>
                </div>
                <button class="search-btn" id="search">🔍</button>

                <div class="update-all">
                    <button>update-all</button>
                </div>
            </div>
        </div>
        <div class="table-container" id="grades-table">
            <div class="table-header">
                <div class="cell">Numero De Stagiaire</div>
                <div class="cell">Nom & Prenom</div>
                <div class="cell">CC1</div>
                <div class="cell">CC2</div>
                <div class="cell">CC3</div>
                <div class="cell">CC3</div>
                <div class="cell">EFM</div>
                <div class="cell">Action</div>
            </div>
            <div class="table-row">
                <div class="cell">2003090300000</div>
                <div class="cell">Lahyane Oussama</div>
                <div class="cell">00,00</div>
                <div class="cell">00,00</div>
                <div class="cell">00,00</div>
                <div class="cell">00,00</div>
                <div class="cell">00,00</div>
                <div class="cell action-buttons">
                    <button class="update">Update</button>
                    
                </div>
            </div>
            <div class="table-row">
                <div class="cell">11111111111111</div>
                <div class="cell">Gouiss yousef</div>
                <div class="cell">00,00</div>
                <div class="cell">00,00</div>
                <div class="cell">00,00</div>
                <div class="cell">00,00</div>
                <div class="cell">00,00</div>
                <div class="cell action-buttons">
                    <button class="update">Update</button>
                    
                </div>
            </div>
            <div class="table-row">
                <div class="cell">2222222222222</div>
                <div class="cell">boukhari adam</div>
                <div class="cell">00,00</div>
                <div class="cell">00,00</div>
                <div class="cell">00,00</div>
                <div class="cell">00,00</div>
                <div class="cell">00,00</div>
                <div class="cell action-buttons">
                    <button class="update">Update</button>
                   
                </div>
            </div>
            <div class="table-row">
                <div class="cell">333333333333</div>
                <div class="cell">ben ayadi abdo </div>
                <div class="cell">00,00</div>
                <div class="cell">00,00</div>
                <div class="cell">00,00</div>
                <div class="cell">00,00</div>
                <div class="cell">00,00</div>
                <div class="cell action-buttons">
                    <button class="update">Update</button>
                    
                </div>
            </div> <div class="table-row">
                <div class="cell">444444444444</div>
                <div class="cell">nihad zafou</div>
                <div class="cell">00,00</div>
                <div class="cell">00,00</div>
                <div class="cell">00,00</div>
                <div class="cell">00,00</div>
                <div class="cell">00,00</div>
                <div class="cell action-buttons">
                    <button class="update">Update</button>
                    
                </div>
            </div>
            <!-- Repeat .table-row for other rows -->
        </div>
    </div>

    <script src="../fromwoke/jquery-3.7.1.min.js"></script>
    <script src="../js/nav.js"></script>
    <script src="../js/jquer.js"></script>
    <script src="../js/Travailfaire.js"></script>
</body>
</html>
