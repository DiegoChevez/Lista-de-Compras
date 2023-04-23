<!DOCTYPE html>
<html>
<head>
  <title>Crear Producto</title>
  <style>
    form {
      margin: 20px;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
      font-family: Arial, sans-serif;
    }
    
    label {
      display: block;
      margin-bottom: 5px;
      font-weight: bold;
    }
    
    input[type="text"], input[type="number"] {
      width: 100%;
      padding: 5px;
      border: 1px solid #ccc;
      border-radius: 3px;
      box-sizing: border-box;
      font-size: 14px;
      margin-bottom: 10px;
    }
    
    button[type="submit"], a {
      background-color: #4CAF50;
      color: white;
      padding: 10px 20px;
      border: none;
      border-radius: 3px;
      cursor: pointer;
      font-size: 16px;
    }
    
    button[type="submit"]:hover {
      background-color: #3e8e41;
    }
    
    a.back {
      display: inline-block;
      margin-top: 20px;
      color: #333;
      text-decoration: none;
      font-size: 14px;
    }
    
    a.back:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>
  <h1>Crear Producto</h1>
  <form method="post" action="index.php?action=create">
    <label for="name">Producto</label>
    <input type="text" id="name" name="name" required>
    <br>
    <label for="price">Precio</label>
    <input type="number" id="price" name="price" required>
    <br>
    <label for="amount">Cantidad</label>
    <input type="number" id="amount" name="amount" required></input>
    <br>
    <button type="submit">Agregar</button>
  </form>
  <a href="index.php" class="back">Atrás</a>
</body>
</html>