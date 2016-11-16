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

	public function solutions()
	{
		
		$this->data['solutions'] = $this->Solutions_model->get_where(array(
			'is_deleted' => 0,
		));

		$this->load->view('frontend/header', $this->data);
        $this->load->view("frontend/solutions", $this->data);
        $this->load->view('frontend/footer', $this->data);
	}	

	public function support()
	{
		
		$this->data['qa'] = $this->QA_model->get_where(array(
			'is_deleted' => 0,
		),'priority','ASC');
		$this->data['drivers'] = $this->Drivers_model->get_where(array(
			'is_deleted' => 0,
		),'priority','ASC');
		

		$this->load->view('frontend/header', $this->data);
        $this->load->view("frontend/support", $this->data);
        $this->load->view('frontend/footer', $this->data);
	}

	public function contact()
	{
		
		$latlng = $this->Settings_model->getOne(array(
			'variable' => "latlng",
		));

		$this->data['latlng'] = explode(",", $latlng['value']);

		$this->load->view('frontend/header', $this->data);
        $this->load->view("frontend/contact", $this->data);
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
