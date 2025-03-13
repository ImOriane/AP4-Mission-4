<?php
// Inclure le fichier de connexion à la base de données
include('connexion.php');

// Préparer la requête SQL pour récupérer les données
$sql = "SELECT * FROM facture";  // Assurez-vous que "factures" est la bonne table
$result = $conn->query($sql);

// Vérifiez si des données ont été récupérées
if ($result->num_rows > 0) {
    // Les résultats sont disponibles
    // Vous pouvez commencer à générer le tableau HTML à partir des données
    // Exemple de tableau HTML :
    $tableRows = '';  // Variable pour stocker les lignes du tableau
    
    // Pour chaque ligne de données récupérées, ajouter une ligne au tableau
    while ($row = $result->fetch_assoc()) {
        $tableRows .= "
        <tr>
            <td><input type='checkbox' name='selec1'></td>
            <td>" . $row['numfacture'] . "</td>
            <td>" . $row['facture_date'] . "</td>
            <td>" . $row['code_ligue'] . "</td>
            <td>" . $row['echeance'] . "</td>
        </tr>";
    }
} else {
    $tableRows = "<tr><td colspan='5'>Aucune facture trouvée.</td></tr>";
}

$conn->close(); // Fermer la connexion à la base de données
?>

<!DOCTYPE html>
<html lang="fr">
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
                    <img class="home" src="img/home.png">
                </a>

                <!-- Boutons de la barre latérale -->
                <div class="boutonsbar">
                    <button class="sidebar-btn" onclick="location.href='outil_de_factures.php'">Création de factures</button>
                    <button class="sidebar-btn" onclick="location.href='Archive_factures.php'">Retrouver factures</button>
                    <button class="sidebar-btn" onclick="location.href='Gestion_BD.html'">Gestion ligues et prestations</button>
                </div>
            </div>
            
            <!-- Section droite -->
            <div class="content">
                <div class="contentfacture">
                    <h1>Retrouver factures</h1>
                    <div class="centrerfacture">
                        <input class="search" type="text" id="searchBar" placeholder="Rechercher.."> <br>
                        <div style="overflow-x: hidden; overflow-y: scroll; border:#000000 1px solid; width: 1000px; height: 300px; scrollbar-color: #5FC2BA #112240;">
                            <table id="dataTable">
                                <thead>
                                    <tr>
                                        <th class="selecteur">Selection</th>
                                        <th>Numero Facture</th>
                                        <th>Date Facture</th>
                                        <th>Numero Client</th>
                                        <th>Echeance</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Les lignes du tableau sont insérées ici -->
                                    <?php echo $tableRows; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <button class="bouton-imprimer">IMPRIMER FACTURE</button>
            </div>
        </div>
    </div>

    <!-- Lien vers le fichier JavaScript -->
    <script src="js/java.js"></script>
</body>
</html>
