<?php
///**
// * Created by PhpStorm.
// * User: HP
// * Date: 07-Jul-20
// * Time: 3:50 PM
// */

namespace model;
class Database
{
//    Properties
    public $host = "localhost";
    public $username = "root";
    public $password = "";
    public $db = "users";
    public $conn;


    function connectDb(){
        try{

            $this->conn = mysqli_connect($this->host, $this->username, $this->password, $this->db);

            if (!$this->conn){
                throw new \Exception("Oops! Connection Failed!");
            }else{
                return $this->conn;
            }
        }catch (\Exception $ex){
            echo $ex->getMessage();
        }
    }
}
