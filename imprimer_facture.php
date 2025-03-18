<?php
if (!isset($_GET['numfacture'])) {
    die("Aucune facture sélectionnée.");
}

$numfacture = intval($_GET['numfacture']);

include('connexion.php');

// Récupération des données de la facture
$sql = "SELECT * FROM facture f, ligue_facture lf, prestation p, ligue l WHERE f.numfacture = lf.numfacture AND  p.Reference= lf.Reference AND l.code_ligue= f.code_ligue AND f.numfacture = ?"; 
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $numfacture);
$stmt->execute();
$result = $stmt->get_result();
$facture = $result->fetch_assoc();

if (!$facture) {
    die("Facture introuvable.");
}

$montant=$facture['pu']* $facture['quantite'];

$conn->close();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/Stylefacture.css">
    <title>Facture <?php echo $facture['numfacture']; ?></title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; }
        h1 { text-align: center; }
        .facture-container { max-width: 600px; margin: auto; border: 1px solid #000; padding: 20px; }
        button { display: block; margin: auto; padding: 10px 20px; font-size: 16px; cursor: pointer; }
    </style>
    <script>

        function imprimerPage() {
            document.getElementById("print").style.display="none";
            window.print();
            setTimeout(() => {
                document.getElementById("print").style.display="block";
            }, 100);

        }
    </script>
</head>
    
<body>
        <div class ="image">
            <img src="image.png">
        </div>
        
        <div class="client">
        <h1>Client:</h1>
        <p><strong>Nom de la ligue: :</strong> <?php echo $facture['nom_ligue']; ?></p>
        <p><strong>Trésorier :</strong> <?php echo $facture['tresorier']; ?></p>
        <p><strong>Adresse: :</strong> <?php echo $facture['adresse_tresorier']; ?></p>
        <p><strong>Ville: :</strong> <?php echo $facture['ville_tresorier']; ?></p>
        </div>
<div class="facture-container">
    <h1>Facture #<?php echo $facture['numfacture']; ?></h1>
    <p><strong>Date :</strong> <?php echo $facture['facture_date']; ?></p>
    <p><strong>Échéance :</strong> <?php echo $facture['echeance']; ?></p>
    <p><strong>Code Client :</strong> <?php echo $facture['code_ligue']; ?></p>
    <p><strong>Référence :</strong> <?php echo $facture['Reference']; ?></p>
    <p><strong>Désignation:</strong> <?php echo $facture['Designation_du_produit']; ?></p>
    <p><strong>Quantité:</strong> <?php echo $facture['quantite']; ?></p>
    <p><strong>Prix Unitaire:</strong> <?php echo $facture['pu']; ?></p>
    <p><strong>Montant</strong> <?php echo $montant ?></p>
    <button id= "print" onclick="imprimerPage()">Imprimer</button>
</div>
</body>
</html>
