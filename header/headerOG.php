<?php
  session_start();
?>
<style>
<?php include("header.css");?>
</style>

<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

include("../db/db.php");

echo "
<meta name='viewport' content='width=device-width, initial-scale=1.0'>
<div class = 'top'><div class = 'smartbike'>
<div class = 'container sbContainer'>
    <input class = 'checkbox' type='checkbox' name='' id='' />
    <div class = 'hamburgerLines'>
        <span class='line line1'></span>
        <span class='line line2'></span>
        <span class='line line3'></span>
    </div>
    <div class='headerTitle'>
        <img id = 'pic' src = '../img/logo.jpg'>
    </div>";
    if (isset($_SESSION['user']))
    {
        echo "<div class='login'>
                <h2>Bienvenue ".$_SESSION['user']['name']." !</h2>
                <a href='../signin/signout.php'>Deconnexion</a>
              </div>";

    }
    else
        echo "<div class='login'>
        <a href = '../signin/signin.php'>Login</a>
        <a href = '../inscription/inscription.php'>Inscription</a>
        </div>
        ";

    echo "

    <div class='menuItems'>
    <a href='../accueil/index.php'>Home</a>
    <a href='../produits/produits.php'>Products</a>
    <a href='../contact/contact.php'>Contact</a>
    <a href='../about/about.php'>About</a>
  </div>";
?>