<?php
include_once '../../autoload.php';

$brands = array();
$error = false;

try {
    $brands = Controller\Brand::getAll();
} catch (\Exception $e) {
    $error = $e->getMessage();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Brand</title>
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
            <?php foreach($brands as $brand): ?>
                <tr>
                    <td><?= $brand['id']?></td>
                    <td><?= $brand['name']?></td>
                    <td><?= $brand['status']?></td>
                    <td><?= $brand['date_created']?></td>
                    <td><a href="edit.php?brand_id=<?= $brand['id']?>"><button>Edit</button></a></td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</body>
</html>