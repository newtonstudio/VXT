<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Vo_drivers extends MY_Controller {
      
      public $data = array(
        'display_name' => "Drivers",
        'pathname' => "drivers",
        'view_foldername' => "vo_drivers",
        'id_column' => "driver_id",
        'model_name' => "Solutions_model",
        'search_columns' => array(
              "OS" => "OS",              
          )
      );
        
      //Write code here
      public function Submit(){

      }     

}

?>