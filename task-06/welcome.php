<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 21-Jul-20
 * Time: 8:18 AM
 */
session_start();

if (isset($_SESSION['username'])){
    $username = $_SESSION['username'];
}

?>
<h1><?php echo $_SESSION['username'];?></h1>
<a href="index.php"> Back</a>
