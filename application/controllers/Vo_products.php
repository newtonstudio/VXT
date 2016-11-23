<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Vo_products extends MY_Controller {
      
     public $data = array(
        'display_name' => "Products",
        'pathname' => "products",
        'view_foldername' => "vo_products",
        'id_column' => "product_id",
        'model_name' => "Products_model",
        'search_columns' => array(
              "title" => "Title",              
          )
      );

    public function edit($id)
      {

          $this->data['mode'] = 'Edit';
          
          $this->data['results'] = $this->{$this->data['model_name']}->getOne(array(
            $this->data['id_column'] => $id,
          ));          

          if($this->data['results']['category'] == "capacitive") {

            $details = $this->Capacitive_detail_model->get_where(array(
              'product_id' => $id,
              'is_deleted' => 0,              
            ), "priority", "ASC");

            if(!empty($details)) {
              foreach($details as $k=>$v) {
                $details[$k]['outline_dimensions'] = !empty($v['outline_dimensions'])?json_decode($v['outline_dimensions'], true):array();

                $details[$k]['cover_glass'] = !empty($v['cover_glass'])?json_decode($v['cover_glass'], true):array();

                $details[$k]['vxt_partno'] = !empty($v['vxt_partno'])?json_decode($v['vxt_partno'], true):array();

                $details[$k]['reference_drawing'] = !empty($v['reference_drawing'])?json_decode($v['reference_drawing'], true):array();

              }
            }


          } else {

            $details = $this->Industrial_detail_model->get_where(array(
              'product_id' => $id,
              'is_deleted' => 0,              
            ), "priority", "ASC");

          }

          $this->data['details'] = $details;
          
          $this->load->view('vo/header', $this->data);
          $this->load->view($this->data['view_foldername']."/add", $this->data);
          $this->load->view('vo/footer', $this->data);
      }


    public function Submit()
      {


          $mode = isset($_POST['mode'])?$_POST['mode']:'';
          $id = isset($_POST['id'])?$_POST['id']:'';
                    
          $sublist = $this->input->post("sublist", true);
          $tmp = array();
          if(!empty($sublist)) {
            foreach($sublist as $v) {
              if(!empty($v)) {
                $tmp[] = $v;
              }
            }
          }

          $photos = $this->input->post("photo", true);
          $tmp_photo = array();
          if(!empty($photos)) {
            foreach($photos as $v) {
              if(!empty($v)) {
                $tmp_photo[] = array(
                  'img' => $v,
                );
              }
            }
          }


          $array = array(
             'category' => $this->input->post("category", true),    
             'title' =>     $this->input->post("title", true),
             'main_title' => $this->input->post("main_title", true),    
             'main_brief' =>     $this->input->post("main_brief", true),                
             'subtitle' =>    $this->input->post("subtitle", true),   
             'button'  => $this->input->post("button", true),    
             'display' => isset($_POST['display'])?1:0,
             'sublist' => json_encode($tmp),
             'product_images' => json_encode($tmp_photo),
              //your code
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


      


}

?>
