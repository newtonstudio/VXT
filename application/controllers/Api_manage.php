<?php

require_once APPPATH . 'third_party/SES/SimpleEmailService.php';
require_once APPPATH . 'third_party/SES/SimpleEmailServiceMessage.php';
require_once APPPATH . 'third_party/SES/SimpleEmailServiceRequest.php';

class Api_manage extends CI_Controller {

    public $data = array();

    public function __construct() {
            parent::__construct();
            
            $this->load->model('User_model');
            $this->load->model('User_login_token_model');
            $this->load->model('Products_model');           
            $this->load->model('Function_model');            
            $this->load->model('Settings_model');            

            $this->data['starttime'] = microtime(true);
            
            $this->data['init'] = $this->Function_model->page_init();

    }

    //成功讀取
    private function json_output($result){
    	$this->data['endtime'] = microtime(true);
    	$timediff = ($this->data['endtime'] - $this->data['starttime']);
    	header('Content-Type: application/json; charset=utf-8');
		header("Access-Control-Allow-Origin: *");
    	echo json_encode(array(
    		'status'	=> "OK",
    		'result'	=> $result,
    		'comment'	=> "",
    		'duration'	=> $timediff,
    	));
    }

    //如果出現錯誤就用這個
    private function json_output_error($result){
    	$this->data['endtime'] = microtime(true);
    	$timediff = ($this->data['endtime'] - $this->data['starttime']);
    	header('Content-Type: application/json; charset=utf-8');
		header("Access-Control-Allow-Origin: *");

        $error_code = "";
        if(strpos($result, "|") !== FALSE) {
            $tmp = explode("|", $result);
            $result = $tmp[0];
            $error_code = $tmp[1];
        }

    	echo json_encode(array(
    		'status'	=> "ERROR",
    		'result'	=> $result,
    		'comment'	=> "",
    		'duration'	=> $timediff,
            'error_code' => $error_code,
    	));
    }


    //檢查使用者的token是否有效
    public function checkLoginToken($token) {
        //echo 1;exit
    	$token_data = $this->User_login_token_model->getOne(array(
            			'token' => $token,
            			'expired >' => time(),
        ));

        if(!empty($token_data)){

        	$this->User_login_token_model->update(array('id'=>$token_data['id']),array(	            			
	           	'expired'   => time()+7*24*3600,	            			
	            'modified_date'	=> date("Y-m-d H:i:s"),	            			
	        ));
            
        	$this->json_output(array(
                'is_login' => true,
                'user_id' => $token_data['user_id'],                
            ));

        } else {
        	$this->json_output(array(
                'is_login' => false,
                'user_id' => NULL,
            ));
        }

    }   

    //檢查使用者的token是否有效
    public function logout($token) {
        //echo 1;exit
        $token_data = $this->User_login_token_model->getOne(array(
                        'token' => $token,
                        'expired >' => time(),
        ));

        if(!empty($token_data)){

            $this->User_login_token_model->update(array('id'=>$token_data['id']),array(                         
                'expired'   => time()-1*24*3600,                            
                'modified_date' => date("Y-m-d H:i:s"),                         
            ));


            $userdata = $this->User_model->get_where(array(
                'user_id' => $token_data['user_id'],               
            ), false);
            
            $this->json_output(array(
                'is_login' => false,
                'user_id' => $token_data['user_id'],                
            ));

        } else {
            $this->json_output(array(
                'is_login' => false,
                'user_id' => NULL,
            ));
        }

    }   


    //check surname repeat
    public function checkEmail($val)
      {
        if(($val)!='') {
          $data = $this->User_model->get_where(array(
            'email' => $val,
          ));
          if(!empty($data)) {
            $result = 1;
          } else {
            $result = 0;
          }
          $this->json_output($result);

        } 
    }

    //使用者login的時候丟的API
    public function login(){

    	header('Content-Type: application/json; charset=utf-8');
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

            //print_r($content);
        if(isset($_SERVER["CONTENT_TYPE"]) && strpos($_SERVER["CONTENT_TYPE"], "application/json") !== false) {
            $_POST = array_merge($_POST, (array) json_decode(trim(file_get_contents('php://input')), true));


            $email = $this->input->post("email", true);
            $password = $this->input->post("password", true);
           

            $userdata = $this->User_model->getOne(array(
            	'email' => $email,            	
            ));
            

            try 
            {

            	if(!empty($userdata)) {

                    if(!$this->User_model->verify($password, $userdata['password'])) {
                        throw new Exception($this->data['init']['lang']['Invalid UserID or Password']);
                    }
            		

                    if(!$userdata['activated']) {
                        throw new Exception($this->data['init']['lang']['This user has not been verified']);
                    }


            		$randomstring = md5(date("YmdHis").$userdata['user_id'].rand(1000,9999));

            		$token_data = $this->User_login_token_model->getOne(array(
            			'user_id' => $userdata['user_id']
            		));

            		if(!empty($token_data)) {
                        //允許同一個帳號多人登入
            			$this->User_login_token_model->insert(array(
                            'user_id'   => $userdata['user_id'],
                            'token'     => $randomstring,
                            'expired'   => time()+7*24*3600,
                            'created_date'  => date("Y-m-d H:i:s"),
                            'modified_date' => date("Y-m-d H:i:s"),
                            'is_deleted'    => 0,
                        ));

            		} else {

	            		$this->User_login_token_model->insert(array(
	            			'user_id'	=> $userdata['user_id'],
	            			'token'		=> $randomstring,
	            			'expired'   => time()+7*24*3600,
	            			'created_date'	=> date("Y-m-d H:i:s"),
	            			'modified_date'	=> date("Y-m-d H:i:s"),
	            			'is_deleted'	=> 0,
	            		));

            		}

            		$token = $randomstring;                    


            		$this->json_output(array(
                        'token' => $token,
                        'user_id' => $userdata['user_id'],                        
                    ));

	            } else {

	            	throw new Exception($this->data['init']['lang']['Invalid UserID or Password']);

	            }


            } catch (Exception $e) {

            	$this->json_output_error($e->getMessage());            	

            }



            

        } 

    }

    public function base64_to_jpeg($base64_string, $output_file) {
        $ifp = fopen($output_file, "wb"); 
        
        if(strpos($base64_string,",") !== false) {
            $data = explode(',', $base64_string);           
            fwrite($ifp, base64_decode($data[1])); 
        } else {
            fwrite($ifp, base64_decode($base64_string));    
        }
        fclose($ifp); 
    
        return $output_file; 
    }



}