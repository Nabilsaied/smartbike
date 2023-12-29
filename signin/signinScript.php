<style>
<?php include("signinScript.css");?>
</style>

<?php
  error_reporting(E_ALL);
  ini_set('display_errors','1');
  include("../db/db.php");
  include('../header/header.php');
  


  $email = $_POST['email'];
  $pwd = $_POST['pwd'];

  $user = $bdd->query("SELECT clientId FROM clients WHERE email='$email'")->fetchColumn();
  $username = $bdd->query("SELECT name FROM clients WHERE email='$email'")->fetchColumn();

  if ($pwd == $bdd->query("SELECT pwdHash FROM clients WHERE clientID='$user'")->fetchColumn()) 
  {
    $_SESSION['user'] = array(
      'userId' => $user,
      'email' => $email,
      'name' => $username
    );
     if (count($_GET))
    {
    $ph = $_GET['id'];
    echo "
        <body>
          <div class='all'>
            <h3 class='welcome'>Bienvenue ".$username.".</h3>
            <a href='../commandes/commandes.php?id=".$ph."'>
            <button class='link'>Retour a l'achat</button></a>
          </div>
        </body>
    ";
    }
    else
    {
      echo "<body>
      <div class='all'>
        <h3 class='welcome'>Bienvenue ".$username.".</h3>
        <meta http-equiv='refresh' content='3;url=../accueil/index.php'>
        <a href='../accueil/index.php'>
        <button class='link'> Retour a l'accueil</button></a>
      </div>
    </body>";
    }   

  } 
  else 
  {
    if (count($_GET))
    {
    $ph = $_GET['id'];
    echo "<body>
            <div class='all'>
              <h2 class='welcome'>Adresse e-mail ou mot de passe éronnée</h2>
              <meta http-equiv='refresh' content='10;url=../signin/signin.php'>
              <a href='../signin/signin.php?id=".$ph."'>
                <button class='link'>Retourner à la page de connexion</button>
              </a>
            </div>
          </body>";
    }
    else
    {
      echo "<body>
      <div class='all'>
        <h2 class='welcome'>Adresse e-mail ou mot de passe éronnée</h2>
        <meta http-equiv='refresh' content='10;url=../signin/signin.php'>
        <a href='../signin/signin.php'>
          <button class='link'>Retourner à la page de connexion</button>
        </a>
      </div>
    </body>";
    }
  }
  
  
  include('../footer/footer.php');
  
?>
