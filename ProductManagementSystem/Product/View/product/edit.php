<?php
include_once '../../autoload.php';
use \Library\Form as Form;
use \Library\Validator as Validator;

try {
    $categories = array();
    $product_id = isset($_GET['product_id']) ? Form::sanitise($_GET['product_id']) : null;
    $productError = Validator::validateNumber('Product', $product_id);
    if ($productError != null) {
        throw new \Exception($productError);
    }

    $product = Controller\Product::get($product_id);
    if($product == null) {
        throw new \Exception("Product does not exist");
    }
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
    <title>Create Product</title>
</head>

<body>

<form action="process_edit.php" method="post" novalidate enctype="multipart/form-data">
    <div>
        <label for="name">Name</label>
        <input type="text" name="name" value="<?= $product['name'];?>" id="name">
    </div>
    <div>
        <label for="description">Description</label>
        <textarea name="description" id="description" cols="30" rows="6"></textarea>
    </div>
    <div>
        <label for="price">Price</label>
        <input type="number" name="price" value="<?= $product['price'];?>" id="price">
    </div>
    <div>
        <label for="brand">Brand</label>
        <input type="text" name="brand" value="<?= $product['brand_id'];?>" id="brand">
    </div>
    <div>
        <label for="color">Color</label>
        <input type="text" name="color" value="<?= $product['color'];?>" id="color">
    </div>
    <div>
        <label for="picture">Pictures</label>
        <input type="file" name="picture" value="<?= $product['picture'];?>" id="picture">
    </div>
    <div>
        <label for="seller">Seller</label>
        <input type="text" name="seller" value="<?= $product['seller_id'];?>" id="seller">
    </div>
    <div>
        <label for="category">Category</label>
        <select name="category" id="">
            <option value="">Select Category</option>

            <?php foreach ($categories as $category): ?>
                <option <?= $product['category_id'] == $category['id'] ? 'selected' : '' ?> value="<?php echo $category['id']; ?>">
                    <?php echo $product['name']; ?></option>
            <?php endforeach ?>
        </select>
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