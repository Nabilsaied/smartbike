<?php
include("../header/header.php");
include("../db/db.php");

$productId = $_GET['id'];
$products = $bdd->query("SELECT * FROM products WHERE productId = $productId")->fetch(PDO::FETCH_ASSOC);

$showForm = false;
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['continue'])) {
    $showForm = true;
}
?>

<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link rel="stylesheet" href="commande.css">
    <title>Commandes</title>
    <style>
        .hide {
            display: none;
        }

        .show {
            display: block;
        }
    </style>
</head>

<body>
    <h1>Vous voulez commander le <?php echo $products['name']; ?> ?</h1>

    <form class='<?php echo $showForm ? 'hide' : 'show'; ?>' method='post'>
        <button type="submit" name="continue">Continuer</button>
    </form>

    <a href='../produits/produits.php'>
        <button>Revenir en arrière</button>
    </a>

    <div class="<?php echo $showForm ? 'show' : 'hide'; ?>">
        <form action="commandReg.php" method="post">
            <input type="hidden" value="<?php echo $productId; ?>" name="productId">
            <input type="number" value="1" placeholder="Sélectionner le nombre de vélo" name="quantity">
            <input type="text" placeholder="Entrer votre adresse de livraison" name="address">
            <input type="text" placeholder="Entrer votre pays" name="country">
            <input type="text" placeholder="Entrer votre ville" name="city">
            <input type="text" placeholder="Entrer votre code postale" name="zipcode">
            <input type="submit" value="Valider votre commande">
        </form>
    </div>
</body>

</html>
