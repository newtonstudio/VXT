<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Profile extends CI_Controller {

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
            $this->load->model('Article_model');            
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
            } else {
            	redirect("/","refresh");
            }            

            $this->data['current_page'] = "index";

            $this->data['countries'] = $this->Function_model->get_country();

            $sidemenu = array();
            $sidemenu[] = array(
            	'url' => base_url($this->data['init']['langu'].'/profile'),
            	'icon' => "fa fa-user",
            	'name' => $this->data['init']['lang']['profile'],
            );
            $sidemenu[] = array(
            	'url' => base_url($this->data['init']['langu'].'/usd_deposit_apply_history'),
            	'icon' => "fa fa-history",
            	'name' => $this->data['init']['lang']["Applied History"],
            );
            $sidemenu[] = array(
            	'url' => base_url($this->data['init']['langu'].'/usd_deposit'),
            	'icon' => "fa fa-money",
            	'name' => $this->data['init']['lang']["Deposit USD"],
            );
            $sidemenu[] = array(
            	'url' => base_url($this->data['init']['langu'].'/usd_withdraw'),
            	'icon' => "fa fa-money",
            	'name' => $this->data['init']['lang']["Withdraw USD"],
            );
            $sidemenu[] = array(
            	'url' => base_url($this->data['init']['langu'].'/usd_history'),
            	'icon' => "fa fa-history",
            	'name' => $this->data['init']['lang']["USD Account History"],
            );

            $sidemenu[] = array(
            	'url' => base_url($this->data['init']['langu'].'/silver_deposit'),
            	'icon' => "fa fa-stop-circle",
            	'name' => $this->data['init']['lang']["Deposit Silver"],
            );
            $sidemenu[] = array(
            	'url' => base_url($this->data['init']['langu'].'/silver_withdraw'),
            	'icon' => "fa fa-stop-circle",
            	'name' => $this->data['init']['lang']["Withdraw Silver"],
            );
            $sidemenu[] = array(
            	'url' => base_url($this->data['init']['langu'].'/silver_withdraw_do'),
            	'icon' => "fa fa-stop-circle",
            	'name' => $this->data['init']['lang']["Silver Delivery Order"],
            );
            $sidemenu[] = array(
            	'url' => base_url($this->data['init']['langu'].'/silver_history'),
            	'icon' => "fa fa-history",
            	'name' => $this->data['init']['lang']["Silver Account History"],
            );
            $sidemenu[] = array(
            	'url' => base_url($this->data['init']['langu'].'/silver_topay'),
            	'icon' => "fa fa-stop-circle",
            	'name' => $this->data['init']['lang']["Transfer to SilverPay Account"],
            );
            $sidemenu[] = array(
            	'url' => base_url($this->data['init']['langu'].'/usdtosilver'),
            	'icon' => "fa fa-money",
            	'name' => $this->data['init']['lang']["USD to Silver"],
            );
            $sidemenu[] = array(
            	'url' => base_url($this->data['init']['langu'].'/silvertousd'),
            	'icon' => "fa fa-stop-circle",
            	'name' => $this->data['init']['lang']["Silver to USD"],
            );
            $sidemenu[] = array(
                'url' => base_url($this->data['init']['langu'].'/silver_tomarket'),
                'icon' => "fa fa-stop-circle",
                'name' => $this->data['init']['lang']["Sell your Silver"],
            );
            $sidemenu[] = array(
                'url' => base_url($this->data['init']['langu'].'/market_manage'),
                'icon' => "fa fa-stop-circle",
                'name' => $this->data['init']['lang']["Manage your Silver"],
            );
            $sidemenu[] = array(
                'url' => base_url($this->data['init']['langu'].'/purchase_order'),
                'icon' => "fa fa-shopping-cart",
                'name' => $this->data['init']['lang']["Purchase order"],
            );


            $this->data['sidemenu'] = $sidemenu;


     }

	public function index()
	{

		
		
		$this->load->view('frontend/header', $this->data);
        $this->load->view("profile/index", $this->data);
        $this->load->view('frontend/footer', $this->data);
	}

	public function edit()
	{

		//echo $this->data['init']['langu'];		
		
		$this->load->view('frontend/header', $this->data);
        $this->load->view("profile/edit", $this->data);
        $this->load->view('frontend/footer', $this->data);
	}

	public function bank_account(){

		$this->load->view('frontend/header', $this->data);
        $this->load->view("profile/bank_account", $this->data);
        $this->load->view('frontend/footer', $this->data);

	}

	public function add_bank(){

		$this->load->view('frontend/header', $this->data);
        $this->load->view("profile/add_bank", $this->data);
        $this->load->view('frontend/footer', $this->data);
		
	}
	

	public function usd_deposit()
	{

		//echo $this->data['init']['langu'];		
		
		$this->load->view('frontend/header', $this->data);
        $this->load->view("profile/usd_deposit", $this->data);
        $this->load->view('frontend/footer', $this->data);
	}

	public function usd_deposit_apply_history() {

		$this->load->view('frontend/header', $this->data);
        $this->load->view("profile/usd_deposit_apply_history", $this->data);
        $this->load->view('frontend/footer', $this->data);
		
	}

	public function usd_withdraw()
	{

		//echo $this->data['init']['langu'];		
		
		$this->load->view('frontend/header', $this->data);
        $this->load->view("profile/usd_withdraw", $this->data);
        $this->load->view('frontend/footer', $this->data);
	}


	public function usd_history()
	{

		//echo $this->data['init']['langu'];		
		
		$this->load->view('frontend/header', $this->data);
        $this->load->view("profile/usd_history", $this->data);
        $this->load->view('frontend/footer', $this->data);
	}

	public function usdtosilver()
	{

		//echo $this->data['init']['langu'];		
		
		$this->load->view('frontend/header', $this->data);
        $this->load->view("profile/usdtosilver", $this->data);
        $this->load->view('frontend/footer', $this->data);
	}

	public function silvertousd()
	{

		//echo $this->data['init']['langu'];		
		
		$this->load->view('frontend/header', $this->data);
        $this->load->view("profile/silvertousd", $this->data);
        $this->load->view('frontend/footer', $this->data);
	}

	public function silver_deposit()
	{

		//echo $this->data['init']['langu'];	
        $article = $this->Article_model->getOne(array(
            'article_variable' => "DEPOSIT_SILVER",
        ));	

        $this->data['content'] = $article['content_'.$this->data['init']['langu']];
		
		$this->load->view('frontend/header', $this->data);
        $this->load->view("profile/silver_deposit", $this->data);
        $this->load->view('frontend/footer', $this->data);
	}

	public function silver_withdraw()
	{

		//echo $this->data['init']['langu'];		
		
		$this->load->view('frontend/header', $this->data);
        $this->load->view("profile/silver_withdraw", $this->data);
        $this->load->view('frontend/footer', $this->data);
	}

	public function silver_history()
	{

		//echo $this->data['init']['langu'];		
		
		$this->load->view('frontend/header', $this->data);
        $this->load->view("profile/silver_history", $this->data);
        $this->load->view('frontend/footer', $this->data);
	}

	public function silver_tomarket()
	{

		//echo $this->data['init']['langu'];		
		
		$this->load->view('frontend/header', $this->data);
        $this->load->view("profile/silver_tomarket", $this->data);
        $this->load->view('frontend/footer', $this->data);
	}

	public function silver_topay()
	{

		//echo $this->data['init']['langu'];		
		
		$this->load->view('frontend/header', $this->data);
        $this->load->view("profile/silver_topay", $this->data);
        $this->load->view('frontend/footer', $this->data);
	}

	public function silver_withdraw_do() {

		$this->load->view('frontend/header', $this->data);
        $this->load->view("profile/silver_withdraw_do", $this->data);
        $this->load->view('frontend/footer', $this->data);


	}

    public function market_manage()
    {

        //echo $this->data['init']['langu'];        
        
        $this->load->view('frontend/header', $this->data);
        $this->load->view("profile/market_manage", $this->data);
        $this->load->view('frontend/footer', $this->data);
    }

    public function purchase_order() {

        $this->load->view('frontend/header', $this->data);
        $this->load->view("profile/purchase_order", $this->data);
        $this->load->view('frontend/footer', $this->data);


    }

	
}
