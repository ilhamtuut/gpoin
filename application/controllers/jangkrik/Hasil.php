<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Hasil extends CI_Controller {

	public function total(){
		if ($this->session->userdata('id_admin') !="10") {
			redirect('jangkrik/auth');
		}else{

			$data['dat']=$this->beli_model->get_data_accept();
			$data['jt']='<i class="glyphicon glyphicon-download-alt"></i> Total Penghasilan';
			$data['jd']='';
			$this->template->display('jangkrik/totalhasil',$data);
		}

	}

	public function bydate() {
		if ($this->session->userdata('id_admin') !="10") {
			redirect('jangkrik/auth');
		}else{
			$tglawal = $this->input->post('tglawal').' 00:00:00';
			$tglakhir = $this->input->post('tglakhir').' 23:59:59';
			
			if ($tglawal == "" || $tglakhir == "") {
				//$this->session->set_flashdata('fail_login', 'Both date fields are required');
				redirect('jangkrik/hasil/total');
				return false;
			} else {
				$data['dat']=$this->beli_model->get_data_bydate($tglawal,$tglakhir);
				//var_dump($data);die();
				$data['jt']='<i class="glyphicon glyphicon-download-alt"></i> Total Penghasilan';
				$data['jd']='';
				$this->template->display('jangkrik/totalhasil',$data);
			}
		}

	}

	public function poin_keluar(){
		if ($this->session->userdata('id_admin') !="10") {
			redirect('jangkrik/auth');
		}else{
		
		$data['jt']='<i class="glyphicon glyphicon-export"></i> Total Poin Keluar';
		$data['jd']='';
		$data['transaksi']=$this->transaksinya_model->get_data_all();
		$data['transaksi1']=$this->si_transaksinya_model->get_data_all();

		$this->template->display('jangkrik/jumlahpoin_out',$data);
		}
	}

	public function poin_out() {
		if ($this->session->userdata('id_admin') !="10") {
			redirect('jangkrik/auth');
		}else{
			$tglawal = $this->input->post('tglawal');
			$tglakhir = $this->input->post('tglakhir');
			$ket = $this->input->post('ket');
			
			if ($tglawal == "" || $tglakhir == "") {
				$data['transaksi']=$this->transaksinya_model->get_data_byket($ket);
				$data['transaksi1']=$this->si_transaksinya_model->get_data_byket($ket);
				
				$data['jt']='<i class="glyphicon glyphicon-download-alt"></i> Total Poin Keluar';
				$data['jd']='';
				$this->template->display('jangkrik/jumlahpoin_out',$data);
			}elseif($ket==""){
				$data['transaksi']=$this->transaksinya_model->get_data_bydate($tglawal,$tglakhir);
				$data['transaksi1']=$this->si_transaksinya_model->get_data_bydate($tglawal,$tglakhir);
				
				$data['jt']='<i class="glyphicon glyphicon-download-alt"></i> Total Poin Keluar';
				$data['jd']='';
				$this->template->display('jangkrik/jumlahpoin_out',$data);
			}else{
				$data['transaksi']=$this->transaksinya_model->get_data_bydaket($tglawal,$tglakhir,$ket);
				$data['transaksi1']=$this->si_transaksinya_model->get_data_bydaket($tglawal,$tglakhir,$ket);
				
				$data['jt']='<i class="glyphicon glyphicon-download-alt"></i> Total Poin Keluar';
				$data['jd']='';
				$this->template->display('jangkrik/jumlahpoin_out',$data);
			}
		}
	}

	public function poin_masuk(){
		if ($this->session->userdata('id_admin') !="10") {
			redirect('jangkrik/auth');
		}else{
			$data['jt']='<i class="glyphicon glyphicon-import"></i> Total Poin Masuk';
			$data['jd']='';
			$data['transaksi']=$this->transaksinya_model->get_data_all2();
			$data['transaksi1']=$this->si_transaksinya_model->get_data_all2();
			$this->template->display('jangkrik/jumlahpoin_in',$data);
		}
	}

	public function poin_in(){
		if ($this->session->userdata('id_admin') !="10") {
			redirect('jangkrik/auth');
		}else{
			$tglawal = $this->input->post('tglawal');
			$tglakhir = $this->input->post('tglakhir');
			//var_dump($tglawal,$tglakhir);die();
			if ($tglawal == "" || $tglakhir == "") {
				//$this->session->set_flashdata('fail_login', 'Both date fields are required');
				redirect('jangkrik/hasil/poin_masuk');
				return false;
			} else {

				$data['transaksi']=$this->transaksinya_model->get_data_bydate_in($tglawal,$tglakhir);
				$data['transaksi1']=$this->si_transaksinya_model->get_data_bydate_in($tglawal,$tglakhir);	
				$data['jt']='<i class="glyphicon glyphicon-download-alt"></i> Total Poin Keluar';
				$data['jd']='';
				$this->template->display('jangkrik/jumlahpoin_in',$data);
			}
		}
	}
	
}