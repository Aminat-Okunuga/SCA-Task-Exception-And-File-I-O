<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 07-Jul-20
 * Time: 3:50 PM
 */
namespace model;
class Database
{
public $host = "localhost";
public $username = "root";
public $password = "";
public $db = "users";

public $connection;

public function __construct($host, $username, $password, $db, $connection)
{
    $this->username = $username;
    $this->password = $password;
    $this->host = $host;
    $this->db = $db;

}

public function connectDB(){
    try {
       $connection = mysqli_connect($this->host, $this->username, $this->password, $this->db);
        if (!$connection){
            die("Connection Failed!");
        }
        return $connection;

    }catch (Exception $ex){
        echo $ex->getMessage();
    }
}
}