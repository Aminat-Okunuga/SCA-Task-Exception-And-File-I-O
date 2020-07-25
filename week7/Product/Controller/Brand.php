<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 25-Jul-20
 * Time: 9:32 PM
 */

namespace Controller;


class Brand
{
    public static function create(\Entity\Brand $brand)
    {
        $db = new Database();
        $db->connect();

        $name = strtolower($brand->name);
        // Check if brand extists
        $db->prepare("SELECT id FROM BRANDS WHERE LOWER(name) = ?");
        $db->result = $db->stmt->bind_param("s", $name);
        $db->excecute();
        $result = $db->stmt->get_result();
        if ($result->num_rows > 0) throw new \Exception("Brand already exists");

        $db->prepare("INSERT INTO BRANDS (name) VALUES(?)");
        $db->result = $db->stmt->bind_param("s", $brand->name);
        $db->excecute();

        return $db->result;
    }

    public static function getAll()
    {
        $db = new Database();
        $db->connect();

        $brand = $db->select("SELECT * FROM BRANDS ORDER BY ID DESC");
        return $brand;
    }

    public static function get($brand_id)
    {
        $db = new Database();
        $db->connect();

        $db->prepare("SELECT * FROM BRANDS WHERE ID = ?");
        $db->result = $db->stmt->bind_param("i", $brand_id);
        $db->excecute();
        $result = $db->stmt->get_result();

        $brand = $result->fetch_assoc();

        return $brand;
    }

    public static function edit(\Entity\Brand $brand)
    {
        $db = new Database();
        $db->connect();

        $db->prepare("UPDATE BRANDS SET name = ?, status = ?, date_updated = current_timestamp WHERE ID = ?");
        $db->result = $db->stmt->bind_param("sii", $brand->name, $brand->status, $brand->id);
        $db->excecute();

        return $db->result;
    }
}