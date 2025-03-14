
<?php
include('connexion.php');
// Vérifier si les données ont été envoyées via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $reference = $_POST['Reference'];
    $codeligue= $_POST['code_ligue'];
    $date= $_POST['date'];
    $quantite= $_POST['quantite'];
    $numfacture= $_POST['numfacture'];


    // Préparer la requête SQL pour insérer les données dans la base
    $sql = "INSERT INTO facture (numfacture, facture_date,code_ligue) VALUES ('$numfacture', '$date' , '$codeligue')";
    $sql2 = "INSERT INTO ligue_facture (Reference,quantite) VALUES ('$reference','$quantite')";
    // Exécuter la requête
    if ($conn->query($sql) === TRUE) {
        echo '<div class="ajouter">Prestation ajoutée!</div>';

    } else {
        echo "Erreur: " . $sql . "<br>" . $conn->error;
    }

    if ($conn->query($sql2) === TRUE) {
        echo '<div class="ajouter">Prestation ajoutée!</div>';

    } else {
        echo "Erreur: " . $sql2 . "<br>" . $conn->error;
    }
}
$conn->close();
?>
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
            <div class="contentfacture">
                <form action="outil_de_factures.php" method="POST">
                    <div class="formulairefacture">
                        <div class="fact">
                            <h2>Outil de factures</h2> 
                            Référence :
                            <br>
                            <input type="text"  name ="Reference" placeholder="Réference">
                            <br>
                            Code client
                            <br>
                            <input type="text" name= "code_ligue"placeholder="Code client">
                            <br>
                            <br>
                            Numero facture :<br>
                            <input type="text" name="numfacture" placeholder="Numero facture">
                            <br>
                            <br>
                            Date:<br>
                            <input type="date" name="date">         
                            <br>                                
                            <br>
                            Quantité:<br>
                            <input type="number" name="quantite" min="0.00" max="10000.00" step="0.01" value="1.00" />                         
                            <br>
                            <br>
                            <button class="formbutton">Annuler</button>
                            <button class="formbutton">Génerer</button>
                        </div>
                    </div>
                </form>
                
            </div>
        </div>
    </div>
    <!-- Lien vers le fichier JavaScript -->
    <script src="js/java.js"></script>
</body>
</html>
