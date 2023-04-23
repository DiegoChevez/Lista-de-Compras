<?php

class ProductModel {
  private $db;

  public function __construct($db) {
    $this->db = $db;
  }

  public function getProducts() {
    $stmt = $this->db->query("SELECT * FROM list");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function getProductById($id) {
    $stmt = $this->db->prepare("SELECT * FROM list WHERE IdProducto = :id");
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }

  public function createProduct($producto, $amount,$price,$fullPrice) {
    $stmt = $this->db->prepare("INSERT INTO list (NombreProducto, Cantidad, PrecioUnitario, PrecioTotal) VALUES (:name,:amount,:price,:fullprice)");
    $stmt->bindValue(':name', $producto, PDO::PARAM_STR);
    $stmt->bindValue(':amount', $amount, PDO::PARAM_STR);
    $stmt->bindValue(':price', $price, PDO::PARAM_INT);
    $stmt->bindValue(':fullprice', $fullPrice, PDO::PARAM_STR);
    $stmt->execute();
  }

  public function updateProduct($id, $producto,$amount, $price, $fullPrice) {
    $stmt = $this->db->prepare("UPDATE list SET NombreProducto = :name, Cantidad = :amount, PrecioUnitario = :price, PrecioTotal = :fullprice
                                WHERE IdProducto = :id");
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    $stmt->bindValue(':name', $producto, PDO::PARAM_STR);
    $stmt->bindValue(':amount', $amount, PDO::PARAM_STR);
    $stmt->bindValue(':price', $price, PDO::PARAM_INT);
    $stmt->bindValue(':fullprice', $fullPrice, PDO::PARAM_STR);
    $stmt->execute();
  }

  public function deleteProduct($id) {
    $stmt = $this->db->prepare("DELETE FROM list WHERE IdProducto = :id");
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
  }

  public function deleteList() {
    $stmt = $this->db->prepare("DELETE FROM list ");
    $stmt->execute();
  }
}

?>