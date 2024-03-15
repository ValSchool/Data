<?php
include 'product.php';
include '../db.php';

$products = new Product($mydb);

$allProducts = $products->selectAllProducts()->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Overview</title>
</head>
<body>
    <h1>Product Overview</h1>

    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Description</th>
            <th>Price</th>
            <th colspan="2">Action</th>
        </tr>
        <?php foreach ($allProducts as $product) : ?>
            <tr>
                <td><?= $product['productid'] ?></td>
                <td><?= $product['name'] ?></td>
                <td><?= $product['description'] ?></td>
                <td><?= $product['price'] ?></td>
                <td><a href='edit.php?ID=<?= $product['productid'] ?>'>Edit</a></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
