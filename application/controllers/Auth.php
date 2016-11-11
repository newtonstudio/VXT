<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Auth extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct() {
            parent::__construct();
            $this->load->model('User_model');            
            $this->load->model('Function_model');
            
            $this->data['init'] = $this->Function_model->page_init();

            $this->data['item_per_page'] = 9;

            $this->data['webpage'] = $this->Function_model->get_web_setting();
            $this->data['islogin'] = $this->Function_model->isLogin();
            //如果使用者是登入狀態，直接帶去後台的首頁
            if ($this->data['islogin']) {
                  $this->data['userdata'] = $this->User_model->getOne(array(
            	  	'user_id' => $this->data['islogin'],
            	  ));
            }

            

            $this->data['current_page'] = "index";
     }

	public function register()
	{

		$this->load->view('frontend/header', $this->data);
        $this->load->view("auth/register", $this->data);
        $this->load->view('frontend/footer', $this->data);


	}	

	public function register_success(){

       $this->load->view('frontend/header', $this->data);
       $this->load->view("auth/register_success", $this->data);
       $this->load->view('frontend/footer', $this->data);

    }

	public function verifyemail($email,$code) {

	   $checkAPI = file_get_contents("http:".base_url($this->data['init']['langu']."/api/verifyemail/".$email."/".$code));

	   if(!empty($checkAPI)) {
	   	$result = json_decode($checkAPI, true);
	   }

	   $this->data['title'] = $result['result']['title'];
	   $this->data['desc'] = $result['result']['desc'];

       $this->load->view('frontend/header', $this->data);
       $this->load->view("auth/verifyemail", $this->data);
       $this->load->view('frontend/footer', $this->data);

    }

    public function forgot_password(){

       $this->load->view('frontend/header', $this->data);
       $this->load->view("auth/user_forgot_password", $this->data);
       $this->load->view('frontend/footer', $this->data);

    }

    public function reset_pass($pwdRetrival=""){

    	$userData = $this->User_model->getOne(array(
	      'is_deleted' => 0, 	      
	      'pwd_retrieval' => $pwdRetrival,
	    ));

	    if(empty($userData)) {
	      show_error("Invalid email or password retrieval code");
	    }
	    
	    $this->data['code'] = $pwdRetrival;

	    $this->load->view('frontend/header', $this->data);
	    $this->load->view("auth/user_reset_password", $this->data);
	    $this->load->view('frontend/footer', $this->data);



    }



	
}
