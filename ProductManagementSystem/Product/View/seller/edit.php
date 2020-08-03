<?php

include_once '../../autoload.php';

use \Library\Form as Form;
use \Library\Validator as Validator;

try {

    $seller_id = isset($_GET['seller_id']) ? Form::sanitise($_GET['seller_id']) : null;
    $sellerError = Validator::validateNumber('Seller', $seller_id);
    if ($sellerError != null) {
        throw new \Exception($sellerError);
    }

    $seller = Controller\Seller::get($seller_id);
    if($seller == null) {
        throw new \Exception("Seller does not exist");
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
    <title>Edit Seller</title>
</head>
<body>
    <form action="process_edit.php" method="post" novalidate>
        <div>
            <label for="name">Name</label>
            <input type="text" name="name" id="name" value="<?= $seller['name']?>">
        </div>
        <div>
            <label for="country">Country</label>
            <select name="country" id="country">
                <option value="">Select a country</option>
                <option <?= $seller['country'] == 'Nigeria' ? 'selected' : '' ?> value="Nigeria">Nigeria</option>
                <option <?= $seller['country'] == 'Ghana' ? 'selected' : '' ?> value="Ghana">Ghana</option>
                <option <?= $seller['country'] == 'Malawi' ? 'selected' : '' ?> value="Malawi">Malawi</option>
                <option <?= $seller['country'] == 'South Africa' ? 'selected' : '' ?> value="South Africa">South Africa</option>
                <option <?= $seller['country'] == 'China' ? 'selected' : '' ?> value="China">China</option>
                <option <?= $seller['country'] == 'India' ? 'selected' : '' ?> value="India">India</option>
                <option <?= $seller['country'] == 'Kenya' ? 'selected' : '' ?> value="Kenya">Kenya</option>
            </select>
        </div>
        <div>
            <label for="status">Status</label>
            <select name="status" id="status">
                <option value="">Select a status</option>
                <option <?= $seller['status'] == 1 ? 'selected' : '' ?> value="1">Active</option>
                <option <?= $seller['status'] == 2 ? 'selected' : '' ?> value="2">Inactive</option>
            </select>
        </div>
        <input type="hidden" name="seller_id" id="seller_id" value="<?= $seller_id ?>">
        <div>
            <input type="submit" value="Edit" name="edit_seller">
        </div>
    </form>
</body>
</html>