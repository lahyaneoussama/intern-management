<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="css/grads.css">
</head>
<?php 
            
            // Include database connection
            include '../php/connexion.php'; 
    
            // Start the session
            session_start(); 
    
            $Fname = $_SESSION['type']['Prenom'];
            $Lname = $_SESSION['type']['Nom'];
            $fil = $_SESSION['str']['description'];

            $sql = "SELECT * FROM notes";
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
                            ?>" alt="User Image">
                        </div>
                <div class="deconnexion">
                    <a href="../template-admin/deconnexion.php">Deconnexion</a>
            </div>
        </div>
    </header>
    <div class="home-content">
        <nav id="navbar" >
            <div class="nav-items">
                <a href="./main.php">
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
                <a href="?">
                    <img style src="../img/icons-nav/contact.png" alt="">
                    <span id="main-meun">Contact</span>
                </a>
            </div>
            <div class="nav-items">
                <a href="../profile/profile.html">
                    <img style src="../img/icons-nav/user.png" alt="">
                    <span id="main-meun">Profile</span>
                </a>
            </div>
        </nav>

        <div class="content-page">
            <div class="msg">
                <p>Bienvenue sur votre compte privé</p>
            </div>
            <div class="header">
            <h4>Bonjour <?= $Fname . " " . $Lname ?></h4>
        
    </div>
    <div class="container">
        <div class="content">
            <h2>Suivi des Notes</h2>
            <div class="filters">
                <div>
                    <label for="year">Année Scolaire:</label>
                    <select id="year">
                        <option value="2021/2022">2021/2022</option>
                        <option value="2022/2023">2022/2023</option>
                    </select>
                </div>
                <div>
                    <label for="session">Session:</label>
                    <select id="session">
                        <option value="premier">Premier semestre</option>
                        <option value="deuxieme">Deuxième semestre</option>
                    </select>
                </div>
                <button class="btn" onclick="toggleTable()">Afficher les notes</button>
            </div>
            
            <div class="table-container" id="table-container">
          <h2>Moyenne Note</h2>  
          <div class="information">
            
            <div class="info">
                    <p>Nom :<?= $Fname . " " . $Lname ?> </p>
                    <p>Filliere :<?= $fil?></p>
                </div>
                <div class="info">
                    <p>Etablissement : Lista Lazaret2024</p>
                    <p>Classe : Dev102</p>
                </div>
                <div class="info">
                    <p>Niveau : 1 Anne </p>
                    <p>Nombre des stagaire : 25</p>
                </div>
            </div>
                <div class="btn-control">
                    <button class="btn-controle">Note Controls Continues</button>
                    <button class="btn-moyenne">Moyenne Note</button>
                </div>
                <table class="controle">
                    <thead>
                        <tr>
                            <th>Matière</th>
                            <th>Premier contrôle</th>
                            <th>Deuxième contrôle</th>
                            <th>Troisième contrôle</th>
                            <th>Quatrième contrôle</th>
                            <th>Sixième contrôle</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                       
                    </tbody>
                </table>
                <table class="moyenne" hidden>
                    <thead>
                        <tr>
                            <th>Matière</th>
                            <th>Notes Controls Continues</th>
                            <th>Coefficient</th>
                            <th>Note Max</th>
                            <th>Note Min</th>    
                            <th>Note EFM</th>
                            <th>Coefficient</th>
                            <th>Note EFF</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                        </tr>
                       
                    </tbody>
                </table>
                <div class="footer">
                    <table>
                        <tr>
                            <td>Moyenne Session:</td>
                            <td>15.00</td>
                            
                        </tr>
                        <tr>
                        <td>Note Examen:</td>
                            <td>13.00</td>
                        </tr>
                        
                    </table>
                    
                </div>
            </div>
        </div>
   
        </div>
    </div>
                
                    
        <script src="../fromwoke/jquery-3.7.1.min.js"></script>
        <script src="../js/jquer.js"></script>
        <script src="../js/nav.js"></script>
        
        <script>
             // Function to toggle the visibility of the table
        function toggleTable() {
            const tableContainer = document.getElementById('table-container');
            if (tableContainer.style.display === 'none' || tableContainer.style.display === '') {
                tableContainer.style.display = 'block';
            } else {
                tableContainer.style.display = 'none';
            }
        }

       
        $(document).ready(function () {
     // Gérer l'affichage des tableaux
     $('.btn-control button').click(function () {

        if ($(this).hasClass('btn-controle')) {
            // Afficher uniquement le tableau 'controle' et cacher les autres
            $('.controle').show();
            $('.moyenne').hide();
        } else if ($(this).hasClass('btn-moyenne')) {
            // Afficher uniquement le tableau 'moyenne' et cacher les autres
            $('.moyenne').show();
            $('.controle').hide();
        }
    });
});



        </script>
</body>

</html>