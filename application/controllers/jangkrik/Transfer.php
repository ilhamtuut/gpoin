<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Transfer extends CI_Controller {

	public function __construct() {
		parent::__construct();

		$this->load->helper('text');
		$this->load->library('template');
	}

	public function index(){
		if ($this->session->userdata('id_admin') !="10") {
			redirect('jangkrik/auth');
		}else{
		$data['jumlah_poin_admin']=$this->si_posting_model->poin_admin();
		$data['transaksi']=$this->transaksinya_model->get_data();
		$data['transaksi1']=$this->si_transaksinya_model->get_data();
		$data['jt']='<i class="glyphicon glyphicon-transfer"></i> Transfer Poin';
		$data['jd']='';
		$this->template->display('jangkrik/haltransferpoin',$data);
		}
	}

	public function validasi(){
		//$this->template->display('transferpoin',$data);
		$tipe =$this->input->post('tipe');
		if($tipe=="G-NETWORK"){	
        }elseif($tipe=="G-POIN"){
		}else{
   			$this->session->set_flashdata('fail_login', 'Pilih Tipe G-POIN Dengan Benar');
			redirect('jangkrik/transfer');
			return false;

   		}

   		$jmlpoin =$this->input->post('jmlpoin');
		if(! preg_match('/^[0-9.\s+]+$/',$jmlpoin)){
			$this->session->set_flashdata('fail_login', 'Poin Tidak Boleh Kosong dan Tidak Boleh ada Karakter (-,+/)');
			redirect('jangkrik/transfer');
		    return false;
	    }

	    $data = array('username' => $this->input->post('username', TRUE));				
	    $hasil = $this->membernya_model->cek_data($data);
		if ($hasil->num_rows()==0){
		  $hasil = $this->si_membernya_model->cek_data($data);
		}
		if($hasil ->num_rows() == 1) {
			$pass = array('trx_password' => md5($this->input->post('password', TRUE)));			
		    $hasil = $this->membernya_model->cek_pass_admin($pass);
			if ($hasil->num_rows()==0){
			  $hasil = $this->si_membernya_model->cek_pass_admin($pass);
			}
			if($hasil ->num_rows() == 1) {
			    //
			    $tipe =$this->input->post('tipe');
				if($tipe=="G-NETWORK"){	
					$hasil1 = $this->membernya_model->cek_data($data);
					if($hasil1->num_rows()==1){
						//
						$data['jt']='<i class="glyphicon glyphicon-transfer"></i> Transfer Poin';
						$data['jd']='';
						$data['tipe'] = $this->input->post('tipe');
					    $data['jmlpoin'] = $this->input->post('jmlpoin');
					    $data['username'] = $this->input->post('username');
					    $data['jumlah_poin_admin']=$this->si_posting_model->poin_admin();     		
						$this->template->display('jangkrik/transferpoin',$data);		            
						return TRUE;
						//
					}else{
						$this->session->set_flashdata('fail_login', 'Maaf Data Salah');
					redirect('transfer');
					return false;
					}
				}elseif($tipe=="G-POIN"){
					$hasil2 = $this->si_membernya_model->cek_data($data);
					if($hasil2->num_rows()==1){
						//
						$data['jt']='<i class="glyphicon glyphicon-transfer"></i> Transfer Poin';
						$data['jd']='';
						$data['tipe'] = $this->input->post('tipe');
					    $data['jmlpoin'] = $this->input->post('jmlpoin');
					    $data['username'] = $this->input->post('username');
					    $data['jumlah_poin_admin']=$this->si_posting_model->poin_admin();      		
						$this->template->display('jangkrik/transferpoin',$data);		            
						return TRUE;
						//
					}else{
						$this->session->set_flashdata('fail_login', 'Maaf Data Salah');
					redirect('jangkrik/transfer');
					return false;
					}
				}else{
					$this->session->set_flashdata('fail_login', 'Maaf Data Salah');
					redirect('jangkrik/transfer');
					return false;
				}
				//
			}else{
				$this->session->set_flashdata('fail_login', 'Maaf, Password Salah !!!');
				redirect('jangkrik/transfer');
			    return false;
			}
	   	}else {
		   	$this->session->set_flashdata('fail_login', 'Maaf, Username Data Tidak Ada !!!');
		   	redirect('jangkrik/transfer');
	        return false;
		}
	}
	
}