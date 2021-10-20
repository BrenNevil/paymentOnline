<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Product_model extends CI_Model {   
		function __construct()
		{
					parent::__construct();
		}             
					 

    public function get_all_products(){

     return $this->db->get("products")->result();    

    }

    public function get_products_order($id){
        $this->db->from("products_order");
        $this->db->where("id_order", $id);
	    $query = $this->db->get()->result();
	    foreach ($query as $row) {
				if($row->id_product>0){
				$this->db->from("products");
				$this->db->where("id_product", $row->id_product); 
				$query_prod = $this->db->get();
				$row_prod = $query_prod->row();	 
					
					$row->name  = $row_prod -> name;
					$row->price = $row_prod -> price;
				}
			}
	return $query;
     
    }
  



}
?>