<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title></title>
  

  <link rel="stylesheet" href="../vendors/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/style.css">  
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
              <h4 class="center">Comisiones</h4>
          </div>
       </div>
       <br>
    <br>
     <div class="row">
         <div class="col">
             <p>Selecciona a la vendedora para ver sus comiciones</p>
         </div>
         <div class="col">
          <select name="seller" class="custom-select" id="seller">
            <option value="">Selecciona una opcion</option>
            <?php foreach($sellers as $row) {?>                                                        
            <option value="<?php echo $row->id_seller?>"><?php echo $row->name ?></option>               
            <?php } ?>
          </select>
         </div>
     </div>
     <hr>
     <br>
     <br>
        <div class="row">
          <div class="col">
            <div id="data"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
 
 
<br>
 <br>  
 <br>
 <br> 
  
<script type="text/javascript" src="../vendors/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script type="text/javascript" src="../vendors/bootstrap/js/bootstrap.min.js"></script>

<script type="text/javascript">
     $("#seller").change(function(){
      document.getElementById('data').innerHTML = '';
      var id=$(this).val();
      $.ajax({
        type:'GET',
        url:"get_commission_seller/"+id,
        success: function(data){          
          //Removemos los option
          $("#data").append('<div class="line"><div class="spacecom">Pedido</div><div class="spacecom">Total</div><div class="spacecom">Comision</div></div> ');             

          $.each(JSON.parse(data), function(i, item) {                                    
            $("#data").append('<br><div class="line"><div class="spacecom">'+item.id_order+'</div><div class="spacecom">'+item.total+'</div><div class="spacecom">'+item.commission+'</div></div>');             
          });
        }
      });
    });
  </script>

</body>
</html>