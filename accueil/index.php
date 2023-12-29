<?php
    error_reporting(E_ALL);
    ini_set('display_errors', '1');

    include("../db/db.php");

    $stmtProduct= $bdd->prepare("SELECT * FROM products");
    $stmtProduct->execute();
    $products = $stmtProduct->fetchall();

    $stmtBike5 = $bdd->prepare("SELECT * FROM products WHERE name = 'Bike5'");
    $stmtBike5->execute();
    $bike5 = $stmtBike5->fetch();
    $max=count($products);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <link rel="stylesheet" href="index.css">
</head>
<?php include('../header/header.php'); ?>
<body>

<div id="Principale" class="firstContainer">
    <div class="pictureMain">
        <a href="../articles/articles.php?id=<?php echo $bike5['productId']; ?>">
            <img src="../img/<?php echo $bike5['picture']; ?>" alt="<?php echo $bike5['name']; ?>"></img>
        </a>
    </div>
    <div class="textMain">
        <h1><?php echo $bike5['name']; ?></h1>
        <p><?php echo $bike5['description']; ?></p>
        <a href="../articles/articles.php?id=<?php echo $bike5['productId']; ?>" class="mainButton">
            En savoir plus
        </a>
    </div>
</div> 

<div id="secondaire" class="secondContainer">
    <h2>Nos autres produits à découvrir</h2>
    <div class="pictureThird">
        <img src="../img/velo<?php echo rand(2,$max);?>.jpg" alt="Autres produits">
    </div>
    <form action="../produits/produits.php">
        <input class="mainButton" type="submit" value="En savoir plus">
    </form>
</div>

<div id="terciaire" class="thirdContainer">
    <h2>Découvrez nos valeurs et notre atelier</h2>
    <div class="pictureSec">
        <img src="../img/apropos.jpg" alt="A propos">
    </div>
    <form action ="../about/about.php">
        <input class="mainButton" type="submit" value="En savoir plus">
    </form>
</div>
<footer>
<?php include("../footer/footer.php"); ?>
</footer>
</body>
</html>