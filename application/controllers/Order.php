<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller {

  public function __construct() {
    parent::__construct();    
    $this->load->model(['order_model']);          
    $this->load->model(['seller_model']);          
    $this->load->model(['product_model']);          
  }


  public function index(){  
    $vars=[];

    $vars+=[
    "sellers"  => $this->seller_model->get_all_sellers(),
    "products"  => $this->product_model->get_all_products(),
    ];
      
    $this->load->view('order/order', $vars);   

  }

  public function post_order()
  {
      $this->load->library('form_validation'); 
      $this->load->helper('security');

      $this->form_validation->set_rules('seller', 'Vendedora', 'required|trim|xss_clean'); 
      $this->form_validation->set_rules('idProduct', 'Producto', 'required|trim|xss_clean'); 
      
      
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

       
}

?>