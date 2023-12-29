<?php
include("../db/db.php");
include("../header/header.php");

if (!isset($_SESSION['user'])) {
    header('Location: ../signin/signin.php');
    exit();
}

$quantity = $_POST['quantity'];
$deliveryAddress = $_POST['address'];
$deliveryCountry = $_POST['country'];
$deliveryCity = $_POST['city'];
$deliveryZipcode = $_POST['zipcode'];
$userId = $_SESSION['user']['userId'];
$productId = $_POST['productId']; 

if ($quantity < 1) {
    echo "
            <head>
            <link rel='stylesheet' href='../commandes/commandRegError.css'>
            </head>
            <body>
            <div class = 'error-message'>
                <p>Veuillez sélectionner une quantité valide</p>
                <meta http-equiv='refresh' content='10;URL=../commandes/commandes.php?id=".$productId."'>
                <a href='../commandes/commandes.php?id=".$productId."'>
                    <button>Revenir en arrière</button>
                </a>
          </div>
          </body>";
} else 
{
    $command = $bdd->prepare("INSERT INTO orders (productId, quantity, delivery_address, delivery_country, delivery_city, delivery_zipcode, clientId) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $command->execute([$productId, $quantity, $deliveryAddress, $deliveryCountry, $deliveryCity, $deliveryZipcode, $userId]);
    $order = $bdd->query("SELECT orders.orderId, products.name AS productName, products.productId,
    clients.name AS clientName, clients.surname AS clientSurname, orders.quantity AS numberOfArticles,
    (orders.quantity * products.price) AS totalPrice       
    FROM 
        orders
    JOIN 
        products ON orders.productId = products.productId
    JOIN 
        clients ON orders.clientId = clients.clientId
    WHERE 
        clients.clientId = $userId
    ORDER BY 
        orders.orderDate DESC LIMIT 1")->fetch(PDO::FETCH_ASSOC);

        echo "
        <head>
        <link rel='stylesheet' href='../commandes/commandRegSuccess.css'>
        </head>
        <body>
        <div class = 'receipt'>
        <h1>Commande ".$order['orderId']." effectuée avec succès</h1>
        <p>Achat de : ".$order['productName']." effectué avec succes.<p>
        <p> Coût total : ".$order['totalPrice']." </p>
        <p>Adresse de livraison : ".$deliveryAddress." ".$deliveryZipcode." ".$deliveryCity.".</p>
        <a href='../accueil/index.php'> Retour a l'accueil</a>
        </div>
        </body>";

}

?>
