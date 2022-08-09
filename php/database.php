<?php
class Database{

    private $hostname = "localhost";
    private $database = "proyecto";
    private $username = "root";
    private $password = "";

    function conectar(){
        try {
            $conexion ="mysql:host=". $this->hostname . "; dbname=" . $this->database.";";
            $options=[
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES => FALSE
            ];
            $pdo= new PDO($conexion, $this->username, $this->password, $options);
            return $pdo;
        } catch (\Throwable $e) {
            echo 'error de conexion ' . $e->getMessage();
            exit;
        }
    }
}
?>