<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Welcome extends CI_Controller {

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
            $this->load->model('Banner_model');
            $this->load->model('Article_model');
            $this->load->model('Products_model');
            $this->load->model('Solutions_model');
            $this->load->model('QA_model');
            $this->load->model('Drivers_model');
            $this->load->model('Industrial_detail_model');
            $this->load->model('Capacitive_detail_model');
            
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

            $this->data['productList'] = $this->Products_model->get_where(array(
            	'is_deleted' => 0,
            	'display' => 1,
            ));
           

            $this->data['current_page'] = "index";

            $custom_keys = array();
            $custom_keys[] = array(
            	'id' => "1",
            	'key' => "TYPE"
            );
            $custom_keys[] = array(
            	'id' => "2",
            	'key' => "FITTING"
            );
            $custom_keys[] = array(
            	'id' => "3",
            	'key' => "JACKET LAPELS"
            );
            $custom_keys[] = array(
            	'id' => "4",
            	'key' => "VENTS"
            );
            $custom_keys[] = array(
            	'id' => "5",
            	'key' => "SUIT BUTTON"
            );
            $custom_keys[] = array(
            	'id' => "6",
            	'key' => "SUIT POCKET"
            );
            $custom_keys[] = array(
            	'id' => "7",
            	'key' => "FABRIC"
            );
            $custom_keys[] = array(
            	'id' => "8",
            	'key' => "SUIT LINING FRONT"
            );
            $custom_keys[] = array(
            	'id' => "9",
            	'key' => "SUIT LINING"
            );
            $custom_keys[] = array(
            	'id' => "10",
            	'key' => "SUIT MONOGRAM"
            );
            $custom_keys[] = array(
            	'id' => "11",
            	'key' => "MEASUREMENT"
            );
            $custom_keys[] = array(
            	'id' => "12",
            	'key' => "SHOPPING BAG"
            );            

            $this->data['custom_key'] = $custom_keys;

     }

	public function index()
	{

		$bannerList = $this->Banner_model->get_where(array(
			'is_deleted' => 0,
			'display' => 1,
		), "priority", "ASC");

		$this->data['bannerList'] = $bannerList;


		//echo $this->data['init']['langu'];	
        $this->data['core_feature'] = $this->Article_model->getContent("CORE_FEATURES", $this->data['init']['langu']);
        $this->data['core_feature_desc'] = $this->Article_model->getContent("CORE_FEATURES_DESC", $this->data['init']['langu']);

        $this->data['CORE1_IMG'] = $this->Article_model->getContent("CORE1_IMG", $this->data['init']['langu']);
        $this->data['CORE1'] = $this->Article_model->getContent("CORE1", $this->data['init']['langu']);
        $this->data['CORE1_DESC'] = $this->Article_model->getContent("CORE1_DESC", $this->data['init']['langu']);

        $this->data['CORE2_IMG'] = $this->Article_model->getContent("CORE2_IMG", $this->data['init']['langu']);
        $this->data['CORE2'] = $this->Article_model->getContent("CORE2", $this->data['init']['langu']);
        $this->data['CORE2_DESC'] = $this->Article_model->getContent("CORE2_DESC", $this->data['init']['langu']);

        $this->data['CORE3_IMG'] = $this->Article_model->getContent("CORE3_IMG", $this->data['init']['langu']);
        $this->data['CORE3'] = $this->Article_model->getContent("CORE3", $this->data['init']['langu']);
        $this->data['CORE3_DESC'] = $this->Article_model->getContent("CORE3_DESC", $this->data['init']['langu']);

        


		//echo $this->data['init']['langu'];		
		
		$this->load->view('frontend/header', $this->data);
        $this->load->view("frontend/index", $this->data);
        $this->load->view('frontend/footer', $this->data);
	}

	public function news()
	{
		
		$article = $this->Article_model->getOne(array(
			'article_variable' => "ABOUT",
		));
		
		$this->data['content'] = nl2br($article['content_'.$this->data['init']['langu']]);

		$this->data['banner'] = json_decode($article['struct_'.$this->data['init']['langu']],true);

		$this->load->view('frontend/header', $this->data);
        $this->load->view("frontend/about", $this->data);
        $this->load->view('frontend/footer', $this->data);
	}

	public function about()
	{
		
		$article = $this->Article_model->getOne(array(
			'article_variable' => "ABOUT",
		));
		
		$this->data['content'] = nl2br($article['content_'.$this->data['init']['langu']]);

		$this->data['banner'] = json_decode($article['struct_'.$this->data['init']['langu']],true);

		$this->load->view('frontend/header', $this->data);
        $this->load->view("frontend/about", $this->data);
        $this->load->view('frontend/footer', $this->data);
	}

	public function custom()
	{
		
		$this->load->view('frontend/header', $this->data);
        $this->load->view("frontend_custom/custom", $this->data);
        $this->load->view('frontend/footer', $this->data);
	}

	public function custom_01type()
	{
		$this->data['key_no'] = 1;
		$this->load->view('frontend/header', $this->data);
        $this->load->view("frontend_custom/01-type", $this->data);
        $this->load->view('frontend/footer', $this->data);
	}

	public function custom_02fitting()
	{
		$this->data['key_no'] = 2;
		$this->load->view('frontend/header', $this->data);
        $this->load->view("frontend_custom/02-fitting", $this->data);
        $this->load->view('frontend/footer', $this->data);
	}

	public function custom_03jacketlapels()
	{
		$this->data['key_no'] = 3;
		$this->load->view('frontend/header', $this->data);
        $this->load->view("frontend_custom/03-jacketlapels", $this->data);
        $this->load->view('frontend/footer', $this->data);
	}

	public function custom_04vents()
	{
		$this->data['key_no'] = 4;
		$this->load->view('frontend/header', $this->data);
        $this->load->view("frontend_custom/04-vents", $this->data);
        $this->load->view('frontend/footer', $this->data);
	}

	public function custom_05suitbutton()
	{
		$this->data['key_no'] = 5;
		$this->load->view('frontend/header', $this->data);
        $this->load->view("frontend_custom/05-suitbutton", $this->data);
        $this->load->view('frontend/footer', $this->data);
	}
	public function custom_06suitpocket()
	{
		$this->data['key_no'] = 6;
		$this->load->view('frontend/header', $this->data);
        $this->load->view("frontend_custom/06-suitpocket", $this->data);
        $this->load->view('frontend/footer', $this->data);
	}

	public function custom_07fabric()
	{
		$this->data['key_no'] = 7;
		$this->load->view('frontend/header', $this->data);
        $this->load->view("frontend_custom/07-fabric", $this->data);
        $this->load->view('frontend/footer', $this->data);
	}

	public function custom_08suitliningfront()
	{
		$this->data['key_no'] = 8;
		$this->load->view('frontend/header', $this->data);
        $this->load->view("frontend_custom/08-suitliningfront", $this->data);
        $this->load->view('frontend/footer', $this->data);
	}

	public function custom_09suitlining()
	{
		$this->data['key_no'] = 9;
		$this->load->view('frontend/header', $this->data);
        $this->load->view("frontend_custom/09-suitlining", $this->data);
        $this->load->view('frontend/footer', $this->data);
	}

	public function custom_10suitmonogram()
	{
		$this->data['key_no'] = 10;
		$this->load->view('frontend/header', $this->data);
        $this->load->view("frontend_custom/10-suitmonogram", $this->data);
        $this->load->view('frontend/footer', $this->data);
	}

	public function custom_11measurement()
	{
		$this->data['key_no'] = 11;
		$this->load->view('frontend/header', $this->data);
        $this->load->view("frontend_custom/11-measurement", $this->data);
        $this->load->view('frontend/footer', $this->data);
	}

	public function custom_12shoppingbag()
	{
		$this->data['key_no'] = 12;
		$this->load->view('frontend/header', $this->data);
        $this->load->view("frontend_custom/12-shoppingbag", $this->data);
        $this->load->view('frontend/footer', $this->data);
	}


	public function shop()
	{
		
		$this->load->view('frontend/header', $this->data);
        $this->load->view("frontend/shop", $this->data);
        $this->load->view('frontend/footer', $this->data);
	}

	public function shop_list()
	{
		
		$this->load->view('frontend/header', $this->data);
        $this->load->view("frontend/shop_list", $this->data);
        $this->load->view('frontend/footer', $this->data);
	}

	public function services()
	{
		
		$this->load->view('frontend/header', $this->data);
        $this->load->view("frontend/services", $this->data);
        $this->load->view('frontend/footer', $this->data);
	}

	public function event_list()
	{
		
		$this->load->view('frontend/header', $this->data);
        $this->load->view("frontend/event_list", $this->data);
        $this->load->view('frontend/footer', $this->data);
	}


	public function event_detail($id, $slug="")
	{
		
		$this->load->view('frontend/header', $this->data);
        $this->load->view("frontend/event_detail", $this->data);
        $this->load->view('frontend/footer', $this->data);
	}

	public function product($product_id, $product_title)
	{
		$productData = $this->Products_model->getOne(array(
			'product_id' => $product_id,
			'is_deleted' => 0,
			'display' => 1,
		));

		if(empty($productData)) {
			show_error("This product has been removed from system");
		}
		$this->data['productData'] = $productData;
				

		$this->load->view('frontend/header', $this->data);
        $this->load->view("frontend/products", $this->data);
        $this->load->view('frontend/footer', $this->data);
	}

	public function product_detail($product_id, $product_title)
	{
		$productData = $this->Products_model->getOne(array(
			'product_id' => $product_id,
			'is_deleted' => 0,
			'display' => 1,
		));

		if(empty($productData)) {
			show_error("This product has been removed from system");
		}
		$this->data['productData'] = $productData;

		$this->load->view('frontend/header', $this->data);

		if($productData['category'] == 'capacitive') {

			$this->data['details'] = $this->Capacitive_detail_model->get_where(array(
				'product_id' => $productData['product_id'],
				'is_deleted' => 0,
			), 'priority', 'ASC');

			$this->load->view("frontend/capacitive", $this->data);

		} else {

			$this->data['details'] = $this->Industrial_detail_model->get_where(array(
				'product_id' => $productData['product_id'],
				'is_deleted' => 0,
			), 'priority', 'ASC');

			$this->load->view("frontend/industrial", $this->data);

		}

		$this->load->view('frontend/footer', $this->data);		

		
        
        
	}


	public function contact()
	{

		$this->load->view('frontend/header', $this->data);
        $this->load->view("frontend/contact", $this->data);
        $this->load->view('frontend/footer', $this->data);
	}

	public function login()
	{

		$this->load->view('frontend/header', $this->data);
        $this->load->view("auth/login", $this->data);
        $this->load->view('frontend/footer', $this->data);
	}

	public function register()
	{

		$this->load->view('frontend/header', $this->data);
        $this->load->view("auth/register", $this->data);
        $this->load->view('frontend/footer', $this->data);
	}

	public function privacy()
	{
		
		$article = $this->Article_model->getOne(array(
			'article_variable' => "PRIVACY",
		));
		$this->data['title'] = strtoupper($this->data['init']['lang']['Privacy']);
		$this->data['content'] = $article['content_'.$this->data['init']['langu']];

		$this->load->view('frontend/header', $this->data);
        $this->load->view("frontend/privacy", $this->data);
        $this->load->view('frontend/footer', $this->data);
	}

	public function terms()
	{
		
		$article = $this->Article_model->getOne(array(
			'article_variable' => "TERMS",
		));
		$this->data['title'] = strtoupper($this->data['init']['lang']['Terms']);
		$this->data['content'] = $article['content_'.$this->data['init']['langu']];

		$this->load->view('frontend/header', $this->data);
        $this->load->view("frontend/terms", $this->data);
        $this->load->view('frontend/footer', $this->data);
	}

	
}
