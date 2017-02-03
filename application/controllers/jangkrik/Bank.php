<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Bank extends CI_Controller {
	
	public function __construct() {
		parent::__construct();

		if ($this->session->userdata('id_admin') !="10") {
			redirect('jangkrik/auth');
		}

		$this->load->model('jangkrik/Bank_model');
		$this->load->model('jangkrik/Bank_member_model');
	}

	public function index(){
		if ($this->session->userdata('id_admin') !="10") {
			redirect('jangkrik/auth');
		}
	}

	public function insert_bank(){
		$data['bank']= $this->Bank_model->get_data();

		$data['jt']='<i class="glyphicon glyphicon-save"></i> Insert Admin Bank';
		$data['jd']='';
		$this->template->display('jangkrik/insert_bank',$data);

	}

	public function active_bank(){
		$data['bank']= $this->Bank_model->get_data();
		$data['jt']='<i class="glyphicon glyphicon-ok-circle"></i> Active Admin Bank';
		$data['jd']='';
		$this->template->display('jangkrik/active_bank',$data);
	}

	public function deactive_bank(){
		$data['bank']= $this->Bank_model->get_data_deactive();
		$data['jt']='<i class="glyphicon glyphicon-remove-circle"></i> Deactivated Admin Bank';
		$data['jd']='';
		$this->template->display('jangkrik/deactive_bank',$data);
	}

	public function save_bank(){
		$atasnama=$this->input->post('atasnama');
		$bank=$this->input->post('bank');
		$kode=$this->input->post('norek');
		if($atasnama==""){
			$this->session->set_flashdata('fail_login', 'Atas Nama Kosong !!!');
			redirect('jangkrik/bank/insert_bank');
		}
		if($bank==""){
			$this->session->set_flashdata('fail_login', 'Nama Bank Kosong !!!');
			redirect('jangkrik/bank/insert_bank');
		}
		if($kode==""){
			$this->session->set_flashdata('fail_login', 'Nomer Rekening Kosong !!!');
			redirect('jangkrik/bank/insert_bank');
		}

		$data = array(
				'atasnama' => $atasnama,
				'bank'     => $bank,
				'no_rek'   => $kode,
				'cek'      => '1'
				);

		$this->Bank_model->insert($data);
		$this->session->set_flashdata('pass_login', 'Data Is Saved !!!');
		redirect('jangkrik/bank/insert_bank');
	}

	public function insert_bank_member(){
		$data['bank']= $this->Bank_member_model->get_data();
		$data['jt']='<i class="glyphicon glyphicon-save"></i> Insert Nama Bank';
		$data['jd']='';
		$this->template->display('jangkrik/insert_bank_member',$data);
	}

	public function active_bank_member(){
		$data['bank']= $this->Bank_member_model->get_data();
		$data['jt']='<i class="glyphicon glyphicon-ok-circle"></i> Active Bank';
		$data['jd']='';
		$this->template->display('jangkrik/active_bank_member',$data);
	}

	public function deactive_bank_member(){
		$data['bank']= $this->Bank_member_model->get_data_deactive();
		$data['jt']='<i class="glyphicon glyphicon-remove-circle"></i> Deactivated  Bank ';
		$data['jd']='';
		$this->template->display('jangkrik/deactive_bank_member',$data);
	}

	public function save_bank_member(){
		
		$bank=$this->input->post('bank');
		
		if($bank==""){
			$this->session->set_flashdata('fail_login', 'Nama Bank Kosong !!!');
			redirect('jangkrik/bank/insert_bank_member');
		}
		
		$data = array(
				'bank'     => $bank,
				'cek'      => '1'
				);

		$this->Bank_member_model->insert($data);
		$this->session->set_flashdata('pass_login', 'Data Is Saved !!!');
		redirect('jangkrik/bank/insert_bank_member');
	}

	public function update_active_bank($id){
		//var_dump($id);die();
		$this->Bank_model->update_active($id);
		$this->session->set_flashdata('pass_login', 'Data Is Changed !!!');
		redirect('jangkrik/bank/deactive_bank');
	}

	public function update_deactive_bank($id){
		//var_dump($id);die();
		$this->Bank_model->update_deactive($id);
		$this->session->set_flashdata('pass_login', 'Data Is Changed !!!');
		redirect('jangkrik/bank/active_bank');
	}

	public function update_active($id){
		//var_dump($id);die();
		$this->Bank_member_model->update_active($id);
		$this->session->set_flashdata('pass_login', 'Data Is Changed !!!');
		redirect('jangkrik/bank/deactive_bank_member');
	}

	public function update_deactive($id){
		//var_dump($id);die();
		$this->Bank_member_model->update_deactive($id);
		$this->session->set_flashdata('pass_login', 'Data Is Changed !!!');
		redirect('jangkrik/bank/active_bank_member');
	}
}