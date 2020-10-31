<?php
declare(strict_types=1);
$connection = new PDO("mysql:host=localhost;dbname=shop;charset=utf8mb4", "root", "123456");

if ($_POST['id']) {
    // delete
    $query = $connection->query('delete from category where id = ' . $_POST['id']);
    $query->execute();

    // redirect to list
    header('Location: /admin/category/list.php');
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
                <input type="hidden" name="id" value="<?=$_GET['id']?>">
                <div>Уверены, что хотите удалить запись?</div>
                <div>
                    <button type="submit" class="btn btn-danger">Удалить</button>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>