
<?php
include('connexion.php');
// Vérifier si les données ont été envoyées via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $reference = $_POST['Reference'];
    $desiproduit= $_POST['Designation_du_produit'];
    $PU = $_POST['pu'];


    // Préparer la requête SQL pour insérer les données dans la base
    $sql = "INSERT INTO prestation (Reference, Designation_du_produit, pu) VALUES ('$reference', '$desiproduit', '$PU')";

    // Exécuter la requête
    if ($conn->query($sql) === TRUE) {
        echo '<div class="ajouter">Prestation ajoutée!</div>';

    } else {
        echo "Erreur: " . $sql . "<br>" . $conn->error;
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
            
            <div class="content-GBB-Prestation">
             
            <form action="Prestation.php" method="POST">
                <div class="formulairepresta" >
                    <div class="form">
                        <h2>Gestion Prestation</h2>
                        <br>
                     
                        
                        <br>
                        Référence :
                        <br>
                        <input type="text" id="Reference" name="Reference" placeholder="Référence">
                        <br>
                        <br>
                        Désignation du produit :<br>
                        <input type="text" id="Designation_du_produit" name="Designation_du_produit" placeholder="Désignation du produit">
                        <br>
                        <br>
                        Prix unitaire HT:<br>
                        <input type="number" id="pu" name="pu" min="0.00" max="10000.00" step="0.01" value="1.00" />                         
                        <br>
                        <br>
                        <button type="reset" class="formbutton">Annuler</button>
                        <button type="submit" class="formbutton">Enregistrer</button>

                    </div>
                </div>
            </div>







        </div>
    </div>
    <!-- Lien vers le fichier JavaScript -->
    <script src="js/java.js"></script>
</body>
</html