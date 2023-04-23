<?php

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body>
    
    
<?php

require_once 'core/Database.php';
require_once 'app/models/ProductModel.php';

$db = new Database('localhost', 'root', '', 'shopping');
$pdo = $db->connect();

$model = new ProductModel($pdo);

$action = isset($_GET['action']) ? $_GET['action'] : '';

switch ($action) {
  case 'create':
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $name = $_POST['name'];
      $price = $_POST['price'];
      $amount = $_POST['amount'];
      $fullPrice = $price * $amount;
      $model->createProduct($name,$amount, $price,$fullPrice);
      header('Location: index.php');
    } else {
      require 'app/views/create.php';
    }
    break;
  case 'read':
    $result = $model->getProducts();
    require 'app/views/read.php';
    break;
  case 'update':
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $id = $_POST['id'];
      $name = $_POST['name'];
      $price = $_POST['price'];
      $amount = $_POST['amount'];
      $fullPrice = $price * $amount;
      $model->updateProduct($id, $name,$amount, $price,$fullPrice);
      header('Location: index.php');
    } else {
      $id = $_GET['id'];
      $product = $model->getProductById($id);
      require 'app/views/update.php';
    }
    break;
  case 'delete':
    $id = $_GET['id'];
    $model->deleteProduct($id);
    header('Location: index.php');
    break;
  case 'deleteAll':
    $model->deleteList();
    header("Location:index.php");
    break;
  default:
    header('Location: index.php?action=read');
    break;
}
?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>
<?php

?>