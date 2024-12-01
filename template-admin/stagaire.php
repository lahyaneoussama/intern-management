<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="stagaire.css">
    <title>Gestion de stagair</title>
</head>
<body>

    <?php
        // Include database connection
        include '../php/connexion.php'; 
        // Start the session
        session_start(); 

        $Fname = $_SESSION['type']['First_name'];
        $Lname = $_SESSION['type']['last_name'];

        $sql = "SELECT * FROM `users` JOIN stagaire ON stagaire.User_id = users.User_id  Where `Role` =? ";

        $role="Stagaire";

        $requete = $db->prepare($sql);
        $requete->bindValue(1,$role);
        $requete->execute();
        $info = $requete->fetchAll(PDO::FETCH_ASSOC);
        
    ?>
        <header>
            <img src="../img/logo.png" alt="Logo" class="logo">
            <div class="header-admin">
                <p>Opérateur de saisie - Année Scolaire: <select id="year-select">
                    <option value="2023-2024">2023-2024</option>
                    <!-- Add more years here -->
                </select></p>
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
                      <p> <a href=""><i class="fa-solid fa-gear"></i>Ajoute Année Scolaire</a></p>
                      <p> <a href=""><i class="fa-solid fa-gear"></i>Ajoute de modules</a></p>
                      <p> <a href=""><i class="fa-solid fa-gear"></i>Ajoute de Matieres</a></p>
                      <p> <a href=""><i class="fa-solid fa-gear"></i>Ajoute de Matieres</a></p>
                      <div class="deconexion">
                        <a href=""><i class="fa-solid fa-right-from-bracket"></i>Deconnecion</a> 
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
                        echo '../img/ph-scoliare/user/man.png';
                    } else if ($_SESSION['type']['Genre'] == 'femme') {
                        // If the user is a woman, use the lic.jpg image
                        echo '../img/ph-scoliare/user/women.png';
                    } 
                    ?>
                    " alt="">
                    
                    <p><?=  $Fname .' '. $Lname ?></p></li>

                    
                    
                    <li><a href="home.php">Tableau de Bord</a></li>
                    <li><a href="note.php">Notes</a></li>
                    <li><a href="stagaire.php">Stagaire</a></li>
                    <li><a href="prof.php">Prof</a></li>
                    <li><a href="notification.php">Notification</a> </li>
                </ul>
            </nav>
            <button>View Profile</button>
        </aside>
    <div class="content-page" id="content-page">
        <div class="container-header">
            <div class="notes-header">
                <h2>les stagaire</h2>
                <div class="filter-container">
                            <div class="filter">
                                <label for="fillier">Fillier</label>
                                <select id="fillier" name="fillier">
                                    <?php
                                $mysql = "SELECT filiere_id, filiere_name FROM `filiere`";
                                $req = $db->prepare($mysql);
                                $req->execute();
                                $fillieres = $req->fetchAll(PDO::FETCH_ASSOC);
                                foreach ($fillieres as $fil):
                                ?>
                                    <option value="<?= ($fil['filiere_id']) ?>"><?= ($fil['filiere_name']) ?></option>
                                <?php endforeach; ?>
                                    <!-- Add more options as needed -->
                                </select>
                            </div>
                            <div class="filter">
                                <label for="session">Annee</label>
                                <select id="session">
                                    <option>Premier Annee</option>
                                    <option>deuixeme Annee</option>
                                    
                                    <!-- Add more options as needed -->
                                </select>
                            </div>
                            <div class="filter">
                                <label for="session">class</label>
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
                            <div class="filter"> <button class="search-btn" id="search">🔍</button></div>
                               
               
                    
                    <button class="ajouter-btn" id="ajoute"><a href="ajouterstr.php">ajoute</a></button>
                             
                </div>
            </div>


            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>Numero De Stagiaire</th>
                            <th>Nom</th>
                            <th>Prenom</th>
                            <th>date Naissance </th>
                            <th>Filliere</th>
                            <th>class</th>
                            <th>Anne</th>
                            <th>login</th>
                            <th>password</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                    
                        <tbody>
                        <?php  $table = 1 ;?>
                        <?php foreach($info as $inf): ?>
                        <tr>
                            <?php $User_id=$inf['User_id']?>
                            <td><?php echo $table++ ?></td>
                            <td><?= $inf['First_name'] ?></td>
                            <td><?= $inf['last_name'] ?></td>
                            <td><?= $inf['Date_naissance'] ?></td>
                            <td><?= $inf['filiere_id'] ?></td>
                            <td><?= $inf['class_id'] ?></td>
                            <td><?= $inf['Anne'] ?></td>
                            <td><?= $inf['User_id'] ?></td>
                            <td><?= $inf['Password'] ?></td>
                            <td>
                                <button class="update"><a href="update.php?User_id=<?php echo $User_id ?>">update</a></button>
                                <button class="delete"><a href="delete.php?User_id=<?php echo $User_id ?>" onclick="return confirm ('Êtes-vous sûr de vouloir supprimer ceci ?')">delete</a></button>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                        
                    </tbody>
                    
                    
                </table>
            </div>
        </div>
        <script src="../fromwoke/jquery-3.7.1.min.js"></script>
        <script src="../js/jus.js"></script>
</body>
</html>