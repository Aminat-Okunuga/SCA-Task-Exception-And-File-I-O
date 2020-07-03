<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 14-Jun-20
 * Time: 8:03 AM
 */

$i = 8;
echo "step 1: <br/>";
echo "(--$i % 6 * $i + 8 - ++$i / 2) <br/>";
echo "step 2: <br/>";
echo "(--$i % 6) * $i + 8 - (++$i / 2)<br/>";

echo "step 3: <br/>";
echo "(7 % 6) * $i + 8 - (9 / 2) <br/>";

echo "step 4: <br/>";
echo "1 * $i + 8 - 1 <br/>";

echo "step 5: <br/>";
echo "(1 * $i) + 8 - 1 <br/>";

echo "step 6: <br/>";
echo "(1 * 8) + 8 - 1 <br/>";

echo "step 7: <br/>";
echo "8 + 8 - 1 <br/>";

echo "step 8: <br/>";
echo "(8 + 8) - 1 <br/>";

echo "step 9: <br/>";
echo "16 - 1 <br/>";

echo "step 10:  <br/>";
echo 15;