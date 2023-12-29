


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="inscription.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="contact.css">
    <?php include("../header/header.php"); ?>
<h1>Contactez-nous !</h1>

</head>
<body>

    <form action="contactScript.php" method="post">
        <label for="name">Nom</label><br>
            <input type="name" id="name" name="name" required><br>
        <label for="surname">Prénom</label><br>
            <input type="surname" id="surname" name="surname" required><br>
        <label for="email">Email</label><br>
            <input type="email" id="email" name="email" required><br>       
        <label for="message">Message</label><br>
            <input type="message" id="message" name="message" required><br>
        <br>
            <input type="submit" value="Envoyer">
                <a href="../accueil/index.php">Retour à la page accueil</a> 

    </form>
</body>
</html> 
<?php  
include("../footer/footer.php");
?>




