<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion de stagaire</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="home.css">
</head>
<body>
    <?php
        // Include database connection
        include '../php/connexion.php'; 

        // Start the session
        session_start(); 

        $Fname = $_SESSION['type']['First_name'];
        $Lname = $_SESSION['type']['last_name'];

        $strinfo = "SELECT * FROM `users` 
        JOIN `stagaire` ON 
        users.User_id = stagaire.User_id limit 10";

        $info = $db->query($strinfo);
        
        $information = $info->fetchAll(PDO::FETCH_ASSOC);
        

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
        <main>
            <h1>Tableau de Bord</h1>
            <div class="dashboard">
                <div class="stat-stagaire">
                    <img src="../img/compte.png" alt="">
                    <div >
                        <span>
                        <?php 
                              // SQL query
                            $cal = "SELECT COUNT(*) AS sumstr FROM users 
                            WHERE `Role` = ?";
                            // Prepare and execute statement
                            $stmt = $db->prepare($cal);
                            $str = "Stagaire";
                            $stmt->bindValue(1,$str);
                            $stmt ->execute();

                            // Fetch and output result
                            $row = $stmt->fetch(PDO::FETCH_ASSOC);
                            echo $row['sumstr'];                        
                        ?>
                             
                        </span>
                        <p>Stagaire inscrits</p>
                    </div>
                </div>
                <div class="stat-garcon">
                    <img src="../img/compte.png" alt="">
                    <div>
                        <span>
                         <?php 
                              // SQL query
                            $cal = "SELECT COUNT(*) AS Homme
                            FROM users
                            WHERE Genre = ? AND `Role` =?";
 
                            // Prepare and execute statement
                            $stmt = $db->prepare($cal);
                            $gendre = "homme";
                            $Role = "Stagaire";
                            $stmt->bindValue(1, $gendre); // Use positional parameter binding
                            $stmt->bindValue(2, $Role); // Use positional parameter binding

                            $stmt->execute();

                            // Fetch and output result
                            $row = $stmt->fetch(PDO::FETCH_ASSOC);
                            echo $row['Homme'];                        
                        ?>
                        </span>
                        <p>Garçons inscrits</p>
                    </div>
                </div>
                <div class="stat-filles">
                    <img src="../img/compte.png" alt="">
                    <div>
                        <span> 
                            <?php 
                              // SQL query
                            $cal = "SELECT COUNT(*) AS Femme
                                    FROM `users`
                                    WHERE `Genre`=? AND `Role` =?";
 
                            // Prepare and execute statement
                            $stmt = $db->prepare($cal);
                            $gendre = "femme";
                            $Role = "Stagaire";
                            $stmt->bindValue(1, $gendre); // Use positional parameter binding
                            $stmt->bindValue(2, $Role); // Use positional parameter binding
                            $stmt->execute();

                            // Fetch and output result
                            $row = $stmt->fetch(PDO::FETCH_ASSOC);
                            echo $row['Femme'];                       
                        ?>
                        </span>
                        <p>Filles inscrits</p>
                    </div>
                </div>
                <div class="stat-prof">
                    <img src="../img/compte.png" alt="">
                    <div>
                        <span>
                        <?php 
                              $cal = "SELECT COUNT(*) AS Sumprof
                              FROM users
                              WHERE Role = ?";
   
                              // Prepare and execute statement
                              $stmt = $db->prepare($cal);
                              $prf = "Prof";
                              $stmt->bindValue(1, $prf); // Use positional parameter binding
                              $stmt->execute();
  
                              // Fetch and output result
                              $row = $stmt->fetch(PDO::FETCH_ASSOC);
                              echo $row['Sumprof'];                       
                        ?>
                        </span>
                        <p>Prof inscrits</p>
                    </div>
                </div>
            </div>
            <div class="information">
            <h2>10 Derniers Stagaire inscrits</h2>
            <table>
    <table>
    <thead>
        <tr>
            <th>N</th>
            <th>Nom</th>
            <th>Prénoms</th>
            <th>Date Naissance</th>
            <th>Filière</th>
            <th>Genre</th>
            <th>Classe</th>
            <th>Année</th>
        </tr>
    </thead>
    <tbody>
        <?php
        // Initialize row counter
        $row_count = 0;

        // Initialize table row number
        $tablerow= 1;

        if (!empty($information)) {
            foreach ($information as $inf) {
                echo "<tr>
                        <td>{$tablerow}</td>
                        <td>{$inf['First_name']}</td>
                        <td>{$inf['last_name']}</td>
                        <td>{$inf['Date_naissance']}</td>
                        <td>{$inf['filiere_id']}</td>
                        <td>{$inf['Genre']}</td>
                        <td>{$inf['class_id']}</td>
                        <td>{$inf['Anne']}</td>
                      </tr>";
                $tablerow++;
                $row_count++;
            }
        }

       
        ?>
    </tbody>
</table>
</div>        </main>
   
        
    </div>


    <script src="../fromwoke/jquery-3.7.1.min.js"></script>
    <script src="../js/jus.js"></script>
   
</body>
</html> 
