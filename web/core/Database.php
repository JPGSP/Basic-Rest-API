<?php

include 'config.php';

class Database
{
    private $conn;

    /**
     * ConnectionDB constructor.
     */
    public function __construct() {
        try{
            $connection = sprintf("mysql:host=%s;dbname=%s", DB_HOST, DB_NAME, DB_USER, DB_PWD);
            $this->conn = new PDO($connection, DB_USER, DB_PWD);
            $this->conn->exec("set names utf8");
        }catch(PDOException $exception){
            echo "Connection error: " . $exception->getMessage();
        }

        return $this->conn;
    }

    /**
     * @param $query
     *
     * @return array
     */
    public function get($query):array {
        $databaseResult = $this->conn->query($query);
        while($resultToReturn[] = $databaseResult->fetch());
        $databaseResult->close();

        return $resultToReturn;
    }

    /**
     * @param $query
     */
    public function set($query) {
        $this->conn->query($query);
    }
}
