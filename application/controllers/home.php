<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct() {
		parent::__construct();

		$this->load->helper('text');
		$this->load->library('template');
		$this->load->model('melakukan_model');
	}

	public function index(){
		if ($this->session->userdata('id_admin') !="10") {
			redirect('auth');
		}else{	
		$data['jumlah_member']=$this->membernya_model->count_all();
		$data['jumlah_simember']=$this->si_membernya_model->count_all();
		$data['jumlah_posting']=$this->posting_model->count_all();
		$data['jumlah_siposting']=$this->si_posting_model->count_all();
		$data['jt']='<i class="fa fa-dashboard"></i> Dashboard';
		$data['jd']='';
		$this->template->display('dashboard',$data);
        }   
	}

	public function save_history(){
		//insert history admin
		date_default_timezone_set("Asia/Jakarta");
		$tgl=date('Y-m-d H:i:s');
		$data = array(
			'username' => $this->session->userdata('admin'),
			'kegiatan'=> 'TRANSFER G POIN KE '.$this->session->userdata('username'),
			'tgl'=> $tgl
			);

		$this->melakukan_model->insert_data($data);
	}

	public function transfer(){
		
		
		$tipe =$this->session->userdata('tipe');
		$jmlpoin =$this->session->userdata('jmlpoin');
		//var_dump($jmlpoin);die();
		if($tipe=="G-NETWORK"){

			$jmlpoin =$this->session->userdata('jmlpoin');
			if(! preg_match('/^[0-9.\s+]+$/',$jmlpoin)){
			$this->session->set_flashdata('fail_login', 'Poin Tidak Boleh Kosong dan Tidak Boleh ada Karakter (-,+/)');
					   redirect('transfer/ketransfer');
			            return false;
	        }else{
	        	// cek data member
				$data = array('username' => $this->session->userdata('username', TRUE),
								'password' => md5($this->input->post('password', TRUE))
					);

				$this->load->model('membernya_model');
				
				$hasil = $this->membernya_model->cek_data($data);
		    	
		        if($hasil->num_rows() == 1) {
		        	$sess_array = array();
		            foreach($hasil->result() as $sess){
		                
						$sess_data['id_user'] = $sess->id_user;
						$sess_data['username'] = $sess->username;
						
		            	$this->session->set_userdata($sess_data);
		            	
		            }
	            	//cek data posting
		            $data = array('id_user' => $this->session->userdata('id_user', TRUE)
						);

					$this->load->model('posting_model');
						
					$hasil = $this->posting_model->cek_data($data);
				    	
				    if($hasil->num_rows() == 1) {
				        $sess_array = array();
				        foreach($hasil->result() as $sess){
				                
							$sess_data['id_user'] = $sess->id_user;
							$sess_data['id_posting'] = $sess->id_posting;
								
				            $this->session->set_userdata($sess_data);
				            	
				        }
			            	//var_dump($sess_data); die();
				        	// update data posting
				        if($this->session->userdata('id_user')=='10'){
	            			$this->load->model('posting_model');
	            			$poin 	=$this->posting_model->poin_admin();
							$jmlpoin 	=$this->session->userdata('jmlpoin');
							$total 		= ($poin->jml - $jmlpoin);
							$data  = array(
								'jml'=>$total,
								'status' => date('Y-m-d')
								);
							
							$this->posting_model->update_poin_admin($data);
							// insert data transaksi
							date_default_timezone_set("Asia/Jakarta");
							$tgl=date('Y-m-d H:i:s');
							$data = array(
								'id_user' => '10',
								'id_posting'=>$this->session->userdata('id_posting'),
								'tgl' => date('Ymd'),
								'kredit'=> $this->session->userdata('jmlpoin'),
								'ket'=> 'TRANSFER G POIN',
								'status' => 'VALID',
								'id_user2'=>'10',
								'debit'=>'0',
								'maxtime'=> $tgl
								);

							$this->transaksinya_model->insert_data($data);

							// insert history
							$this->save_history();

							$this->session->set_flashdata('pass_login', 'Poin berhasil diupdate');
							redirect('transfer');
				            return TRUE;
		            	}else{
		            		$id_user=$this->session->userdata('id_user');
		            		//var_dump($sess_data); die();
		            		$this->load->model('posting_model');
	            			$poin 	=$this->posting_model->poin_member($id_user);
							$jmlpoin 	=$this->session->userdata('jmlpoin');
							$total 		= ($poin->jml + $jmlpoin);
							$data  = array(
								'jml'=>$total,
								'status' => date('Y-m-d')
								);
							
							$this->posting_model->update_poin_member($id_user,$data);
							//insert data transaksi
							date_default_timezone_set("Asia/Jakarta");
							$tgl=date('Y-m-d H:i:s');
							$data = array(
								'id_user' => $this->session->userdata('id_user'),
								'id_posting'=>$this->session->userdata('id_posting'),
								'tgl' => date('Ymd'),
								'kredit'=> $this->session->userdata('jmlpoin'),
								'ket'=> 'TRANSFER G POIN',
								'status' => 'VALID',
								'id_user2'=>'10',
								'debit'=>'0',
								'maxtime'=> $tgl
								);

							$this->transaksinya_model->insert_data($data);

							// insert history
							$this->save_history();

							$this->session->set_flashdata('pass_login', 'Poin berhasil ditambahkan');
							redirect('transfer');
				            return TRUE;
		            	}
			            	
						$this->session->set_flashdata('pass_login', 'Data Ada');
						redirect('transfer');
				        return TRUE;
				    }else {

				    	// insert data

				    	$data = array(
				    		'id_user' => $this->session->userdata('id_user'),
				    		'tgl' => date('Ymd'),
				    		'jml'=> $this->session->userdata('jmlpoin'),
				    		'ket'=> 'G POIN',
				    		'status' => date('Y-m-d')
				    	 );

				    	$this->posting_model->insert_data($data);

				    	// insert data transaksi
				    	date_default_timezone_set("Asia/Jakarta");
						$tgl=date('Y-m-d H:i:s');
				    	$id_posting =$this->posting_model->poin_member();
				    	$data = array(
								'id_user' => $this->session->userdata('id_user'),
								'id_posting'=>$id_posting->id_posting,
								'tgl' => date('Ymd'),
								'kredit'=> $this->session->userdata('jmlpoin'),
								'ket'=> 'TRANSFER G POIN',
								'status' => 'VALID',
								'id_user2'=>'10',
								'debit'=>'0',
								'maxtime'=> $tgl
								);

						$this->transaksinya_model->insert_data($data);

						// insert history
						$this->save_history();

						$this->session->set_flashdata('pass_login', 'Poin berhasil ditambahkan');
						redirect('transfer');
				        return false;   
				    }

	            	//end cek data posting

	            	
					$this->session->set_flashdata('pass_login', 'Data Ada');
					redirect('transfer');
		            return TRUE;
		       	}else {
				   $this->session->set_flashdata('fail_login', 'Maaf, Mohon Periksa Password');
				   redirect('transfer/ketransfer');
		            return false;
		       	}
   			}
			
        }elseif($tipe=="G-POIN"){
			$jmlpoin =$this->session->userdata('jmlpoin');
			if(! preg_match('/^[0-9.\s+]+$/',$jmlpoin)){
			$this->session->set_flashdata('fail_login', 'Poin Tidak Boleh Kosong dan Tidak Boleh ada Karakter (-,+/)');
					   redirect('transfer/ketransfer');
			            return false;
	        }else{
	        	//cek data member
			$data = array('username' => $this->session->userdata('username', TRUE),
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
					//$sess_data['level'] = $sess->level;
					//$this->session->set_userdata($sess_data);
	            	$this->session->set_userdata($sess_data);
	            	
	            }
	            //end cek data member

	            //cek data posting
	            	$data = array('id_user' => $this->session->userdata('id_user', TRUE)
						);

					$this->load->model('si_posting_model');
						
					$hasil = $this->si_posting_model->cek_data($data);
				    	
				    if($hasil->num_rows() == 1) {
				        $sess_array = array();
				        foreach($hasil->result() as $sess){
				                
							$sess_data['id_user'] = $sess->id_user;
							$sess_data['id_posting'] = $sess->id_posting;
								
				            $this->session->set_userdata($sess_data);
				            	
				        }
			            	//var_dump($sess_data); die();
				        	// update data posting
				        if($this->session->userdata('id_user')=='10'){
	            			$this->load->model('si_posting_model');
	            			$poin 	=$this->si_posting_model->poin_admin();
							$jmlpoin 	=$this->session->userdata('jmlpoin');
							$total 		= ($poin->jml - $jmlpoin);
							$data  = array(
								'jml'=>$total,
								'status' => date('Y-m-d')
								);
							
							$this->si_posting_model->update_poin_admin($data);

							// insert data transaksi
							date_default_timezone_set("Asia/Jakarta");
							$tgl=date('Y-m-d H:i:s');
							$data = array(
								'id_user' => '10',
								'id_posting'=>$this->session->userdata('id_posting'),
								'tgl' => date('Ymd'),
								'kredit'=> $this->session->userdata('jmlpoin'),
								'ket'=> 'TRANSFER G POIN',
								'status' => 'VALID',
								'id_user2'=>'10',
								'debit'=>'0',
								'maxtime'=> $tgl
								);

							$this->si_transaksinya_model->insert_data($data);

							// insert history
							$this->save_history();

							$this->session->set_flashdata('pass_login', 'Poin berhasil diupdate');
							redirect('transfer');
				            return TRUE;
	            		}else{
		            		$id_user=$this->session->userdata('id_user');
		            		//var_dump($sess_data); die();
		            		$this->load->model('si_posting_model');
	            			$poin 	=$this->si_posting_model->poin_member($id_user);
							$jmlpoin 	=$this->session->userdata('jmlpoin');
							$total 		= ($poin->jml + $jmlpoin);
							$data  = array(
								'jml'=>$total,
								'status' => date('Y-m-d')
								);
							
							$this->si_posting_model->update_poin_member($id_user,$data);

							// insert data transaksi
							date_default_timezone_set("Asia/Jakarta");
							$tgl=date('Y-m-d H:i:s');
							$data = array(
								'id_user' => $this->session->userdata('id_user'),
								'id_posting'=>$this->session->userdata('id_posting'),
								'tgl' => date('Ymd'),
								'kredit'=> $this->session->userdata('jmlpoin'),
								'ket'=> 'TRANSFER G POIN',
								'status' => 'VALID',
								'id_user2'=>'10',
								'debit'=>'0',
								'maxtime'=> $tgl
								);

							$this->si_transaksinya_model->insert_data($data);

							// insert history
							$this->save_history();

							$this->session->set_flashdata('pass_login', 'Poin berhasil ditambahkan');
							redirect('transfer');
				            return TRUE;
	            		}
			            	
						$this->session->set_flashdata('pass_login', 'Data Ada');
						redirect('transfer');
				        return TRUE;
				    }else {

				    	// insert data posting

				    	$data = array(
				    		'id_user' => $this->session->userdata('id_user'),
				    		'tgl' => date('Ymd'),
				    		'jml'=> $this->session->userdata('jmlpoin'),
				    		'ket'=> 'G POIN',
				    		'status' => date('Y-m-d')
				    	 );

				    	$this->si_posting_model->insert_data($data);

				    	// insert data transaksi
				    	//$id_user=$this->session->userdata('id_user');
		            	date_default_timezone_set("Asia/Jakarta");
						$tgl=date('Y-m-d H:i:s');
	            		$id_posting =$this->si_posting_model->poin_member();

							$data = array(
								'id_user' => $this->session->userdata('id_user'),
								'id_posting'=>$id_posting->id_posting,
								'tgl' => date('Ymd'),
								'kredit'=> $this->session->userdata('jmlpoin'),
								'ket'=> 'TRANSFER G POIN',
								'status' => 'VALID',
								'id_user2'=>'10',
								'debit'=>'0',
								'maxtime'=> $tgl
								);

							$this->si_transaksinya_model->insert_data($data);

							// insert history
							$this->save_history();

						$this->session->set_flashdata('pass_login', 'Poin berhasil ditambahkan');
						redirect('transfer');
				        return false;   
				    }
	            	//end cek data posting

					$this->session->set_flashdata('pass_login', 'Data Ada');
					redirect('transfer');
		            return TRUE;
		       	}else {
				   $this->session->set_flashdata('fail_login', 'Maaf, Mohon Periksa Password');
				   redirect('transfer/ketransfer');
		            return false;
		       	}
   			}

		}else{
   			$this->session->set_flashdata('fail_login', 'Pilih Tipe G-POIN Dengan Benar');
			redirect('transfer/ketransfer');
			return false;

   			}
   		
	}

}