<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Vo_qa extends MY_Controller {
      
      public $data = array(
        'display_name' => "QA",
        'pathname' => "QA",
        'view_foldername' => "vo_qa",
        'id_column' => "qa_id",
        'model_name' => "QA_model",
        'search_columns' => array(
              "question" => "Question",              
          )
      );
        
      //Write code here
      public function Submit(){

      }     

}

?>