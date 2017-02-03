<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Customer extends CI_Controller {
	
	public function __construct() {
		parent::__construct();

		if ($this->session->userdata('id_admin') !="10") {
			redirect('jangkrik/auth');
		}

		$this->load->model('jangkrik/Cs_model');
	}

	public function index(){
		if ($this->session->userdata('id_admin') !="10") {
			redirect('jangkrik/auth');
		}
	}

	public function insert(){
		$data['customer']=$this->Cs_model->get_data();
		$data['jt']='<i class="glyphicon glyphicon-save"></i> Insert Customer Service';
		$data['jd']='';
		$this->template->display('jangkrik/insert_customer',$data);
	}

	public function active(){
		$data['customer']=$this->Cs_model->get_data();
		$data['jt']='<i class="glyphicon glyphicon-ok-circle"></i> Active Customer Service';
		$data['jd']='';
		$this->template->display('jangkrik/active_customer',$data);
	}

	public function deactive(){
		$data['customer']=$this->Cs_model->get_data_deactive();
		$data['jt']='<i class="glyphicon glyphicon-remove-circle"></i> Deactivated Customer Service';
		$data['jd']='';
		$this->template->display('jangkrik/deactive_customer',$data);
	}

	public function save(){
		
		$jenis=$this->input->post('jenis');
		$nomor=$this->input->post('nomor');
		if($jenis==""){
			$this->session->set_flashdata('fail_login', 'Jenis Kosong !!!');
			redirect('jangkrik/customer/insert');
		}
		if($nomor==""){
			$this->session->set_flashdata('fail_login', 'Nomor Kosong !!!');
			redirect('jangkrik/customer/insert');
		}
		
		$data = array(
				'jenis'     => $jenis,
				'nomor'     => $nomor,
				'cek'      => '1'
				);

		$this->Cs_model->insert($data);
		$this->session->set_flashdata('pass_login', 'Data Is Saved !!!');
		redirect('jangkrik/customer/insert');
	}

	public function update_active($id){
		//var_dump($id);die();
		$this->Cs_model->update_active($id);
		$this->session->set_flashdata('pass_login', 'Data Is Changed !!!');
		redirect('jangkrik/customer/deactive');
	}

	public function update_deactive($id){
		//var_dump($id);die();
		$this->Cs_model->update_deactive($id);
		$this->session->set_flashdata('pass_login', 'Data Is Changed !!!');
		redirect('jangkrik/customer/active');
	}
}