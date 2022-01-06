<?php
require_once 'define.php';

class Database
{
    private $serverName = DB_SERVER;
    private $username = DB_USER;
    private $password = DB_PASSWORD;
    private $myDB = DB_NAME;

    public function __construct()
    {
        $pdo = 'mysql:host=' . $this->serverName . ';dbname=' . $this->myDB;
        $options = array(PDO::ATTR_PERSISTENT => true, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);

        try {
            $this->conn = new PDO($pdo, $this->username, $this->password, $options);
        } catch (PDOException $e) {
            $this->error = $e->getMessage();
            echo $this->error;
        }
    }

    public function connectionPdo()
    {
        $this->stmt = $this->conn->connectionPdo();
    }
}
