<?php
include_once('conexion.php');

class Product {
  public $code;
  public $product;
  public $description;
  public $price;

  public function __construct(){}

  public function searchCode($db, $code){
    $query = $db->prepare("SELECT * FROM products WHERE id=$code");
    $query->execute();
    $product = $query->fetch(PDO::FETCH_ASSOC);
    $flag=false;
          foreach ($product as $p) {
              $this->code = $p["id"];
              $this->product = $p["name"];
              $this->description = $p["description"];
              $this->price = $p["price"];
              $flag=true;
          }
    return $flag;
  }

public function getProducts($db){
  $query = $db->prepare("SELECT * FROM products");
  $query->execute();
  $result = $query->fetchAll(PDO::FETCH_ASSOC);
  // echo('<pre>');
  // print_r($result);
  // echo('</pre>');
  $html = '';
  foreach ($result as $product) {
    $code = $product['id'];
    $html.='<tr>
                  <td>'. $product["id"] .'</td>
                  <td>'. $product["name"] .'</td>
                  <td>'. $product["description"] .'</td>
                  <td align="right">'. $product["price"] .'</td>
                  <td align="right">
                  <input type="number" id="'.$code.'" value="1" min="1">
                  </td>
                  <td>
                  <button class="btn btn-primary" onClick="addProduct('.$code.');">Agregar</button>
                  </td>
            </tr>';
  }
  return $html;
}

}

 ?>
