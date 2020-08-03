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
    <title>View Sellers</title>
</head>
<body>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Country</th>
                <th>Score</th>
                <th>Followers</th>
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
                    <td><?= $seller['country']?></td>
                    <td><?= $seller['score']?></td>
                    <td><?= $seller['followers']?></td>
                    <td><?= $seller['status']?></td>
                    <td><?= $seller['date_created']?></td>
                    <td><a href="edit.php?seller_id=<?= $seller['id']?>"><button>Edit</button></a></td>
                    <td><a href="../../Controller/Seller.php?brand_id=<?= $seller['id']?>" onclick="return ConfirmDelete();"><button>Delete</button></a></td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</body>
</html>