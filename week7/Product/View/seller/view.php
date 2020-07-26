<?php
include_once '../../autoload.php';

$sellers = array();
$error = false;

try {
    $sellers = Controller\Seller::getAll();
} catch (\Exception $e) {
$error = $e->getMessage();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Seller</title>
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
    <?php foreach($sellers as $seller): ?>
        <tr>
            <td><?= $seller['id']?></td>
            <td><?= $seller['name']?></td>
            <td><?= $seller['status']?></td>
            <td><?= $seller['date_created']?></td>
            <td><a href="edit.php?seller_id=<?= $seller['id']?>"><button>Edit</button></a></td>
        </tr>
    <?php endforeach ?>
    </tbody>
</table>
</body>
</html>