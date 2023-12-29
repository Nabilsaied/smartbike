<?php
include('../header/header.php');

if (isset($_SESSION['user'])) {
    echo "<meta http-equiv='refresh' content='0;url=../accueil/index.php'>";
    exit();
}

echo "
<html lang='fr'>
<head>
    <meta charset='UTF-8'>
    <link rel='stylesheet' href='signin.css'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Se connecter</title>
</head>
<body>
    <h1>Se connecter</h1>


";
if (count($_GET))
{
    $ph = $_GET['id'];
    echo "
    <form action='signinScript.php?id=".$ph."' method='post'>";
}
else
{
    echo "
    <form action='signinScript.php' method='post'>";
}
    echo "
        <label for='email'>Email :</label>
        <input type='email' id='email' name='email' placeholder='Entrez votre adresse email :' required><br>
        <label for='mot_de_passe'>Mot de passe :</label>
        <input type='password' id='pwd' name='pwd' placeholder='Entrez votre mot de passe :' required><br>
        <br>
        <input type='submit' value='Se connecter'>
        <br>
        <br>       
        <a href='../inscription/inscription.php'>Pas de compte ? Cliquez ici !</a>
    </form>
</body>
</html>";
include("../footer/footer.php");
?>
