<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

  public function __construct() {
    parent::__construct();    
    $this->load->model(['Product_model']);          
  }

  public function index(){  
    echo "welcomee!!";

  }

  public function product_by_id($id){
   
   
    $this->db->where("id_product", $id);   
    echo json_encode($this->db->get("products")->row()); 

   }


       
}

?>