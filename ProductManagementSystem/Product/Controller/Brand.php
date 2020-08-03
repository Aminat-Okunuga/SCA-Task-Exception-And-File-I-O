<?php

namespace Controller;

use \Library\Database;

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

        $db->prepare("INSERT INTO BRANDS (name, category_id) VALUES(?, ?)");
        $db->result = $db->stmt->bind_param("si", $brand->name, $brand->category);
        $db->excecute();

        return $db->result;
    }

    public static function getAll()
    {
        $db = new Database();
        $db->connect();

        $brands = $db->select("SELECT BRANDS.*, CATEGORIES.NAME AS category_name FROM BRANDS JOIN CATEGORIES ON CATEGORIES.ID = BRANDS.CATEGORY_ID ORDER BY BRANDS.ID DESC");
        return $brands;
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

        $db->prepare("UPDATE BRANDS SET name = ?, status = ?, category_id = ?, date_updated = current_timestamp WHERE ID = ?");
        $db->result = $db->stmt->bind_param("siii", $brand->name, $brand->status, $brand->category, $brand->id);
        $db->excecute();

        return $db->result;
    }

    //to delete an existing brand
    public static function delete(Brand $brand)
    {
        if (isset($_GET['delete_id'])) {
            if (empty($_GET['delete_id'])) {
                $_SESSION['errorMessage'] = "Your record is still intact";
                header("location: ../View/brand/view.php");
            } else {
                $id = $_GET['delete_id'];

                if ($brand->deleteBrand($id)) {
                    $_SESSION['successMessage'] = "You have successfully deleted this record";
                    header('location:  ../View/brand/view.php');
                } else {
                    $_SESSION['errorMessage'] = "Error occurred Try again.";
                    header('location:  ../View/brand/view.php');
                }

            }
        }
    }

    public function deleteBrand(Brand $brand)
    {
        try {
            $db = new Database();
            $db->connect();

            $db->prepare("DELETE FROM brands WHERE id = ?");
            $db->result = $db->stmt->bind_param("i", $brand->id);
            $db->execute();

            return true;

        } catch (PDOException $ex) {
            echo $ex->getMessage();
            return false;
        }

    }
}