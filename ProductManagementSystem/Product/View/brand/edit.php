<?php

include_once '../../autoload.php';

use \Library\Form as Form;
use \Library\Validator as Validator;

try {
    $categories = array();
    $brand_id = isset($_GET['brand_id']) ? Form::sanitise($_GET['brand_id']) : null;
    $brandError = Validator::validateNumber('Brand', $brand_id);
    if ($brandError != null) {
        throw new \Exception($brandError);
    }

    $brand = Controller\Brand::get($brand_id);
    if($brand == null) {
        throw new \Exception("Brand does not exist");
    }
    $categories = Controller\Category::getAll();

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
    <title>Edit Brand</title>
</head>
<body>
    <form action="process_edit.php" method="post" novalidate>
        <div>
            <label for="name">Name</label>
            <input type="text" name="name" id="name" value="<?= $brand['name']?>">
        </div>
        <div>
            <label for="category">Category</label>
            <select name="category" id="">
                <option value="">Select Category</option>

                <?php foreach ($categories as $category): ?>
                    <option <?= $brand['category_id'] == $category['id'] ? 'selected' : '' ?> value="<?php echo $category['id']; ?>">
                        <?php echo $category['name']; ?></option>
                <?php endforeach ?>
            </select>
        </div>
        <div>
            <label for="status">Status</label>
            <select name="status" id="status">
                <option value="">Select a status</option>
                <option <?= $brand['status'] == 1 ? 'selected' : '' ?> value="1">Active</option>
                <option <?= $brand['status'] == 2 ? 'selected' : '' ?> value="2">Inactive</option>
            </select>
        </div>
        <input type="hidden" name="brand_id" id="brand_id" value="<?= $brand_id ?>">
        <div>
            <input type="submit" value="Edit" name="edit_brand">
        </div>
    </form>
</body>
</html>