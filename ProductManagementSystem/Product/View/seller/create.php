<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Seller</title>
</head>
<body>
    <form action="process.php" method="post" novalidate>
        <div>
            <label for="name">Name</label>
            <input type="text" name="name" id="name">
        </div>

        <div>
            <label for="country">Country</label>
            <select name="country" id="country">
                <option value="">Select a country</option>
                <option value="Nigeria">Nigeria</option>
                <option value="Ghana">Ghana</option>
                <option value="Malawi">Malawi</option>
                <option value="South Africa">South Africa</option>
                <option value="China">China</option>
                <option value="India">India</option>
                <option value="Kenya">Kenya</option>
            </select>
        </div>
        <div>
            <input type="submit" value="Create" name="create_seller">
        </div>
    </form>
</body>
</html>