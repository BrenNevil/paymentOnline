<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Seller_model extends CI_Model {   
    function __construct()
    {
          parent::__construct();
    }             

    public function get_all_sellers(){

     return $this->db->get("sellers")->result();    

    }


}
?>