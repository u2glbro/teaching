<?php
declare(strict_types=1);
$connection = new PDO("mysql:host=localhost;dbname=shop;charset=utf8mb4","root","123456");
$query = $connection->query('select * from category');
$categories = $query->fetchAll();
$query = $connection->prepare('select * from product where id = ?');
$query->execute([$_GET['id']]);
$product = $query->fetch();

if ($_POST['id']){
    $inStock =0;
    if ($_POST['in_stock']){
        $inStock = 1;
    }
    // update
    $connection->prepare("
        update product
         set
        title =?,
        description = ?,
        in_stock = ?,
        category_id = ?
         where id =?
         ")->execute([
        $_POST['title'],
        $_POST['description'],
        $inStock,
        $_POST['category_id'],
        $_POST['id']]
        );

    // redirect to list
    header('Location: /admin/product/list.php');
    exit();
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport"
          content="width=device-width, user-scable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge"
    <title>Админка</title>
    <link rel="stylesheet" href="https://bootswatch.com/4/flatfly/bootstrap.min.css">
</head>
<body>
<? include "../__includes/nav.php";?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <form method="post">
                <input type="hidden" name="id" value="<?=$_GET['id']?>">
                <div>
                    <label>Заголовок</label>
                    <input type="text" name="title" class="form-control" value="<?=$product['title']?>">
                </div>
                <div>
                    <label>Описание</label>
                    <textarea name="description" rows="10" class="form-control"><?=$product['description']?></textarea>
                </div>
                <div>
                    <label>
                        <input type="checkbox" name="in_stock" value="1"
                             <?
                                 if ($product['in_stock'] == 1){
                                    echo'checked';
                                 }
                            ?>
                        >
                        В продаже
                    </label>
                </div>
                <div>
                    <label>Категория</label>
                    <select name="category_id" class="form-control">
                        <?foreach ($categories as $category):?>
                        <option value="<?=$category['id']?>"
                            <?
                            if ($product['category_id'] == $category['id']){
                                echo'selected';
                            }
                            ?>
                            ><?=$category['title']?></option>
                        <?endforeach;?>
                    </select>
                </div>
                <div>
                    <div style="margin-top: 20px;">
                    <button class="btn btn-success">Сохранить</button>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>
