<?php
$connection = new PDO("mysql:host=localhost;dbname=shop;charset=utf8mb4", "root", "123456");

$query = $connection->query('select * from product');
$products = $query->fetchAll();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Админка</title>
    <link rel="stylesheet" href="https://bootswatch.com/4/flatly/bootstrap.min.css">
</head>
<body>
<? include "../__includes/nav.php";?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="text-right" style="margin-bottom: 20px; margin-top: 20px;">
                <a class="btn btn-success" href="create.php">Создать</a>
            </div>
            <table class="table">
                <tr>
                    <th>
                        ID
                    </th>
                    <th>
                        Заголовок
                    </th>
                    <th>
                        Действия
                    </th>
                </tr>
                <? foreach ($products as $product) : ?>
                    <tr>
                        <td>
                            <?=$product['id']?>
                        </td>
                        <td>
                            <?=$product['title']?>
                        </td>
                        <td>
                            <?=$product['title']?>
                        </td>
                        <td>
                            <a class="btn btn-primary" href="update.php?id=<?=$product['id']?>">Редактировать</a>
                            <a class="btn btn-danger" href="delete.php?id=<?=$product['id']?>">Удалить</a>
                        </td>
                    </tr>
                <? endforeach;?>
            </table>
        </div>
    </div>
</div>
</body>
</html>
