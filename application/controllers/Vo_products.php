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


      


}

?>
