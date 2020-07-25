<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 21-Jul-20
 * Time: 12:22 AM
 */

namespace Library;
class Database
{
    public $host = 'localhost';
    public $username = 'root';
    public $password = '';
    public $dbName = 'users';
    public $conn;

//Constructor

    function connectDb()
    {
        try {

            $this->conn = mysqli_connect($this->host, $this->username, $this->password, $this->dbName);

            if (!$this->conn) {
                throw new \Exception("Oops! Connection Failed!");
            } else {
                return $this->conn;
            }
        } catch (\Exception $ex) {
            echo $ex->getMessage();
        }

        $this->conn ->close();
    }

}