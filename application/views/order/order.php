<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title></title>
  

  <link rel="stylesheet" href="vendors/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">    
</head>
<body>

<br>
<br> 

<div class="container-fluid principal ">
  <div class="row">
    <div class="col-md-9 der-first">          
    

      <!-- ALERT -->
        <?php if(isset($alert)){ ?>
        <div class="alert alert-<?php echo $alert['type'] ?> alert-dismissible fade show" role="alert">
        <p><?php echo $alert['msg'] ?></p>
        <p> La liga para el pago es la siguiente <a href="<?php echo $alert['data'] ?>"><?php echo $alert['data'] ?></a></p>
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
    
      <div id="title" class="">    
       <div class="row">
          <div class="col">
              <h4 class="center">Ingresar pedido</h4>
          </div>
       </div>
       <br>
        <hr>
      </div>
     <!-- |||||||||||||||||||||||||||||||||||||| -->
      
 
      <div id="title" class="">      
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
            <form action="order/post_order" method="post">
              <label for="seller">Vendedora:</label>
              <select name="seller" class="custom-select" id="seller">
                <option value="">Selecciona una vendedora</option>
                <?php foreach($sellers as $row) {?>                                                        
                <option value="<?php echo $row->id_seller?>"><?php echo $row->name ?></option>               
                <?php } ?>
              </select>
              <input type="hidden" name="idProduct" id="idProduct" value="">
              <label for="seller">Total de Venta:</label>
              $<input type="number" name="price" id="price" class="form-control" value="0">
              <input type="hidden" name="base" id="base" value="<?php echo base_url();?>">
              <button type="submit" class="btn btn-crown">Guardar</button>
            </form>
            
          </div>
        </div>          
      </div>          
    </div>
  </div>
  <br>

</div>
<br>
 <br>  
 <br>
 <br> 
  
<script type="text/javascript" src="vendors/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script type="text/javascript" src="vendors/bootstrap/js/bootstrap.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script type="text/javascript">
function getSelect() {
  var idsOrder = document.getElementById("idProduct").value; //toma los productos agregados anteriormente
  var Order = document.getElementById("productSelect").innerHTML; //toma los productos agregados anteriormente
  var select = document.getElementById("product"); //option 
  value = select.value, //El valor seleccionado
  get_price(value); // Obtener precio del producto para calcular el total
  text = select.options[select.selectedIndex].innerText; //El texto de la opción seleccionada
  idsOrder += ","+value
  Order += text+"<br>";
  document.getElementById("productSelect").innerHTML = Order;
  document.getElementById("idProduct").value = idsOrder;
}

function get_price($id){
    var totalOrd = document.getElementById("price").value; //toma los productos agregados anteriormente
    var url=$("#url").val();
    $.ajax({
      type:'GET',
      url:"product/product_by_id/"+$id,
      dataType: "json",
      success: function(data){
        totalOrd =  parseInt(totalOrd) +  parseInt(data.price);
        $("#price").val(totalOrd);
      }
    });
  }

</script>

</body>
</html>