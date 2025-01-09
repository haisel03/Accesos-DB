<?php
  
  namespace App\db;
  Use PDO;
  use PDOException;

  class DataBase {
    private $hosting = "localhost";
    private $db_name = "accesos_db";
    private $username = "root";
    private $password = "";
    private $conexion;


    public function conectar(){
      try {
        $this->conexion = new PDO("mysql:host={$this->hosting};dbname={$this->db_name}",$this->username, $this->password);
        $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      } catch (PDOException $e) {
        echo "Error de conexión: " . $e->getMessage();
      }
    
      return $this->conexion;
    }
  }