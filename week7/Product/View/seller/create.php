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
                <option value="2">Nigeria</option>
                <option value="4">Ghana</option>
                <option value="5">Malawi</option>
                <option value="6">South Africa</option>
                <option value="7">China</option>
                <option value="8">India</option>
                <option value="9">Kenya</option>
            </select>
        </div>
        <div>
            <label for="color">Score</label>
            <input type="number" name="score" id="score">
        </div>
        <div>
            <label for="follower">Followers</label>
            <input type="text" name="follower" id="follower">
        </div>
        <div>
            <input type="submit" value="Create" name="create_seller">
        </div>
    </form>
</body>
</html>