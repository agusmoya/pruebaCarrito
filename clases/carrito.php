<?php
class Cart extends Product {
  public $productsCart = array();

  public function __construct(){
    parent::__construct();
    if (isset($_SESSION['cart'])) {
      $this->productsCart = $_SESSION['cart'];
    }
    echo 'alto carrito';
  }

  public function addItem($db, $code, $amount){
    $search = $this->searchCode($db, $code);
    $item = array();
    if ($search) {
      $item = array(
        'code' => $this->code,
        'name' => $this->product,
        'price' => $this->price,
        'amount' => $amount
      );

      if (!empty($this->productsCart)) {
        foreach ($this->productsCart as $p) {
          if ($p['code'] == $code) {
            $item['amount'] = $item['amount'] + $p['amount'];
          }
        }
      }
      $item['subtotal'] = $item['amount'] * $item['price'];
      $id = md5($code);
      $_SESSION['cart'][$id] = $item;
      $this->update_cart();
      var_dump("estoy en addItem");
      echo "string";
    }
    var_dump("estoy en addItem");

  }

  public function update_cart(){
    self::__construct();
  }

  public function removeItem($code){
    $id=md5($code);
    unset($_SESSION['cart'][$id]);
    $this->update_cart();
    return true;
  }


  public function getItems(){
    $html='';
    var_dump($this->productsCart);
    if (!empty($this->productsCart)) {
      foreach ($this->productsCart as $prod) {
        $code = $prod['code'];
        $html.='<tr>
                    <td>'.$prod['code'].'</td>
                    <td>'.$prod['name'].'</td>
                    <td align="right">'.$prod['price'].'</td>
                    <td align="right">'.$prod['amount'].'</td>
                    <td align="right">'.$prod['subtotal'].'</td>
                    <td><button onClick="deleteProduct('.$code.')">Eliminar</button></td>
               </tr>';
      }
    }
    return $html;
  }

  public function getTotalItems(){
    $nroItems = 0;
    if(!empty($this->productsCart)){
      foreach ($this->productsCart as $p) {
        $nroItems += $nroItems + $p['amount'];
      }
    }
  }

  public function getTotalPayment(){
    $total = 0;
    if (!empty($this->productsCart)) {
      foreach ($this->productsCart as $p) {
        $total += $p['price'];
      }
    }
    return $total;
  }

}

?>
