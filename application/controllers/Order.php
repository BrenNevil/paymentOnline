<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller {

  public function __construct() {
    parent::__construct();    
    $this->load->model('Order_model');          
    $this->load->model('Seller_model');          
    $this->load->model('Product_model');          
  }


  public function index(){  
    $vars=[];

    $vars+=[
    "alert"    => $this->session->flashdata('alert'),
    "sellers"  => $this->Seller_model->get_all_sellers(),
    "products" => $this->Product_model->get_all_products(),

    ];
      
    $this->load->view('order/order', $vars);   

  }

  public function post_order()
  {
      $this->load->library('form_validation'); 
      $this->load->helper('security');

      $this->form_validation->set_rules('seller', 'Vendedora', 'required|trim|xss_clean'); 
      $this->form_validation->set_rules('idProduct', 'Producto', 'required|trim|xss_clean'); 
      $this->form_validation->set_rules('price', 'Total', 'required|trim|xss_clean'); 
      
      $vars=[
        "alert"    => $this->session->flashdata('alert'),
        "sellers"  => $this->Seller_model->get_all_sellers(),
        "products" => $this->Product_model->get_all_products(),
    
        ];
            
      if($this->form_validation->run()==FALSE)
      {
      
        $this->load->view('/order/order', $vars);
      
      }else{

            $data=[
            'total'      => $this->input->post('price'),
            'id_seller'  => $this->input->post('seller'),
            ];

            if($this->db->insert("orders", $data)){
              //Notificamos con un alert
              $idOrder = $this->db->insert_id(); // id del insert
              
              $base = $this->input->post('base');
              $link = $base."order/payorder/".$idOrder;

              $product = $this->input->post('idProduct');
              $array = explode(',', $product);
              

              foreach ($array as &$valor) {
                if($valor == "0"){}else{
                $data_produc=[
                  'id_order'    => $idOrder,
                  'id_product'  => $valor,
                  ];

                  $this->db->insert("products_order", $data_produc);
                }
              }

              $datalink=[
                'link'  => $link,
              ]; 

              $this->db->where("id_order", $idOrder);
              $this->db->update("orders", $datalink );

              $this->session->set_flashdata('alert', [
              'type' => "success",
              'msg'  => "Se agregó con exito",
              'data' =>  $base."order/payOrder/".$idOrder
              ]);   
              
              redirect("/order", 'refresh'); 
                
            }else{
                //Algo salio mal
            }      

      }  
              
  }

  public function payorder($id){  
    $vars=[];

    $vars+=[
    "alert"    => $this->session->flashdata('alert'),
    "order"    => $this->Order_model->get_order_by_id($id),
    "products" => $this->Product_model->get_products_order($id),

    ];
     //echo json_encode($vars); 
    $this->load->view('order/pay_order', $vars);   

  }
  
  
  public function post_payment()
  {
      $this->load->library('form_validation'); 
      $this->load->helper('security');

      $this->form_validation->set_rules('email', 'Correo electronico', 'required|trim|xss_clean'); 
      $this->form_validation->set_rules('address', 'Direccion', 'required|trim|xss_clean'); 
      $this->form_validation->set_rules('city', 'Ciudad', 'required|trim|xss_clean'); 
      $this->form_validation->set_rules('state', 'Estado', 'required|trim|xss_clean'); 
      $this->form_validation->set_rules('card', 'Tarjeta de credito', 'required|trim|xss_clean'); 

      $idOrder = $this->input->post('id_order');
      
      $vars=[
        "alert"    => $this->session->flashdata('alert'),
        "order"    => $this->Order_model->get_order_by_id($idOrder),
        "products" => $this->Product_model->get_products_order($idOrder),
        
        ];
            
      if($this->form_validation->run()==FALSE)
      {
        $this->session->set_flashdata('alert', [
          'type' => "danger",
          'msg'  => "Hubo un problema, verifica los campos"
          ]); 
        redirect("/order/payorder/".$idOrder, 'refresh');
        //$this->load->view('/order/pay_order', $vars);
      
      }else{

        $data =[];
        $dataup =[];
        if($this->input->post('card') == "123") {
         
          $dataup+=[
          'status'  => 1,
          ]; 
          $data+=[
          'status'  => 1,
          ]; 
          $type = "success";
          $msg  = "El pago de tu pedido se realizo con exito";


          
        
        }else{ 
        
          $type = "danger";
          $msg  = "Tu tarjeta no es valida";

        }

            $data+=[
            'email'    => $this->input->post('email'),
            'address'  => $this->input->post('address'),
            'id_order' => $this->input->post('id_order'),
            ];
            

            if($this->db->insert("payments", $data)){
              //Notificamos con un alert
              
              $dataup+=[
                'shipping'  => $this->input->post('shipping'),
              ]; 

              $this->db->where("id_order", $idOrder);
              $this->db->update("orders", $dataup );

              $this->session->set_flashdata('alert', [
              'type' => $type,
              'msg'  => $msg,
              ]);   
              
              redirect("/order/payorder/".$idOrder, 'refresh'); 
                
            }else{
                //Algo salio mal
                
        }  

      }  
              
  } 
  
  public function bitacora(){  
    $vars=[];

    $vars+=[
    "alert"    => $this->session->flashdata('alert'),
    "payment"  => $this->Order_model->get_payment(),
    "order"    => $this->Order_model->get_order(),
    ];
     //echo json_encode($vars); 
    $this->load->view('order/bitacorapay', $vars);   

  }
  public function get_payment_by_id($id){
    $this->db->where("id_order", $id);
    $query = $this->db->get("payments")->result(); 
    echo json_encode($query); 
  }


}

?>