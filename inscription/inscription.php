
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="inscription.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php  
    include("../header/header.php");
?>
    <title>Créer un compte</title>
</head>
<body>

    <h1>Créer un compte</h1>

    <form action="inscriptionScript.php" method="post">
        <label for="name">Nom</label><br>
            <input type="text" id="name" name="name" required><br>
        <label for="surname">Prénom</label><br>
            <input type="text" id="surname" name="surname" required><br>
        <label for="email">Email</label><br>
            <input type="email" id="email" name="email" required><br>
            <label for="phone">Téléphone</label><br>
            <input type="tel" id="phone" name="phone" required><br>
        <label for="birthdate">Date de naissance</label><br>
            <input type="date" id="birthdate" name="birthdate" required><br>
            <label for="mot_de_passe">Mot de passe</label><br>
                <input type="password" id="pwdHash" name="pwdHash" required><br>
            <h5>Il est recommandé d'utilisé un mot de passe contenant au moins 12 caractères, dont un chiffre, une lettre majuscule et une lettre minuscule</h5><br>
            <input type="submit" value="Créer un Compte">
                <p> Vous avez déjà un compte? </p>
                <a href="../signin/signin.php">Connexion</a> 
    </form>    
</body>
</html>
<?php  
include("../footer/footer.php");
?>