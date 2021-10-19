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
              <h4 class="center">Bitacora</h4>
          </div>
       </div>
       <br>
    <br>
     <div class="row">
         <div class="col">
             <p>Selecciona el id del pedido</p>
         </div>
         <div class="col">
          <select name="order" class="custom-select" id="order">
            <option value="">Selecciona una opcion</option>
            <?php foreach($order as $row) {?>                                                        
            <option value="<?php echo $row->id_order?>"><?php echo $row->id_order ?></option>               
            <?php } ?>
          </select>
         </div>
     </div>
     <hr>
     <br>
     <br>
        <div class="row">
          <div class="col">
            <div id="data">

            <?php foreach($payment as $row) {?>                                                        
                <br>
                <div class="line">
                    <div class="spacecom"><?php echo $row->id_order ?></div>
                    <div class="spacecom" style="width: 300px;"><?php echo $row->email ?></div>
                    <div class="spacecom"><?php if($row->status == 1) { echo 'Completo';} else {echo 'Fallido';} ?></div>
                    <div class="spacecom" style="width: 150px;"><?php echo date("d-m-Y", strtotime($row->date)); ?></div>
                  </div>               
            <?php } ?>
            </div>
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
     $("#order").change(function(){
      document.getElementById('data').innerHTML = '';
      var id=$(this).val();
      $.ajax({
        type:'GET',
        url:"get_payment_by_id/"+id,
        success: function(data){          
          //Removemos los option
          $("#data").append('<div class="line"><div class="spacecom">Pedido</div><div class="spacecom" style="width: 300px;" >Contacto</div><div class="spacecom">Status</div><div class="spacecom" style="width: 150px;">fecha</div></div>');             

          $.each(JSON.parse(data), function(i, item) {    
           date = new Date(item.date); 
           var status =''   
           if(item.status==1){ status ='Completo';}else{ status='Fallido';}                           
            $("#data").append('<br><div class="line"><div class="spacecom">'+item.id_order+'</div><div class="spacecom" style="width: 300px;">'+item.email+'</div><div class="spacecom">'+status+'</div><div class="spacecom" style="width: 150px;">'+item.date+'</div></div>');             
          });
        }
      });
    });
  </script>

</body>
</html>