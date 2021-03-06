<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Order_model extends CI_Model {                
    
    function __construct()
    {
          parent::__construct();
    }
    public function get_order_by_id($id){

      $this->db->where("id_order", $id);
      return $this->db->get("orders")->row();  
    }

    public function get_order(){

      return $this->db->get("orders")->result();  
    }

    public function get_payment(){

      return $this->db->get("payments")->result();  
    }
    

    

}
?>