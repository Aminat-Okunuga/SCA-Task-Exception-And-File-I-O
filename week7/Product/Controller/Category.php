<?php

namespace Controller;

use \Library\Database;

class Category {
    public static function create(\Entity\Category $category) {
        $db = new Database();
        $db->connect();

        $name = strtolower($category->name);
        // Check if category extists
        $db->prepare("SELECT id FROM CATEGORIES WHERE LOWER(name) = ?");
        $db->result = $db->stmt->bind_param("s", $name);
        $db->excecute();
        $result = $db->stmt->get_result();
        if($result->num_rows > 0) throw new \Exception("Category already exists");

        $db->prepare("INSERT INTO CATEGORIES (name) VALUES(?)");
        $db->result = $db->stmt->bind_param("s", $category->name);
        $db->excecute();
        
        return $db->result;
    }

    public static function getAll() {
        $db = new Database();
        $db->connect();

        $categories = $db->select("SELECT * FROM CATEGORIES ORDER BY ID DESC");
        return $categories;
    }

    public static function get($category_id) {
        $db = new Database();
        $db->connect();

        $db->prepare("SELECT * FROM CATEGORIES WHERE ID = ?");
        $db->result = $db->stmt->bind_param("i", $category_id);
        $db->excecute();
        $result = $db->stmt->get_result();

        $category = $result->fetch_assoc();

        return $category;
    }

    public static function edit(\Entity\Category $category) {
        $db = new Database();
        $db->connect();

        $db->prepare("UPDATE CATEGORIES SET name = ?, status = ?, date_updated = current_timestamp WHERE ID = ?");
        $db->result = $db->stmt->bind_param("sii", $category->name, $category->status, $category->id);
        $db->excecute();
        
        return $db->result;
    }
}