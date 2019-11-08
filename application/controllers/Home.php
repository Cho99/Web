<?php 
Class Home extends MY_Controller
{
	function index() {
		$this->load->model('Tour_model');
		$input = array();
		
		$tour = $this->Tour_model->get_list();
		$this->data['tour'] = $tour;

		$input['limit'] = array('4', '0');
        $input['order'] = array('discount', 'DESC');
        $tour_discount = $this->Tour_model->get_list($input);
        $this->data['tour_discount'] = $tour_discount;
        
        $input['limit'] = array('8', '0');
        $input['order'] = array('view', 'DESC');
        $tour_view = $this->Tour_model->get_list($input);
        $this->data['tour_view'] = $tour_view;



		$this->data['temp'] = 'site/home/index';
		$this->load->view('site/layout', $this->data);
	}
}
 ?>