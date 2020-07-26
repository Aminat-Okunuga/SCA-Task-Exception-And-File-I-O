<?php
include_once '../../autoload.php';

$products = array();
$error = false;

try {
    $products = Controller\Product::getAll();
} catch (\Exception $e) {
    $error = $e->getMessage();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Product</title>
</head>
<body>
<table border="1">
    <thead>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Status</th>
        <th>Date</th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    <?php foreach($products as $product): ?>
        <tr>
            <td><?= $product['id']?></td>
            <td><?= $product['name']?></td>
            <td><?= $product['status']?></td>
            <td><?= $product['date_created']?></td>
            <td><a href="edit.php?product_id=<?= $product['id']?>"><button>Edit</button></a></td>
        </tr>
    <?php endforeach ?>
    </tbody>
</table>
</body>
</html>