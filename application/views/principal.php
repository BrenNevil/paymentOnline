<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title></title>
  

  <link rel="stylesheet" href="vendors/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">  
  <link href="https://fonts.googleapis.com/css?family=Questrial&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  
</head>
<body>

<br>
<br> 

<div class="container-fluid principal ">
  <div class="row">
    <div class="col-md-9 der-first">          
    
      <div id="title" class="">    
       <div class="row">
          <div class="col">
              <h4 class="center"></h4>
          </div>
       </div>
       <br>
     <div class="row">
         <div class="col">
             <p>Acciones:</p>
         </div>
     </div>
     <hr>
     <br>
     <br>
        <div class="row">
          <div class="col">
            <button onclick="location.href='<?php echo base_url();?>seller'" class="iniciobtn">Vendedoras</button>
            <br> <br>
            <button onclick="location.href='<?php echo base_url();?>order'" class="iniciobtn">Registro de pedido</button>
            <br> <br>
            <button onclick="location.href='<?php echo base_url();?>seller/commissions'" class="iniciobtn">Comisiones</button>
            <br> <br>
            <button onclick="location.href='<?php echo base_url();?>order/bitacora'" class="iniciobtn">Bitacora de pagos</button>
          </div>
        </div>
      </div>
     <!-- |||||||||||||||||||||||||||||||||||||| -->
      
    </div>
  </div>
</div>
 

 
<br>
 <br>  
 <br>
 <br> 
  
<script type="text/javascript" src="vendors/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script type="text/javascript" src="vendors/bootstrap/js/bootstrap.min.js"></script>

</body>
</html>