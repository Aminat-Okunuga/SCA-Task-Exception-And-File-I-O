<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 07-Jul-20
 * Time: 3:05 PM
 */
session_start();
if (isset($_POST['username'])) {
    echo "Welcome ".$_SESSION['username'];
}