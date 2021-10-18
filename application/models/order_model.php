<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Order_model extends CI_Model {                
    
    
    public function get_order_by_id($id){

      $this->db->where("id_order", $id);
      return $this->db->get("orders")->row();  
      
   
    }
    

}
?>