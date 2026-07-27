<?php
session_start();
//JSON ファイルを読み込む
$json = file_get_contents('data/products.json');

//JSON を配列に変繰り
$products = json_decode($json, true);

include 'header.php';
?>

<h2>ITEMS</h2>

<div class="product-list">

<?php foreach ($products as $product): ?>

    <div class="product">
        <img src="<?php echo $product ['image']; ?> "width="150">

        <h3>
            <?php echo $product ['name']; ?>
        </h3>

        <p>
            <?php echo $product['namee']; ?>円
        </p>

        <a href="product.php?id=<?php echo $product['id']; ?>">
        詳細お見る
    </a>
 　</div>
 <?php endforeach; ?>
</div>

<?php include 'footer.php'; ?>