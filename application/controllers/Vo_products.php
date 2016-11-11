<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Vo_products extends CI_Controller {
      
      public $data = array();
      
      public function __construct() {
            parent::__construct();
            $this->load->model('User_model');
            $this->load->model('Products_model');			      
            $this->load->model('Function_model');

            $this->data['init'] = $this->Function_model->page_init();
            //This section is all about user logged in information
            //we do it in constructor, so every method will call this once
            //and use in every pages
            $this->data['item_per_page'] = $this->Function_model->item_per_page();
            $this->data['webpage'] = $this->Function_model->get_web_setting();
            $this->data['islogin'] = $this->Function_model->isLogin();
            
            if ($this->data['islogin']) {
				      $this->data['userdata'] = $this->User_model->getOne(array(
                  'user_id' => $this->data['islogin'],
                ));

              if(!in_array($this->data['userdata']['role_id'], array("-1"))){                        
                        redirect($init['langu'].'/profile','refresh');      
                  }
            }else{
                redirect('/','refresh');
            }

            $this->data['display_name'] = "products";
            $this->data['pathname'] = "products";
            $this->data['view_foldername'] = "vo_products";
            $this->data['id_column'] = "p_id"; //role_id, product_id,... etc
            $this->data['model_name'] = "Products_model"; //role_id, product_id,... etc

            //What admin can search for?
            $search_columns=array(
              "serial" => "Product Serial",
              "title" => "Product Title",
            );
            
            $this->data['search_columns'] = $search_columns;

            $userlist = $this->User_model->getOptions(array(
                              'is_deleted' => 0,                              
            ));
            $this->data['userlist'] = $userlist;
            


      }
      
      //For listing
      public function index($search_column="ALL", $q="ALL", $page=1)
      {

            $this->data['search_column'] = $search_column;
            $this->data['q'] = $q;
		        
            $this->data['page'] = $page;
            $limit_start = ($page-1)*$this->data['item_per_page'];    

            $sql_where = array();
            $sql_where['is_deleted'] = 0;            

            $sql_like = array();
            if($q!="ALL") {
              $sql_like[$search_column] = $q;
            }

            
            $this->data["total"] = $this->{$this->data['model_name']}->record_count($sql_where, $sql_like);
            
            $results = array();
            $results = $this->{$this->data['model_name']}->fetch($this->data['item_per_page'], $limit_start, $sql_where, $sql_like);
            $this->data["results"] = $results;
            
            $url = base_url().$this->data['init']['langu'].'/vo/'.$this->data['pathname'].'/list/'.$search_column."/".$q."/";
            $this->data['paging'] = $this->Function_model->get_paging($this->data['item_per_page'],10,$this->data['total'],$page,$url);
            
            $this->load->view('vo/header', $this->data);
            $this->load->view($this->data['view_foldername']."/list", $this->data);
            $this->load->view('vo/footer', $this->data);
      }
      
      public function add()
      {
		  
          $this->data['mode'] = 'Add';
          $this->load->view('vo/header', $this->data);
          $this->load->view($this->data['view_foldername']."/add", $this->data);
          $this->load->view('vo/footer', $this->data);
      }
      
      public function edit($id)
      {

          $this->data['mode'] = 'Edit';
          
          $this->data['results'] = $this->{$this->data['model_name']}->getOne(array(
            $this->data['id_column'] => $id,
          ));          
          
          $this->load->view('vo/header', $this->data);
          $this->load->view($this->data['view_foldername']."/add", $this->data);
          $this->load->view('vo/footer', $this->data);
      }
      
      public function Submit()
      {


          $mode = isset($_POST['mode'])?$_POST['mode']:'';
          $id = isset($_POST['id'])?$_POST['id']:'';
                    
          
          $array = array(
		  	     'title'	=> $this->input->post("title", true),			  
             'serial'  => $this->input->post("serial", true),       
             'oz'  => $this->input->post("oz", true),       
             'feePerOz'  => $this->input->post("feePerOz", true),       
             'photo'  => $this->input->post("photo", true),       
             'display'  => isset($_POST['display'])?1:0,       
          );
          
          
          if($mode == 'Add'){
              $array['created_date'] = date("Y-m-d H:i:s");
              $this->{$this->data['model_name']}->insert($array);
          }else{
              $array['modified_date'] = date("Y-m-d H:i:s");
              $this->{$this->data['model_name']}->update(array(
                $this->data['id_column'] => $id,
              ),$array);
          }		  		  		  
          
          redirect(base_url($this->data['init']['langu'].'/vo/'.$this->data['pathname'].'/list'), 'refresh');
      }
      
      
      public function delete($id)
      {
          $this->{$this->data['model_name']}->delete(array(
            $this->data['id_column'] => $id,
          ));
          redirect(base_url($this->data['init']['langu'].'/vo/'.$this->data['pathname'].'/list'), 'refresh');
      }
  


}

?>
