<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Seller extends CI_Controller {

  public function __construct() {
    parent::__construct();    
    $this->load->model('seller_model');          
  }


  public function index(){   
    $vars=[
    "alert"       => $this->session->flashdata('alert'),
    "sellers"  => $this->seller_model->get_all_sellers(),
    ];
      
    $this->load->view('sellers/sellers', $vars);   

  }

  public function post_seller(){
      $this->load->library('form_validation'); 
      $this->load->helper('security');

      $this->form_validation->set_rules('name', 'Nombre', 'required|trim|xss_clean'); 
      
      
      if($this->form_validation->run()==FALSE)
      {
      
         $this->load->view('seller/sellers');
      
      }else{
              


      $data=[
      'name'        => $this->input->post('name'),
      ];

      if($this->db->insert("sellers", $data)){
          
          //Notificamos con un alert
          $this->session->set_flashdata('alert', [
          'type' => "success",
          'msg'  => "Se agregó con exito"
          ]);    
              
           redirect("seller", 'refresh'); 
          
      }else{
          //Algo salio mal
      }      

      }  
              
  }

  public function commissions(){   
    $vars=[
    "alert"       => $this->session->flashdata('alert'),
    "sellers"  => $this->seller_model->get_all_sellers(),
    ];
      //echo json_encode($vars); 
    $this->load->view('sellers/commissions', $vars);   

  }

  public function get_commission_seller($seller){

    $this->db->from("orders");
    $this->db->where("id_seller", $seller);
    $query = $this->db->get()->result();
    foreach ($query as $row) {
      $commission=0;	
      $this->db->from("products p");
      $this->db->join("products_order o "," o.id_product = p.id_product", "inner");
      $this->db->where("id_order", $row->id_order); 
      $query_prod = $this->db->get()->result();
      foreach ($query_prod as $row_prod) {	 
            $commission  += $row_prod -> commission;
      }
      $row->commission = $commission;
        
      }
      echo json_encode($query);
      //return $query;

}

       
}

?>