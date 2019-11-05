<?php 
class MY_Controller extends CI_Controller {
	//Biến gửi dữ liệu sang cho view
	public $data = array();

	public function __construct() 
	{
		// Kế Thừa Controller
		parent::__construct();
		$this->load->library('form_validation');
        $this->load->helper('form');

		$controller = $this->uri->segment(1);
		switch ($controller) {
			case 'admin':
			{
				//Xu ly du lieu khi truy cap vao admin
		    	$this->load->helper('admin');
		    	$this->_check_login();
		    	break;
			}
			default:
			{
				//Lấy danh mục các sản phẩm
				$this->load->model('Catalog_model');
				$input = array();
				$catalog_list = $this->Catalog_model->get_list($input);
			    $this->data['catalog_list'] = $catalog_list;
				//Kiểm tra xem thành viên đã đăng nhập chưa
				$user_id_login = $this->session->userdata('user_id_login');
				$this->data['user_id_login'] = $user_id_login;
				if ($user_id_login) {
					$this->load->model('User_model');
					$user_info = $this->User_model->get_info($user_id_login);
					$this->data['user_info'] = $user_info;
				}
				//Phần giỏ hàng
				$this->load->library('cart');
				$this->data['total_items'] = $this->cart->total_items();

			}		
		}
	}
	// Kiem tra trang thai dang nhap cua admin
	private function _check_login(){
        $controller = $this->uri->rsegment('1');
        $controller =strtolower($controller);
        $login = $this->session->userdata('login');
        if (!$login && $controller != 'login') {
        	redirect(admin_url('login'));
        }
        if ($login && $controller == 'login') {
        	redirect(admin_url('home'));
        }
     
	} 
}
?>