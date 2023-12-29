<style>
<?php include("articles.css");?>
</style>


<?php 
error_reporting(E_ALL);
ini_set('display_errors','1');

include('../header/header.php');
include("../db/db.php");




if (count($_GET))
{
    $ph = $_GET['id'];
    $products = $bdd->query("SELECT * FROM products WHERE productId = $ph")->fetch(PDO::FETCH_ASSOC);

    //var_dump($products);
    echo "
    <body>
    <section id='productInfo'>
        <div id='productImage'>
           <img src='../img/".$products['picture']."' alt='Product Image'>
        </div>
        <div id='productDetails'>
            <h2>Description of the Product</h2>
                <div class='description'>
                    <p>".$products['description']."</p>
                </div>
                <div class='price'>
                    <p>Price: ".$products['price']."€ </p>
                </div>

                <div class='commandButton'>";
                if (isset($_SESSION['user']))
                {
                    echo "
                <a href='../commandes/commandes.php?id=".$products['productId']."'>
                    <button>Commandez ce vélo</button>
                </a>";
                }
                else
                {
                    echo "
                    <a href='../signin/signin.php?id=".$products['productId']."'>
                    <button>Connectez vous pour commander ce vélo</button>
                </a>";
                }
        echo "
        </div>
    </section></body>";
}
else
{
    echo "
    <body>
    <h1> Theres nothing here...</h1>
    </body>";
}
include("../footer/footer.php");
?>