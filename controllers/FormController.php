<?php

namespace App\Controllers;

use App\DB\Database;

class FormController
{
  private $db;

  public function __construct()
  {
    $this->db = (new Database())->conectar();
  }

  public function save($data)
  {
    $sql = "INSERT INTO usuarios (nombre, correo, telefono) VALUES (:nombre, :correo, :telefono)";
    $stmt = $this->db->prepare($sql);

    $stmt->bindParam(':nombre', $data['nombre']);
    $stmt->bindParam(':correo', $data['correo']);
    $stmt->bindParam(':telefono', $data['telefono']);
    return $stmt->execute();
  }

  public function getAll()
  {
    try {
      $sql = "SELECT * FROM usuarios";
      $stmt = $this->db->query($sql);
      return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    } catch (\Exception $e) {
      return [];
    }
  }
}
