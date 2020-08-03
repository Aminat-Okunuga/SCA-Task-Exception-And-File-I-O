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
    <title>Create Brand</title>
</head>
<body>
    <form action="process.php" method="post" novalidate>
        <div>
            <label for="name">Name</label>
            <input type="text" name="name" id="name">
        </div>

        <div>
            <label for="category">Category</label>
            <select name="category" id="">
                <option value="">Select Category</option>

                <?php foreach ($categories as $category): ?>
                    <option value="<?php echo $category['id']; ?>">
                        <?php echo $category['name']; ?></option>
                <?php endforeach ?>
            </select>
        </div>
        <div>
            <input type="submit" value="Create" name="create_brand">
        </div>
    </form>
</body>
</html>