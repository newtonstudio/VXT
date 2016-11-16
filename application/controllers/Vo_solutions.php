<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Vo_solutions extends MY_Controller {
      
      public $data = array(
        'display_name' => "Solutions",
        'pathname' => "solution",
        'view_foldername' => "vo_solutions",
        'id_column' => "solution_id",
        'model_name' => "Solutions_model",
        'search_columns' => array(
              "title" => "Title",              
          )
      );
        
      //Write code here
      public function Submit(){

      }     

}

?>