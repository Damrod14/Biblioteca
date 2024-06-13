<?php

class Database {

    private $db_url = "mysql://root:ZbVxMUWCajbqYaSSeAXxeVjcRibWrMdO@roundhouse.proxy.rlwy.net:32848/railway";

    function conectar() {
        try {
            $url = parse_url($this->db_url);
            
            $hostname = $url["host"];
            $database = substr($url["path"], 1);
            $username = $url["user"];
            $password = $url["pass"];
            $port = $url["port"];

            $conexion = "mysql:host=" . $hostname . ";port=" . $port . ";dbname=" . $database . ";charset=utf8mb4";
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES => false,
                PDO::ATTR_TIMEOUT => 30 // Tiempo de espera de 30 segundos
            ];

            $pdo = new PDO($conexion, $username, $password, $options);

            return $pdo;
        } catch (PDOException $e) {
            echo 'Error de conexión: ' . $e->getMessage();
            exit;
        }
    }
}

?>
