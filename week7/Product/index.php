<?php

include_once 'autoload.php';

// echo 'This is our entry point';

$category_phones = new Entity\Category('Phones & Tablets');
$category_health = new Entity\Category('Health & Beauty');
$category_fashion = new Entity\Category('Fashion');
$category_gaming = new Entity\Category('Gaming');
$category_food = new Entity\Category('Food & Drinks');
$category_computing = new Entity\Category('Computing');

$brand_samsung = new Entity\Brand('Samsung', array($category_phones, $category_fashion, $category_computing));
$brand_apple = new Entity\Brand('Apple', array($category_phones, $category_computing));
$brand_infinix = new Entity\Brand('Infinix', array($category_phones, $category_computing));
$brand_cantu = new Entity\Brand('Cantu', array($category_health));
$brand_st_ives = new Entity\Brand('St Ives', array($category_health));
$brand_amma = new Entity\Brand('Amma', array($category_health));
$brand_dior = new Entity\Brand('St Ives', array($category_fashion));
$brand_gucci = new Entity\Brand('St Ives', array($category_fashion));
$brand_nike = new Entity\Brand('St Ives', array($category_fashion));
$brand_nunu = new Entity\Brand('Nunu', array($category_fashion));
$brand_xbox = new Entity\Brand('XBox', array($category_gaming));
$brand_play_station = new Entity\Brand('Play Station', array($category_food));
$brand_nestle = new Entity\Brand('Nestle', array($category_food));
$brand_cadbury = new Entity\Brand('Cadbury', array($category_food));
$brand_unilever = new Entity\Brand('Unilever', array($category_food));
$brand_dangote = new Entity\Brand('Dangote', array($category_food));
$brand_honeywell = new Entity\Brand('Honeywell', array($category_food));
$brand_indomie = new Entity\Brand('Indomie', array($category_food));
$brand_hp = new Entity\Brand('Hp', array($category_computing));
$brand_lenovo = new Entity\Brand('Lenovo', array($category_computing));
$brand_dell = new Entity\Brand('Dell', array($category_computing));

$seller_aminat = new Entity\Seller('Aminat Store', 90, 'NG', 4006);
$seller_faith = new Entity\Seller('Faith Store', 80, 'GH', 3002);
$seller_amarachukwu = new Entity\Seller('Amarachukwu Store', 89, 'NG', 5000);

$product_samsung_a20 = new Entity\Product('Samsung A20', '16 GB ram, 6.1" Screen and 6000mAh', 60000, $brand_samsung, 'Black', array(), 4.5, $seller_aminat, $category_phones);
