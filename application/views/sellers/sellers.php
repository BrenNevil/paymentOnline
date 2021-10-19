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
              <h4 class="center">Vendedoras</h4>
          </div>
       </div>
       <br>
      <div class="row ">
       <div class="col">
        </div>
        <div class="col">
          <input data-toggle="modal" data-target="#exampleModalCenter" type="button" class="boton" value="Nueva vendedora">
        </div>
      </div>
    <br>
     <div class="row">
         <div class="col">
             <p>Vendedoras agregadas:</p>
         </div>
     </div>
     <hr>
     <br>
     <br>
        <div class="row">
          <div class="col">
            <table>
              <?php foreach($sellers as $row){ ?>
              <tr>                             
              <td class="nom"><?php echo $row->name ?></td>
              </tr>
              <?php } ?>
            </table>
          </div>
        </div>
      </div>
     <!-- |||||||||||||||||||||||||||||||||||||| -->
      
    </div>
  </div>
</div>
 
 <!-- MODAL |||||||||||||||||||||||||||||||||||||| -->
 
 <!-- Modal -->
 <form action="<?php echo base_url("seller/post_seller"); ?>" method="post">
<div class="modal fade " id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Nueva vendedora</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">        
        <input type="hidden" name="id" id="id" value="">
          <div class="row">
            <div class="col">
              <label for="name">Nombre:</label>
              <input name="name" id="name" type="text" class="form-control" required>
            </div>
          </div>          
          <br>
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-send">Guardar</button>
      </div>
    </div>
  </div>
</div>
   </form>
  <!-- MODAL |||||||||||||||||||||||||||||||||||||| -->
 
 
<br>
 <br>  
 <br>
 <br> 
  
<script type="text/javascript" src="vendors/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script type="text/javascript" src="vendors/bootstrap/js/bootstrap.min.js"></script>

</body>
</html>