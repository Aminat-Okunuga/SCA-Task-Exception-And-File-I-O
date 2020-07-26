<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 26-Jul-20
 * Time: 4:14 PM
 */

namespace Controller;

use \Library\Database as Database;
class Seller
{

    public static function create(\Entity\Category $category)
    {
        $db = new Database();
        $db->connect();

        $name = strtolower($category->name);
        // Check if category extists
        $db->prepare("SELECT id FROM SELLERS WHERE LOWER(name) = ?");
        $db->result = $db->stmt->bind_param("s", $name);
        $db->excecute();
        $result = $db->stmt->get_result();
        if ($result->num_rows > 0) throw new \Exception("Category already exists");

        $db->prepare("INSERT INTO SELLERS (name) VALUES(?)");
        $db->result = $db->stmt->bind_param("s", $category->name);
        $db->excecute();

        return $db->result;
    }

    public static function getAll()
    {
        $db = new Database();
        $db->connect();

        $categories = $db->selectSeller("SELECT * FROM SELLERS ORDER BY ID DESC");
        return $categories;
    }

    public static function get($category_id)
    {
        $db = new Database();
        $db->connect();

        $db->prepare("SELECT * FROM SELLERS WHERE ID = ?");
        $db->result = $db->stmt->bind_param("i", $category_id);
        $db->excecute();
        $result = $db->stmt->get_result();

        $category = $result->fetch_assoc();

        return $category;
    }

    public static function edit(\Entity\Category $category)
    {
        $db = new Database();
        $db->connect();

        $db->prepare("UPDATE SELLERS SET name = ?, status = ?, date_updated = current_timestamp WHERE ID = ?");
        $db->result = $db->stmt->bind_param("sii", $category->name, $category->status, $category->id);
        $db->excecute();

        return $db->result;
    }

    public static function setCategory($category_id)
    {
        try {
            $db = new Database();
            $db->connect();

            $db->prepare("SELECT * FROM SELLERS WHERE ID = ?");
            $db->result = $db->stmt->bind_param("i", $category_id);
            $db->excecute();
            $result = $db->stmt->get_result();
            $category = $result->fetch_assoc();

            $db->stmt->setId($result['id']);
            $db->stmt->setName($result['name']);

            return true;

        } catch (PDOException $ex) {
            echo $ex->getMessage();
            return false;
        }
    }
}