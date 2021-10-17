<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Panel</title>
  

  <link rel="stylesheet" href="vendors/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">  
  <link href="https://fonts.googleapis.com/css?family=Questrial&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  
</head>
<body>

<br>
<br> 

<div class="container-fluid panel ">
  <div class="row">
    <div class="col-md-9 der-first">          
    

      <!-- ALERT -->
        <?php if(isset($alert)){ ?>
        <div class="alert alert-<?php echo $alert['type'] ?> alert-dismissible fade show" role="alert">
        <p><?php echo $alert['msg'] ?></p>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <?php } ?>   
      <!-- ALERT -->
    
      <!-- VALIDATION ERRORS -->
      <?php if(validation_errors()){ ?>
        <div class="alert alert-danger alert-dismissible" role="alert">
          <?php echo validation_errors()  ?>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      <?php } ?>
      <!-- VALIDATION ERRORS -->
    
      <div id="cupones" class="">    
       <div class="row">
          <div class="col">
              <h4 class="center">Ingresar pedido</h4>
          </div>
       </div>
       <br>
        <hr>
      </div>
     <!-- |||||||||||||||||||||||||||||||||||||| -->
      
    </div>
  </div>
</div>
 
      
  <div class="row">
    <div class="col">
      <label for="product">Productos:</label>
      <select name="product" class="custom-select" id="product">
        <option value="">Productos en existencia</option>               
        <?php foreach($products as $rowprod) {?>                                                        
        <option value="<?php echo $rowprod->id_product?>"><?php echo $rowprod->name ?></option>               
        <?php } ?>
      </select>
      <button onclick='getSelect()'>Agregar producto</button> 
      <div id="productSelect"></div>
      <br>
      <form action="<?php echo base_url("order/post_order"); ?>" method="post">
        <label for="seller">Vendedora:</label>
        <select name="seller" class="custom-select" id="seller">
          <option value="">Selecciona una vendedora</option>
          <?php foreach($sellers as $row) {?>                                                        
          <option value="<?php echo $row->id_seller?>"><?php echo $row->name ?></option>               
          <?php } ?>
        </select>
        <input type="hidden" name="idProduct" id="idProduct" value="">
        $<input type="number" name="price" id="price" value="0">
        <button type="submit" class="btn btn-crown">Guardar</button>
      </form>
      
    </div>
  </div>          
  <br>

  <!-- MODAL |||||||||||||||||||||||||||||||||||||| -->
 
 
<br>
 <br>  
 <br>
 <br> 
  
<script type="text/javascript" src="vendors/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script type="text/javascript" src="vendors/bootstrap/js/bootstrap.min.js"></script>

<script type="text/javascript">
function getSelect() {
  var idsOrder = document.getElementById("idProduct").value; //toma los productos agregados anteriormente
  var Order = document.getElementById("productSelect").innerHTML; //toma los productos agregados anteriormente
  var select = document.getElementById("product"); //option 
  value = select.value, //El valor seleccionado
  get_price(value); // Obtener precio del producto para calcular el total
  text = select.options[select.selectedIndex].innerText; //El texto de la opción seleccionada
  idsOrder += value+","
  Order += text+"<br>";
  document.getElementById("productSelect").innerHTML = Order;
  document.getElementById("idProduct").value = idsOrder;
}

function get_price($id){
    var totalOrd = document.getElementById("price").value; //toma los productos agregados anteriormente
    alert(totalOrd);
    var url=$("#url").val();
    $.ajax({
      type:'GET',
      url:"product/product_by_id/"+$id,
      dataType: "json",
      success: function(data){
        alert(data);  
        alert(data.price);  
        totalOrd =  parseInt(totalOrd) +  parseInt(data.price);
        alert(totalOrd);
        $("#price").val(totalOrd);
      }
    });
  }

</script>

</body>
</html>