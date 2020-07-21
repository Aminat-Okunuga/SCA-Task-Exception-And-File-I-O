<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 21-Jul-20
 * Time: 12:08 AM
 */

namespace Entity;
class Users extends Database
{
    public $username;
    public $password;
    public $db;

    public function __construct($username, $password)
    {
        $this->username = $username;
        $this->password = $password;

        $database = new \Entity\Database();
        $this->db = $database->connectDb();
    }

    public function addUser(){
    try{
        $sql = "INSERT INTO user (username, password) VALUES('$this->username', '$this->password')";


        if ($this->db->query($sql) === TRUE) {
            echo "Registration is successful!";
        } else {
            echo "Error: " . $sql . "<br>" . $this->db->error;
        }

    }catch (\Exception $e){
        echo $e->getMessage();
    }
}

    public function getUsername()
    {
        return $this->username;
    }

    public function setUsername($username)
    {
        $this->username = $username;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }
}