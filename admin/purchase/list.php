<?php
$connection = new PDO("mysql:host=localhost;dbname=shop;charset=utf8mb4", "root", "123456");

$query = $connection->query('select * from purchase');
$purchases = $query->fetchAll();
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
                <? foreach ($purchases as $purchase) : ?>
                    <tr>
                        <td>
                            <?=$purchase['id']?>
                        </td>
                        <td>
                            <?=$purchase['client_id']?>
                        </td>
                        <td>
                            <?=$purchase['product_id']?>
                        </td>
                        <td>
                            <?=$purchase['created_at']?>
                        </td>
                        <td>
                            <a class="btn btn-primary" href="update.php?id=<?=$purchase['id']?>">Редактировать</a>
                            <a class="btn btn-danger" href="delete.php?id=<?=$purchase['id']?>">Удалить</a>
                        </td>
                    </tr>
                <? endforeach;?>
            </table>
        </div>
    </div>
</div>
</body>
</html>
