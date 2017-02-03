<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Data_posting extends CI_Controller {
	private $limit=25;
	public function __construct() {
		parent::__construct();
		
		$this->load->helper('text');
	}

	public function index(){
		if ($this->session->userdata('id_admin') !="10") {
			redirect('jangkrik/auth');
		}else{
		$data['posting']=$this->posting_model->get_data();
		$data['posting2']=$this->si_posting_model->get_data();
		$data['jt']='<i class="glyphicon glyphicon-list-alt"></i> Data Posting';
		$data['jd']='';
		$this->template->display('jangkrik/dataposting',$data);
		}
	}
	
}