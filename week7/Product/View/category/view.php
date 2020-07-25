<?php

include_once '../../autoload.php';

$categories = array();
$error = false;

try {
    $categories = Controller\Category::getAll();
} catch (\Exception $e) {
    $error = $e->getMessage();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Category</title>
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
            <?php foreach($categories as $category): ?>
                <tr>
                    <td><?= $category['id']?></td>
                    <td><?= $category['name']?></td>
                    <td><?= $category['status']?></td>
                    <td><?= $category['date_created']?></td>
                    <td><a href="edit.php?category_id=<?= $category['id']?>"><button>Edit</button></a></td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</body>
</html>