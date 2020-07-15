<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 15-Jul-20
 * Time: 11:01 AM
 */
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Category</title>
</head>

<body>v

<form action="process_category.php" method="post" novalidate>
    <div>
        <label for="name">Name</label>
        <input type="text" name="name" id="name">
    </div>

    <div>
        <input type="submit" value="Create" name="create_category">
    </div>
</form>

</body>

</html>

