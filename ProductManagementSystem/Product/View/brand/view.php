<?php

include_once '../../autoload.php';

$brands = array();
$error = false;

try {
    if (isset($_GET['delete_id'])) {
        if (empty($_GET['delete_id'])) {
            $_SESSION['errorMessage'] = "Your record is still intact";
            header("location: ../View/brand/view.php");
        } else {
            $id = $_GET['delete_id'];

            $brand = Controller\Brand::delete();
            if ($brand->deleteBrand($id)) {
                $_SESSION['successMessage'] = "You have successfully deleted this record";
                header('location:  ../View/brand/view.php');
            } else {
                $_SESSION['errorMessage'] = "Error occurred Try again.";
                header('location:  ../View/brand/view.php');
            }

        }
    }

    $brands = Controller\Brand::getAll();
} catch (\Exception $e) {
    $error = $e->getMessage();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Brands</title>
</head>
<body>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Category</th>
                <th>Status</th>
                <th>Date</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($brands as $brand): ?>
                <tr>
                    <td><?= $brand['id']?></td>
                    <td><?= $brand['name']?></td>
                    <td><?= $brand['category_name']?></td>
                    <td><?= $brand['status']?></td>
                    <td><?= $brand['date_created']?></td>
                    <td><a href="edit.php?brand_id=<?= $brand['id']?>"><button>Edit</button></a></td>
                    <td><a href="../../Controller/Brand.php?brand_id=<?= $brand['id']?>" onclick="return ConfirmDelete();"><button>Delete</button></a></td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
    <script type="text/javascript">
        function ConfirmDelete(){
            var del = confirm('Are you sure you want to delete this?');
            if (del == true) {
                return true;
            }
            else{
                return false;
            }
        }
    </script>

</body>
</html>