<style>
<?php include("produits.css");?>
</style>

<?php  
    error_reporting(E_ALL);
    ini_set('display_errors','1');
    include("../db/db.php");
    include("../header/header.php");

    $products = $bdd->query("select * from products")->fetchAll();
    foreach($products as $product)
    {
        echo "<div class = 'row'><table><div class = 'column'><tr>
                <td><a href ='../articles/articles.php?id=".$product['productId']."'>".$product['name']."</a></td>
                <td>".$product['productType']."</td>
                <td class='price'>".$product['price']."</td>
                
                <td class='description'>".$product['description']."</td>
                <td class='pic'><img class = 'picture' src ='../img/".$product['picture']."'>
                </tr></table></div></div>";
    }
    include("../footer/footer.php");
?>