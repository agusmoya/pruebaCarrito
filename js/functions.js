function addProduct(code){
  var amount = document.getElementById(code).value;
  window.location.href = 'index.php?action=add$code='+code+'&amount='+amount;
  console.log('Cant:'+amount,'Cod.:' + code);
}

function deleteProduct(code){
  window.location.href = 'index.php?action=remove$code='+code;
}
