<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');

$name = $_POST['name'];
$surname = $_POST['surname'];
$email = $_POST['email'];
$message = $_POST['message'];

include("../db/db.php");
include('../header/header.php');

try {
    $command = $bdd->prepare("INSERT INTO messages (customer_name, customer_surname, customer_email, customer_message) VALUES (?, ?, ?, ?)");
    $command->execute([$name, $surname, $email, $message]);

    echo "<p>Message envoyé!</p>";
} catch (PDOException $e) {
    echo "<p>Erreur: " . $e->getMessage() . "</p>";
}

include("../footer/footer.php");

?>
