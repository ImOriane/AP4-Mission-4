<?php
// Inclure le fichier de connexion à la base de données
include('connexion.php');

// Préparer la requête SQL pour récupérer les factures
$sql = "SELECT * FROM facture";
$result = $conn->query($sql);

// Vérifier si des données ont été récupérées
$tableRows = '';

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $tableRows .= "
        <tr>
            <td><input type='radio' name='selec_facture' value='" . $row['numfacture'] . "'></td>
            <td>" . $row['numfacture'] . "</td>
            <td>" . $row['facture_date'] . "</td>
            <td>" . $row['code_ligue'] . "</td>
            <td>" . $row['echeance'] . "</td>
        </tr>";
    }
} else {
    $tableRows = "<tr><td colspan='5'>Aucune facture trouvée.</td></tr>";
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Outils Gestion CROSL</title>
    <link rel="stylesheet" href="style/styles.css">
    <script>
        function imprimerFacture() {
            // Récupérer la facture sélectionnée
            var selectedFacture = document.querySelector('input[name="selec_facture"]:checked');

            if (selectedFacture) {
                var numFacture = selectedFacture.value;
                window.location.href = "imprimer_facture.php?numfacture=" + numFacture;
            } else {
                alert("Veuillez sélectionner une facture à imprimer.");
            }
        }
    </script>
</head>
<body>
<div class="background">
    <div class="main-container">
        <div class="sidebar">
            <a href="index.html">
                <img class="home" src="img/home.png">
            </a>
            <div class="boutonsbar">
                <button class="sidebar-btn" onclick="location.href='outil_de_factures.php'">Création de factures</button>
                <button class="sidebar-btn" onclick="location.href='Archive_factures.php'">Retrouver factures</button>
                <button class="sidebar-btn" onclick="location.href='Gestion_BD.html'">Gestion ligues et prestations</button>
            </div>
        </div>

        <div class="content">
            <div class="contentfacture">
                <h1>Retrouver factures</h1>
                <div class="centrerfacture">
                    <input class="search" type="text" id="searchBar" placeholder="Rechercher.."> <br>
                    <div style="overflow-x: hidden; overflow-y: scroll; border:#000000 1px solid; width: 1000px; height: 300px;">
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
                            <?php echo $tableRows; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <button class="bouton-imprimer" onclick="imprimerFacture()">IMPRIMER FACTURE</button>
        </div>
    </div>
</div>
</body>
</html>
