<?php

include_once '../../autoload.php';

use \Library\Form as Form;
use \Library\Validator as Validator;

try {

    $product_id = isset($_GET['product_id']) ? Form::sanitise($_GET['product_id']) : null;
    $productError = Validator::validateNumber('product', $product_id);
    if ($productError != null) {
        throw new \Exception($productError);
    }

    $product = Controller\product::get($product_id);
    if($product == null) {
        throw new \Exception("Product does not exist");
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
    <title>Edit Product</title>
</head>
<body>
<form action="process_edit.php" method="post" novalidate>
    <div>
        <label for="name">Name</label>
        <input type="text" name="name" id="name" value="<?= $product['name']?>">
    </div>
    <div>
        <label for="status">Status</label>
        <select name="status" id="status">
            <option value="">Select a status</option>
            <option <?= $product['status'] == 1 ? 'selected' : '' ?> value="1">Active</option>
            <option <?= $product['status'] == 2 ? 'selected' : '' ?> value="2">Inactive</option>
        </select>
    </div>
    <input type="hidden" name="product_id" id="product_id" value="<?= $product_id ?>">
    <div>
        <input type="submit" value="Edit" name="edit_product">
    </div>
</form>
</body>
</html>