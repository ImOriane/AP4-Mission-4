<?php
include('connexion.php');
// Vérifier si les données ont été envoyées via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $code_ligue = $_POST['code_ligue'];
    $nom_ligue = $_POST['nom_ligue'];
    $tresorier = $_POST['tresorier'];
    $adresse_tresorier = $_POST['adresse_tresorier'];
    $ville_tresorier = $_POST['ville_tresorier'];
    $sport = $_POST['sport'];


    // Préparer la requête SQL pour insérer les données dans la base
    $sql = "INSERT INTO ligue (code_ligue, nom_ligue, tresorier,adresse_tresorier,ville_tresorier,sport) VALUES ('$code_ligue', '$nom_ligue', '$tresorier', '$adresse_tresorier', '$ville_tresorier', '$sport')";

    // Exécuter la requête
    if ($conn->query($sql) === TRUE) {
        echo '<div class="ajouter">Ligue ajoutée!</div>';

    } else {
        echo "Erreur: " . $sql . "<br>" . $conn->error;
    }
}
$conn->close();
?>
<!-- HTML -->
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Outils Gestion CROSL</title>
    <!-- Lien vers le fichier CSS -->
    <link rel="stylesheet" href="style/styles.css">
</head>
<body>
    <!-- Fond principal avec un dégradé -->
    <div class="background">
        <!-- Rectangle central -->
        <div class="main-container">
            <!-- Barre latérale gauche -->
            <div class="sidebar">

                <a href="index.html">
                    <img class=home src="img/home.png">
                </a>
 

            <!-- Boutons de la barre latérale -->
            <div class="boutonsbar">
                <button class="sidebar-btn" onclick="location.href='outil_de_factures.php'">Création de factures</button>
                <button class="sidebar-btn" onclick="location.href='Archive_factures.php'">Retrouver factures</button>
                <button class="sidebar-btn" onclick="location.href='Gestion_BD.html'">Gestion ligues et prestations</button>
            </div>
        </div>
            <!-- Section droite -->
            <div class="content-GBB-Ligue">
                <form action="Ligue.php" method="POST">
                    <div class="formulaire">
                        <div class="form"> 
                            <h2>Gestion Ligue</h2>
                            <br>
                            Code Ligue :<br>
                            <input type="text" name="code_ligue" placeholder="Code ligue">                      
                            <br>
                            <br>
                            Nom de la ligue :<br>
                            <input type="text" name="nom_ligue" placeholder="Nom de la ligue">                      
                            <br>
                            <br>
                            Trésorier :
                            <br>
                            <input type="text" name="tresorier" placeholder="Trésorier">
                            <br>
                            <br>
                            Recevoir chez vous? :
                            <button type="button" onclick="verifierReponse(true)">Oui</button>
                            <button type="button" onclick="verifierReponse(false)">Non</button>
                            <br>
                            <br>
                            <div class="cacher">
                                Adresse du trésorier :<br>
                                <input type="text" name="adresse_tresorier" placeholder="Adresse du trésorier">
                                <br>
                                <br>
                                Ville trésorier : <br>
                                <input type="text" name="ville_tresorier" placeholder="Ville trésorier ">
                                <br>
                                <br>
                            </div>
                            Sport de la ligue:<br>
                            <input type="text" name="sport" placeholder="Sport de la ligue">         
                            <br>
                                
                            <br>
                            <button type="reset" class="formbutton">Annuler</button>
                            <button type="submit" class="formbutton">Enregistrer</button>
                        </div>
                    </div>
                </div>
            </div>

            </div>
        </div>
    </div>
    <!-- Lien vers le fichier JavaScript -->
    <script src="js/java.js"></script>
</body>
</html>