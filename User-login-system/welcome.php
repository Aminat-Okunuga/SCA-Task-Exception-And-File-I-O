<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 08-Jul-20
 * Time: 12:06 AM
 */
session_start();

echo "<h2>".$_SESSION['username']."</h2>";