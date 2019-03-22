<?php
require_once 'parts/header.php';

if (isset($_GET['cat'])) {
    $currentCat = $_GET['cat'];
    $errCat = 'Упс, а такой страницы нет!';
    if($currentCat == 'edible' || $currentCat == 'poisonous' || $currentCat == 'polypores') {
        $products = $connect->query("SELECT * FROM products WHERE cat='$currentCat'");
        $products = $products->fetchAll(PDO::FETCH_ASSOC);
    }

} else {
    $products = $connect->query("SELECT * FROM products");
    $products = $products->fetchAll(PDO::FETCH_ASSOC);
}

?>
    <div class="main">
        <? if(isset($products)) {
             foreach($products as $product) { ?>
                <div class="card">
                    <a href="product.php?product=<?php echo $product['title']?>">
                        <img src="img/<? echo$product['img'] ?>" alt="<? echo $product['rus_name']?>">
                    </a>
                    <div class="label"><? echo $product['rus_name']?> (<? echo $product['price']?> рублей)</div>
                    <form action="actions/add.php" method="post">
                        <input type="hidden" name="id" value="<?=$product['id']?>">
                        <input type="submit" value="Добавить в корзину">
                    </form>
                </div>
        <? }}
        else {
            echo '<p>'.$errCat.'</p><a href="index.php" title="На главную">Вернуться на главную</a>';
        }
        ?>
    </div>

</body>
</html>

