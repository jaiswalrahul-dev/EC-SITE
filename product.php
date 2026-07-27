<?php
session_start();

$id = $_GET ['id'];

$json = file_get_contents('data/products.json');
$products = json_decode($json,true);

$productData = null;

foreach ($products as $product){
     
    if ($product['id'] == $id) {
        $productData = $product;
        break;
  }
 } 

 include 'header.php';
 ?>
  
  <?php if ($productData): ?>

    <h2><?php echo $productData['name']; ?></h2>

    <img src="<?php echo $productData['image']; ?>" width="300">

    <p>
        <?php echo $productData['description']; ?>
    </p>

    <p>
        価値:
        <?php echo $productData['price']; ?>円
    </p>
    
    <form action="add-cart.php" method="post">

    <input type ="hidden" name="id"
       value="<?php echo $productData  ['id']; ?>">

       <button type= "submit">
        カートに追加
       </button>
  </form>

  <?php else: ?>

    <p>商品が見つかりません</p>

    <?php endif; ?>

    <?php include 'footer.php'; ?>

