<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 15-Jul-20
 * Time: 10:47 AM
 */
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Brand</title>
</head>

<body>v

<form action="process_brand.php" method="post" novalidate>
    <div>
        <label for="name">Name</label>
        <input type="text" name="name" id="name">
    </div>

    <div>
        <label for="category">Category</label>
        <input type="text" name="category" id="category">
    </div>
    <div>
        <input type="submit" value="Create" name="create_brand">
    </div>
</form>

</body>

</html>
