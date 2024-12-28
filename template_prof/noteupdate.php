<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suivi des Notes</title>
    <link rel="stylesheet" href="css/noteupdate.css">
</head>
<body>
    <!-- Header Section -->
    <header>
        <div class="logo">
            <!-- Logo Image -->
            <img src="../img/logo.png" alt="Logo" id="img-logo">
        </div>
        <div class="user">
            <!-- Notification Bell -->
            <div class="notification">
                <a href="#" class="fa-solid fa-bell" id="notification"></a>
            </div>
            <!-- User Image -->
            <div class="img-person">
                <img src="../img/ph-scoliare/me.jpg" alt="User Image">
            </div>
            <!-- Deconnexion Link -->
            <div class="deconnexion">
                <a href="#">Deconnexion</a>
            </div>
        </div>
    </header>

    <!-- Main Content Section -->
    <div class="home-content" id="homecontact">
        <div class="content-page" id="content-page">
            <div class="msg">
                <!-- Welcome Message -->
                <p>Bienvenue sur votre compte privé</p>
            </div>
            <div class="container-header">
                <div class="notes-header">
                    <!-- Section Title -->
                    <h2>Suivi des notes</h2>
                    <div class="filter-container">
                        <!-- Filters for selecting fields -->
                        <div class="filter">
                            <label for="annee-scolaire">Filière</label>
                            <select id="annee-scolaire">
                                <option>Développement Digital</option>
                                <!-- Add more options as needed -->
                            </select>
                        </div>
                        <div class="filter">
                            <label for="session">Année</label>
                            <select id="session">
                                <option>Première Année</option>
                                <!-- Add more options as needed -->
                            </select>
                        </div>
                        <div class="filter">
                            <label for="class">Classe</label>
                            <select id="class">
                                <option>DEV101</option>
                                <option>DEV102</option>
                                <option>DEV103</option>
                                <option>DEV104</option>
                                <!-- Add more options as needed -->
                            </select>
                        </div>
                        <!-- Search Button -->
                        <button class="search-btn" id="search">🔍</button>
                    </div>
                </div>
                
                <!-- Grades Table Section -->
                <div class="table-container" id="grades-table">
                    <div class="table-header">
                        <!-- Table Headers -->
                        <div class="cell">Numero De Stagiaire</div>
                        <div class="cell">Nom & Prénom</div>
                        <div class="cell">CC1</div>
                        <div class="cell">CC2</div>
                        <div class="cell">CC3</div>
                        <div class="cell">CC4</div>
                        <div class="cell">EFM</div>
                        <div class="cell">Action</div>
                    </div>
                    <!-- Table Row Example -->
                    <div class="table-row">
                        <div class="cell">2003090300000</div>
                        <div class="cell">Lahyane Oussama</div>
                        <div class="cell"><input type="number" name="cc1" id=""></div>
                        <div class="cell"><input type="number" name="cc2" id=""></div>
                        <div class="cell"><input type="number" name="cc3" id=""></div>
                        <div class="cell"><input type="number" name="cc4" id=""></div>
                        <div class="cell"><input type="number" name="efm" id=""></div>
                        <div class="cell action-buttons">
                            <!-- Save Button for each row -->
                            <button class="save">save</button>
                        </div>
                    </div>
                    <!-- Repeat .table-row for other rows -->
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript Files -->
    <script src="../fromwoke/jquery-3.7.1.min.js"></script>
    <script src="../js/nav.js"></script>
    <script src="../js/jquer.js"></script>
    <script src="../js/Travailfaire.js"></script>
</body>
</html>
