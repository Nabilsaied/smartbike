<?php

    error_reporting(E_ALL);
    ini_set('display_errors','1');

    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $birthday = $_POST['birthdate'];
    $pwd = $_POST['pwdHash'];

    include("../db/db.php");

    $emailCheck = $bdd->prepare('SELECT COUNT(*) from clients WHERE email = ?');
    $emailCheck->execute([$email]);
    $emailCount = $emailCheck->fetchColumn();

    include('../header/header.php');
    if ($emailCount > 0)
    {
        echo "
        <div class='emailAlreadyUsed'>
            <p>L'adresse est déjà associé à un compte </p>
        </div>
        <div class ='connexionRedirect'>
            <a href='../signin/signin.php'>
                <button>Se connecter</button>
            </a>
        </div>";
    } 
    else 
    {
        $inscription = $bdd->prepare('INSERT INTO clients(name, surname, email, phone, birthdate, pwdHash) VALUES (?, ?, ?, ?, ?, ?)');
            $inscription->execute([$name, $surname, $email, $phone, $birthday, $pwd]);
            echo "Inscription réussi";
    }
    include("../footer/footer.php");
?>