<?php
session_start();

$id = $_POST['id'];

//カートがなければ作る
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];

}
 //商品IDを追加
 $_SESSION['cart'][] = $id;

 //カート画面へ移動
 header ('Location: cart.php');
 exit;