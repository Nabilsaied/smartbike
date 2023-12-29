<?php
try
{
    $bdd = new PDO("mysql:host=localhost;dbname=bike","root","");
}

catch(Exception $e)
{
    echo "Problème connexion base de donnée:";
}
?>