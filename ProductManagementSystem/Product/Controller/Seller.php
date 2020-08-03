<?php

namespace Controller;

use \Library\Database;

class Seller {
    public static function create(\Entity\Seller $seller) {
        $db = new Database();
        $db->connect();

        $name = strtolower($seller->name);
        // Check if seller extists
        $db->prepare("SELECT id FROM SELLERS WHERE LOWER(name) = ?");
        $db->result = $db->stmt->bind_param("s", $name);
        $db->excecute();
        $result = $db->stmt->get_result();
        if($result->num_rows > 0) throw new \Exception("Seller already exists");

        $db->prepare("INSERT INTO SELLERS (name, score, country, followers) VALUES(?, ?, ?, ?)");
        $db->result = $db->stmt->bind_param("sisi", $seller->name, $seller->score, $seller->country, $seller->followers);
        $db->excecute();
        
        return $db->result;
    }

    public static function getAll() {
        $db = new Database();
        $db->connect();

        $sellers = $db->select("SELECT * FROM SELLERS ORDER BY ID DESC");
        return $sellers;
    }

    public static function get($seller_id) {
        $db = new Database();
        $db->connect();

        $db->prepare("SELECT * FROM SELLERS WHERE ID = ?");
        $db->result = $db->stmt->bind_param("i", $seller_id);
        $db->excecute();
        $result = $db->stmt->get_result();

        $seller = $result->fetch_assoc();

        return $seller;
    }

    public static function edit(\Entity\Seller $seller) {
        $db = new Database();
        $db->connect();

        $db->prepare("UPDATE SELLERS SET name = ?, status = ?, country = ?, date_updated = current_timestamp WHERE ID = ?");
        $db->result = $db->stmt->bind_param("sisi", $seller->name, $seller->status, $seller->country, $seller->id);
        $db->excecute();
        
        return $db->result;
    }
}