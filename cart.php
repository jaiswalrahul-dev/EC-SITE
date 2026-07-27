<?php
session_start();

$json = file_get_contents('data/products.json');
$products = json_decode($json, true);

$cart = $_SESSION ['cart'] ?? [];

include 'header.php';
?>

<h2>カート</h2>

<?php

$total =0;

if(count ($cart)===0) {
    echo "<p> カートは空いてです。</p>";

} else {
    foreach ($cart as $cartItem) {
        foreach ($products as $product) {
            if ($product['id'] == $cartItem){
                echo"<div>";

                echo "<h3>" . $product['name']. "</h3>";

                echo "<p>" . $product['price'] . "円</p>";

                echo "</div>";

                $total+= $product['price'];
            }
        }
    }
    echo "<hr>";
    echo "<h3>合計: {$total} 円</h3>";
}
?>

<?php include 'footer.php'; 
?>
<h3>お支払方法</h3>
<label>
    <input type="radio" name="payment" value="card">
    Credit Card
</label>

<label>
    <input type="radio" name="payment" value="コンビニ">
    コンビニ支払い
</label>

<label>
    <input type="radio" name="payment" value="cod">
    Cash on Delivery
</label>

<label>
    <input type="radio" name="payment" value="paypay">
    PayPay
</label>

<div id="cardInfo">
    <input type="text"
    placeholder="Card Number">

    <input type="text"
    placeholder="Card Holder">

    <input type="text"
    placeholder="MM/YY">

    <input type="password"
    placeholder="CVV">

    <script src="js/main.js"></script>
</div>