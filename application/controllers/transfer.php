<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Transfer extends CI_Controller {

	public function __construct() {
		parent::__construct();

		$this->load->helper('text');
		$this->load->library('template');
	}

	public function index(){
		if ($this->session->userdata('id_admin') !="10") {
			redirect('auth');
		}else{
		
		$data['transaksi']=$this->transaksinya_model->get_data();
		$data['transaksi1']=$this->si_transaksinya_model->get_data();
		$data['jt']='<i class="glyphicon glyphicon-transfer"></i> Transfer Poin';
		$data['jd']='';
		$this->template->display('haltransferpoin',$data);
	}
	}

	public function ketransfer(){
		if ($this->session->userdata('id_admin') !="10") {
			redirect('auth');
		}else{
		
		$data['jt']='<i class="glyphicon glyphicon-transfer"></i> Transfer Poin';
		$data['jd']='';
		$this->template->display('transferpoin',$data);
	}
	}

	public function validasi(){
		
		$tipe =$this->input->post('tipe');
		$jmlpoin =$this->input->post('jmlpoin');
		if($tipe=="G-NETWORK"){

			$jmlpoin =$this->input->post('jmlpoin');
			if(! preg_match('/^[0-9.\s+]+$/',$jmlpoin)){
			$this->session->set_flashdata('fail_login', 'Poin Tidak Boleh Kosong dan Tidak Boleh ada Karakter (-,+/)');
					   redirect('transfer');
			            return false;
	        }else{
	        	// cek data member
				$data = array('username' => $this->input->post('username', TRUE),
								'password' => md5($this->input->post('password', TRUE))
					);

				$this->load->model('membernya_model');
				
				$hasil = $this->membernya_model->cek_data($data);
		    	
		        if($hasil->num_rows() == 1) {
		        	$sess_array = array();
		            foreach($hasil->result() as $sess){
		                
						$sess_data['id_user'] = $sess->id_user;
						$sess_data['username'] = $sess->username;
						$sess_data['tipe'] =$this->input->post('tipe');
						$sess_data['jmlpoin'] =$this->input->post('jmlpoin');
						$sess_data['username'] =$this->input->post('username');
						
		            	$this->session->set_userdata($sess_data);
		            	
		            }
	            	
					$this->session->set_flashdata('info', 'Masukkan Password Kembali');
					redirect('transfer/ketransfer');
		            return TRUE;
		       	}else {
				   $this->session->set_flashdata('fail_login', 'Maaf, Data Tidak Ada Mohon Periksan Username dan Password !!!');
				   redirect('transfer');
		            return false;
		       	}
   			}
			
        }elseif($tipe=="G-POIN"){
			$jmlpoin =$this->input->post('jmlpoin');
			if(! preg_match('/^[0-9.\s+]+$/',$jmlpoin)){
			$this->session->set_flashdata('fail_login', 'Poin Tidak Boleh Kosong dan Tidak Boleh ada Karakter (-,+/)');
					   redirect('transfer');
			            return false;
	        }else{
	        	//cek data member
			$data = array('username' => $this->input->post('username', TRUE),
							'password' => md5($this->input->post('password', TRUE))
				);

			$this->load->model('si_membernya_model');
			
			$hasil = $this->si_membernya_model->cek_data($data);
	    	
	        if($hasil->num_rows() == 1) {
	            $sess_array = array();
	            foreach($hasil->result() as $sess){
	                //$sess_data['logged_in'] = TRUE ;
					$sess_data['id_user'] = $sess->id_user;
					$sess_data['username'] = $sess->username;
					$sess_data['tipe'] =$this->input->post('tipe');
					$sess_data['jmlpoin'] =$this->input->post('jmlpoin');
					$sess_data['username'] =$this->input->post('username');

	            	$this->session->set_userdata($sess_data);
	            	
	            }
	            //end cek data member

					$this->session->set_flashdata('info', 'Masukkan Password Kembali');
					redirect('transfer/ketransfer');
		            return TRUE;
		       	}else {
				   $this->session->set_flashdata('fail_login', 'Maaf, Data Tidak Ada Mohon Periksan Username dan Password !!!');
				   redirect('transfer');
		            return false;
		       	}
   			}
		}else{
   			$this->session->set_flashdata('fail_login', 'Pilih Tipe G-POIN Dengan Benar');
			redirect('transfer');
			return false;

   			}
	}
	
}