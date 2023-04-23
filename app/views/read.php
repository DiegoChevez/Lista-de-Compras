<h1>Products</h1>
<a href="index.php?action=deleteAll">Limpiar Lista</a>
<table class="table">
  <thead>
    <tr>
      <th>ID</th>
      <th>Producto</th>
      <th>PrecioUnitario</th>
      <th>Cantidad</th>
      <th>Precio Total</th>
      
      <th>Acciones</th>
    </tr>
  </thead>
  <tbody>
    <?php 
    $total_price = 0;
    foreach ($result as $row): ?>
    <tr>
      <td><?= $row['IdProducto'] ?></td>
      <td><?= $row['NombreProducto'] ?></td>
      <td><?= $row['PrecioUnitario'] ?></td>
      <td><?= $row['Cantidad'] ?></td>
      <td><?= $row['PrecioTotal'] ?></td>
      <td>
        <a href="index.php?action=update&id=<?= $row['IdProducto'] ?>">Edit</a>
        <a href="index.php?action=delete&id=<?= $row['IdProducto'] ?>" onclick="return confirm('Are you sure?')">Delete</a>
      </td>
    </tr>
    
    <?php 
    $total_price = $row['PrecioTotal'] + $total_price;
    endforeach ?>
  </tbody>
  <tfoot>
    <tr>
      <td colspan="4">Total</td>
      <td><?php echo $total_price;?> </td>
    </tr>
</table>
<a href="index.php?action=create">Create New Product</a>