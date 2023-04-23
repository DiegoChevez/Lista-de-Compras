<style>
  form {
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    font-family: Arial, sans-serif;
    margin: 20px;
  }
  
  label {
    margin-bottom: 5px;
    font-weight: bold;
  }
  
  input[type="text"], textarea {
    padding: 8px;
    margin-bottom: 10px;
    border-radius: 5px;
    border: 1px solid #ccc;
    font-size: 16px;
  }
  
  button[type="submit"] {
    background-color: #007bff;
    color: #fff;
    padding: 8px 16px;
    border-radius: 5px;
    border: none;
    font-size: 16px;
    cursor: pointer;
  }
  
  button[type="submit"]:hover {
    background-color: #0056b3;
  }
</style>

<h1>Edit Product</h1>
<form method="post" action="index.php?action=update">
  <input required type="hidden" name="id" value="<?= $product['IdProducto'] ?>">
  <label for="name">Producto</label>
  <input  required type="text" id="name" name="name" value="<?= $product['NombreProducto'] ?>">
  <br>
  <label for="price">Precio Unitario</label>
  <input required type="text" id="price" name="price" value="<?= $product['PrecioUnitario'] ?>">
  <br>
  <label for="description">Cantidad</label>
  <textarea required id="amount" name="amount"><?= $product['Cantidad'] ?></textarea>
  <br>
  <button type="submit">Actualizar</button>
</form>