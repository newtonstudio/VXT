<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Vo_contact extends MY_Controller {
      
      public $data = array(
        'display_name' => "Contact",
        'pathname' => "contact",
        'view_foldername' => "vo_contact",
        'id_column' => "c_id",
        'model_name' => "Contact_model",
        'search_columns' => array(
              "name" => "Name",
              "email" => "Email",
              "company" => "Company name",
          )
      );


      public function Submit()
      {         
          $mode = isset($_POST['mode'])?$_POST['mode']:'';
          $id = isset($_POST['id'])?$_POST['id']:'';
          
          $array = array(
             'name'  => $this->input->post("name", true),       
             'email'  => $this->input->post("email", true),       
             'company'  => $this->input->post("company", true),       
             'message'  => $this->input->post("message", true),
             'country'  => $this->input->post("country", true),                     
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