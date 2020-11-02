<?php
$connection = new PDO("mysql:host=localhost;dbname=shop;charset=utf8mb4", "root","123456");
//$connection = mysqli_connect("localhost","root" ,"123456" , "shop");

$query = $connection->query('select * from product limit 3');
//$query = mysqli_query($connection, "select * from product");

$products = $query->fetchAll();
//$products = mysqli_fetch_array($query);

//echo '<pre>';
//print_r($products);
//exit;
foreach ($products as $product){
    echo "#{$product['id']} - {$product['title']}<br>";
    //echo "<pre>";
    //print_r($product['description']);
    //exit;
}
