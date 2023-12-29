<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="signup.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Se connecter</title>
</head>
<body>
    <h1>Se connecter</h1>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST["email"];
        $mot_de_passe = $_POST["pwdHash"];
        if ($email == "name.surname@.com" && $mot_de_passe == "motdepasse") {
            echo "<p>Connexion réussie !</p>";
        } else {
            echo "<p>Email ou mot de passe incorrect.</p>";
        }
    }
    ?>

    <form action="connexion.php" method="post">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" required><br>
<br>
<br>
        <label for="mot_de_passe">Mot de passe</label>
        <input type="password" id="pwdHash" name="pwdHash" required><br>
        <br>
        <input type="submit" value="Se connecter">
        <p> Nouveau</p> <a href="inscription.html">Créer un compte</a>
    </form>
</body>
</html>
