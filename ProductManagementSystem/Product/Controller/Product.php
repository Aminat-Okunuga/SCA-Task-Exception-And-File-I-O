<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 29-Jul-20
 * Time: 9:20 PM
 */

namespace Controller;

use Library\Database as Database;
class Product
{
    public static function create(\Entity\Product $product) {
        $db = new Database();
        $db->connect();

        $name = strtolower($product->name);
        // Check if category extists
        $db->prepare("SELECT id FROM PRODUCTS WHERE LOWER(name) = ?");
        $db->result = $db->stmt->bind_param("s", $name);
        $db->excecute();
        $result = $db->stmt->get_result();
        if($result->num_rows > 0) throw new \Exception("Product already exists");

        $db->prepare("INSERT INTO PRODUCTS (name) VALUES(?)");
        $db->result = $db->stmt->bind_param("s", $product->name);
        $db->excecute();

        return $db->result;
    }

    public static function getAll() {
        $db = new Database();
        $db->connect();

        $products = $db->select("SELECT * FROM PRODUCTS ORDER BY ID DESC");
        return $products;
    }

    public static function get($product_id) {
        $db = new Database();
        $db->connect();

        $db->prepare("SELECT * FROM PRODUCTS WHERE ID = ?");
        $db->result = $db->stmt->bind_param("i", $product_id);
        $db->excecute();
        $result = $db->stmt->get_result();

        $product = $result->fetch_assoc();

        return $product;
    }

    public static function edit(\Entity\Product $product) {
        $db = new Database();
        $db->connect();

        $db->prepare("UPDATE PRODUCTS SET name = ?, status = ?, date_updated = current_timestamp WHERE ID = ?");
        $db->result = $db->stmt->bind_param("sii", $product->name, $product->status, $product->id);
        $db->excecute();

        return $db->result;
    }

}