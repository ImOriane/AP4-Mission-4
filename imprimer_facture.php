<?php
if (!isset($_GET['numfacture'])) {
    die("Aucune facture sélectionnée.");
}

$numfacture = intval($_GET['numfacture']);

include('connexion.php');

// Récupération des données de la facture
$sql = "SELECT * FROM facture WHERE numfacture = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $numfacture);
$stmt->execute();
$result = $stmt->get_result();
$facture = $result->fetch_assoc();

if (!$facture) {
    die("Facture introuvable.");
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facture <?php echo $facture['numfacture']; ?></title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; }
        h1 { text-align: center; }
        .facture-container { max-width: 600px; margin: auto; border: 1px solid #000; padding: 20px; }
        button { display: block; margin: auto; padding: 10px 20px; font-size: 16px; cursor: pointer; }
    </style>
    <script>
        function imprimerPage() {
            window.print();
        }
    </script>
</head>
<body>
<div class="facture-container">
    <h1>Facture #<?php echo $facture['numfacture']; ?></h1>
    <p><strong>Date :</strong> <?php echo $facture['facture_date']; ?></p>
    <p><strong>Échéance :</strong> <?php echo $facture['echeance']; ?></p>
    <p><strong>Code Ligue :</strong> <?php echo $facture['code_ligue']; ?></p>
    <button onclick="imprimerPage()">Imprimer</button>
</div>
</body>
</html>
