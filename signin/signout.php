<?php
    session_start();
    session_unset();
    header('Location: ../accueil/index.php');
    exit();

?>