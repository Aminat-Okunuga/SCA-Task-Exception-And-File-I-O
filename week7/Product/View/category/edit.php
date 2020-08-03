<?php

include_once '../../autoload.php';

use \Library\Form as Form;
use \Library\Validator as Validator;

try {

    $category_id = isset($_GET['category_id']) ? Form::sanitise($_GET['category_id']) : null;
    $categoryError = Validator::validateNumber('Category', $category_id);
    if ($categoryError != null) {
        throw new \Exception($categoryError);
    }

    $category = Controller\Category::get($category_id);
    if($category == null) {
        throw new \Exception("Category does not exist");
    }

} catch (\Exception $e) {
    $error = $e->getMessage();
    echo $error;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Category</title>
</head>
<body>
    <form action="process_edit.php" method="post" novalidate>
        <div>
            <label for="name">Name</label>
            <input type="text" name="name" id="name" value="<?= $category['name']?>">
        </div>
        <div>
            <label for="status">Status</label>
            <select name="status" id="status">
                <option value="">Select a status</option>
                <option <?= $category['status'] == 1 ? 'selected' : '' ?> value="1">Active</option>
                <option <?= $category['status'] == 2 ? 'selected' : '' ?> value="2">Inactive</option>
            </select>
        </div>
        <input type="hidden" name="category_id" id="category_id" value="<?= $category_id ?>">
        <div>
            <input type="submit" value="Edit" name="edit_category">
        </div>
    </form>
</body>
</html>