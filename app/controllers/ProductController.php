<?php

class ProductController {
  private $model;

  public function __construct($model) {
    $this->model = $model;
  }

  public function read() {
    $result = $this->model->getProducts();
    include '../views/read.php';
  }

  public function create() {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $name = $_POST['name'];
      $price = $_POST['price'];
      $amount = $_POST['amount'];
      $fullPrice = $amount * $price;
      echo $name . $price . $amount . $fullPrice;
      //$this->model->createProduct($name,$amount, $price,$fullPrice);
      //header("Location: index.php");
    } else {
      include '../views/create.php';
    }
  }

  public function update() {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $id = $_POST['id'];
      $name = $_POST['name'];
      $price = $_POST['price'];
      $amount = $_POST['amount'];
      $fullPrice = $amount * $price;
      $this->model->updateProduct($id, $name, $price, $amount,$fullPrice);
      header("Location: index.php");
    } else {
      $id = $_GET['id'];
      $product = $this->model->getProductById($id);
      include '../views/update.php';
    }
  }

  public function delete() {
    $id = $_GET['id'];
    $this->model->deleteProduct($id);
    header("Location: index.php");
  }

  public function deleteAll(){
    $this->model->deleteAll();
    header(("Location: index.php"));
  }

}