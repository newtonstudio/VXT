<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Vo_article extends MY_Controller {
      
      public $data = array(
        'display_name' => "Article",
        'pathname' => "article",
        'view_foldername' => "vo_article",
        'id_column' => "article_id",
        'model_name' => "Article_model",
        'search_columns' => array(
              "article_variable" => "title",
            )
      );


      public function Submit()
      {         
          $mode = isset($_POST['mode'])?$_POST['mode']:'';
          $id = isset($_POST['id'])?$_POST['id']:'';
          
          $array = array(
             'article_variable'  => $this->input->post("article_variable", true),       
             'content_en'  => $this->input->post("content_en", true),       
             'content_zh'  => $this->input->post("content_zh", true),       
             'content_cn'  => $this->input->post("content_cn", true),       
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