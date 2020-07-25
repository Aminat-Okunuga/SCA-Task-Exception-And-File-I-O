<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Product</title>
</head>

<body>

    <form action="process.php" method="post" novalidate enctype="multipart/form-data">
        <div>
            <label for="name">Name</label>
            <input type="text" name="name" id="name">
        </div>
        <div>
            <label for="description">Description</label>
            <textarea name="description" id="description" cols="30" rows="6"></textarea>
        </div>
        <div>
            <label for="price">Price</label>
            <input type="number" name="price" id="price">
        </div>
        <div>
            <label for="brand">Brand</label>
            <input type="text" name="brand" id="brand">
        </div>
        <div>
            <label for="color">Color</label>
            <input type="text" name="color" id="color">
        </div>
        <div>
            <label for="picture">Pictures</label>
            <input type="file" name="picture" id="picture">
        </div>
        <div>
            <label for="seller">Seller</label>
            <input type="text" name="seller" id="seller">
        </div>
        <div>
            <label for="category">Category</label>
            <input type="text" name="category" id="category">
        </div>
        <div>
            <input type="submit" value="Create" name="create_product">
        </div>
    </form>

</body>

</html>