<?php
require_once 'parts/header.php';

$products = $connect->query("SELECT * FROM products");
$products = $products->fetchAll(PDO::FETCH_ASSOC);

//    echo "<pre>";
//    var_dump($cats);
//    echo "</pre>";

?>
<div class="main">
    <? foreach($products as $product) { ?>
        <div class="card">
            <a href="product.php">
                <img src="img/<? echo$product['img'] ?>" alt="<? echo $product['rus_name']?>">
            </a>
            <div class="label"><? echo $product['rus_name']?> (<? echo $product['price']?> рублей)</div>
            <button type="submit">Добавить в корзину</button>
        </div>
    <? } ?>
</div>

</body>
</html>

