<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Order_model extends CI_Model {                

    public function get_all_(){

     return $this->db->get("sellers")->result();    

    }


}
?>