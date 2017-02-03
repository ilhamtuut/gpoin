<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function index() {

		$this->load->view('jangkrik/login');
            
	}

	public function cek_login() {
		
		$data = array('username' => $this->input->post('username', TRUE),
						'password' => md5($this->input->post('password', TRUE))
			);

		$hasil = $this->membernya_model->cek_admin($data);
		if ($hasil->num_rows()==0){
		  $hasil = $this->si_membernya_model->cek_admin($data);
		}

        if($hasil->num_rows() == 1) {
            foreach ($hasil->result() as $sess) {
				$sess_dat['logged_in'] = TRUE;
				$sess_dat['id_admin'] = $sess->id_user;
				$sess_dat['username'] = $sess->username;
				$sess_dat['admin'] = $sess->username;
				//$sess_data['level'] = $sess->level;
				$this->session->set_userdata($sess_dat);
			}
			if($this->session->userdata('id_admin') == '10'){
				$this->session->set_flashdata('pass_login', 'Selamat Datang, Anda Telah Berhasil Login Dengan Username '.$this->session->userdata('admin').'');
				redirect('jangkrik/home');
            	return TRUE;
        	}else{
        		$this->session->set_flashdata('fail_login', 'Anda Gagal Login, Silahkan Periksa Username, Password dan Coba Lagi');
		   		redirect('jangkrik/auth', 'refresh');
            	return false;
        	}
       	}else{
		   $this->session->set_flashdata('fail_login', 'Anda Gagal Login, Silahkan Periksa Username, Password dan Coba Lagi');
		   redirect('jangkrik/auth', 'refresh');
            return false;
		}
	}

	public function logout(){
		$this->session->unset_userdata('logged_in');
		$this->session->unset_userdata('id_user');
		$this->session->unset_userdata('username');
		$this->session->sess_destroy();
		
		redirect('jangkrik/auth','refresh');
		}

}

?>