<?php

$connection = new PDO("mysql:host=localhost;dbname=shop;charset=utf8mb4", "root", "123456");

$query = $connection->query('select * from client');
$categories = $query->fetchAll();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {


    $connection->prepare("
        insert into client
        set
           name = ?,
           phone = ?,
            address = ?
            
    ")->execute([
        $_POST['name'],
        $_POST['phone'],
        $_POST['address']
    ]);

    // redirect to list
    header('Location: /admin/
client/list.php');
    exit();
}


if ($_POST['id']) {

    // update
    $connection->prepare("
        update category
        set
           name = ?,
           phone = ?,
            address = ?
        where id = ?
    ")->execute([
        $_POST['name'],
        $_POST['phone'],
        $_POST['address'],
        $_POST['id']
    ]);

    // redirect to list
    header('Location: /admin/
client/list.php');
    exit();
}

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
            <form method="post">
                <div>
                    <label>Имя</label>
                    <input type="text" name="name" class="form-control">
                </div>
                <div>
                    <label>Телефон</label>
                    <input type="text" name="phone" class="form-control">
                </div>
                <div>
                    <label>Адрес</label>
                    <input type="text" name="address" class="form-control">
                </div>



                <div style="margin-top: 20px;">
                    <button class="btn btn-success">Сохранить</button>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>
