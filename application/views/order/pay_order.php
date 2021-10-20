<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title></title>
  
  <link rel="stylesheet" href="../../vendors/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="../../css/style.css">    
</head>
<body>

<br>
<br> 

<div class="container-fluid prinicipal ">
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
    
      <div id="title" class="">    
       <div class="row">
          <div class="col">
              <h4 class="center">Su pedido es el #<?php echo $order->id_order ?></h4>
          </div>
       </div>
       <br>
        <hr>
      </div>
     <!-- |||||||||||||||||||||||||||||||||||||| -->
      
 
      <div id="title" class="">      
        <div class="row">
          <div class="col">
            <label for="product">Productos en tu pedido:</label>
              <?php foreach($products as $rowprod) {
                if($rowprod->id !=0){?>                                                        
              <div><p><?php echo $rowprod->name ?>    $ <?php echo $rowprod->price ?></p></div>              
              <?php }} ?>
            <br>
            <form action="../../order/post_payment" method="post">
              <input type="hidden" name="id_order" id="id_order" class="form-control" value="<?php echo $order->id_order ?>">
              <label for="email">Correo electronico:</label>
              <input type="text" name="email" id="email" class="form-control" value="">
              <label for="address">Direccion:</label>
              <input type="text" name="address" id="address" class="form-control" value="">
              <label for="city">Ciudad:</label>
              <input type="text" name="city" id="city" class="form-control" value="">
              <label for="state">Estado:</label>
              <select name="state" class="custom-select" id="state" onchange= 'get_envio()'>
                <option value="">Selecciona una opcion</option>
                <option value="Aguascalientes">Aguascalientes</option>               
                <option value="Baja California">Baja California</option>               
                <option value="Campeche">Campeche</option>               
                <option value="Chiapas">Chiapas</option>               
                <option value="Colima">Colima</option>               
                <option value="CDMX">Ciudad de México</option>               
                <option value="Durango">Durango</option>               
                <option value="Guanajuato">Guanajuato</option>               
                <option value="Hidalgo">Hidalgo</option>               
                <option value="Jalisco">Jalisco</option>               
                <option value="Michoacán">Michoacán</option>               
                <option value="Nayarit">Nayarit</option>               
                <option value="Nuevo León">Nuevo León</option>               
                <option value="Oaxaca">Oaxaca</option>               
                <option value="Puebla">Puebla</option>               
                <option value="Querétaro">Querétaro</option>               
                <option value="Quintana Roo">Quintana Roo</option>               
                <option value="San Luis Potosí">San Luis Potosí</option>               
                <option value="Sinaloa">Sinaloa</option>               
                <option value="Tamaulipas">Tamaulipas</option>               
                <option value="Veracruz">Veracruz</option>               
                <option value="Yucatán">Yucatán</option>               
                <option value="Zacatecas">Zacatecas</option>               
              </select>
              <label for="card">Tarjeta de credito:</label>
              <input type="number" name="card" id="card" class="form-control" value="">

              <label for="subtotal">Total de Venta:</label>
              $<input type="number" name="subtotal" id="subtotal" class="form-control" value="<?php echo $order->total ?>">
              <label for="shipping">Costo de envio:</label>
              $<input type="number" name="shipping" id="shipping" class="form-control" value="0">
              <label for="total">Total a pagar:</label>
              $<input type="number" name="total" id="total" class="form-control" value="0">
              <br><br>
              <?php if ($order ->status == 0){?> 
              <button type="submit" class="btn btn-send">Guardar</button>
              <?php }else{ ?> <label for="product">Este pedido ya esta pagado</label> <?php } ?>
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
<script type="text/javascript" src="../../vendors/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script type="text/javascript" src="../../vendors/bootstrap/js/bootstrap.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript">
function get_envio() {
  var select = document.getElementById("state"); //option state
  var shipping = 0;
  var total_pago = document.getElementById("subtotal").value;
  value = select.value, //El valor seleccionado
  text = select.options[select.selectedIndex].innerText; //El texto de la opción seleccionada

  const statesJal = ['Durango', 'Zacatecas', 'Aguascalientes','Guanajuato', 'San Luis Potosí', 'Michoacán', 'Colima', 'Jalisco' ];
 if(statesJal.includes(text)){ shipping = 100; }
 else{ shipping = 300; }
  total_pago =  parseInt(total_pago) +  parseInt(shipping);
  $("#shipping").val(shipping);
  $("#total").val(total_pago);
}



</script>
</body>
</html>