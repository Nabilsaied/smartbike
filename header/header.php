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
      <div id='header'>
        <img id='pic' src='../img/logo.jpg'>
      
        <input type='checkbox' id='toggle' style='display:none;'>
      <label for='toggle' class='burger'>
          <span></span>
          <span></span>
          <span></span>
      </label>
    
      <nav id='navMenu'>
          <a href='../accueil/index.php'>Accueil</a>
          <a href='../produits/produits.php'>Nos Vélos</a>
          <a href='../contact/contact.php'>Contact</a>
          <a href='../about/about.php'>À Propos</a>";
          if (isset($_SESSION['user']))
          {
            echo "
          <a href='../signin/signout.php'>Déconnexion</a>

          <p>Bonjour ".$_SESSION['user']['name']."<p>";
          }
          else
          {
            echo "
            <a href='../inscription/inscription.php'>Inscription</a>
            <a href='../signin/signin.php'>Login</a>";
          }
          echo "
      </nav>
    </div>";

?>