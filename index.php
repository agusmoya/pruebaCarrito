<?php
include_once('clases/producto.php');
include_once('clases/carrito.php');

$product = new Product();
$cart = new Cart();
if(isset($_GET['action'])){
    switch($_GET['action']){
      case 'add':
          $cart->addItem($db, $_GET['code'], $_GET['amount']);
      break;
      case 'remove':
          $cart->removeItem($_GET['code']);
      break;
    }
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Carrito de compras</title>
  <script type="text/javascript" src="js/functions.js"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
  <div class="container">
    <table class="table table-bordered">
          <thead class="cartHeader">
            <tr class="text-center">
              <th colspan="6">CARRITO DE COMPRAS</th>
            </tr>
            <tr>
              <th colspan="3">Total a pagar: <?= $cart->getTotalPayment() ?></th>
              <th colspan="3">Total items: <?= $cart->getTotalItems() ?></th>
            </tr>
            <tr>
              <th>Codigo</th>
              <th>Producto</th>
              <th>Precio</th>
              <th>Cantidad</th>
              <th>Subtotal</th>
              <th>Opcion</th>
            </tr>
          </thead class="cartBody">
          <tbody>
            <?= $cart->getItems()?>
          </tbody>
    </table>
    <br>
    <br>
    <table class="table table-bordered" cellpadding="5px" width="100%">
          <thead class="productsHeader">
            <tr class="text-center">
              <th colspan="6">LISTA DE PRODUCTOS</th>
            </tr>
              <tr>
                <th>Codigo</th>
                <th>Producto</th>
                <th>Descripcion</th>

                <th>Precio</th>
                <th>Cantidad</th>
                <th>Opcion</th>
              </tr>
          </thead>
          <tbody class="productosBody">
            <?= $product->getProducts($db)?>
          </tbody>
    </table>
  </div>

  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
