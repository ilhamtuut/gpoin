<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct() {
		parent::__construct();

		$this->load->helper('text');
		$this->load->library('template');
	}

	public function index(){
		if ($this->session->userdata('id_admin') !="10") {
			redirect('jangkrik/auth');
		}else{	
		$data['jumlah_member']=$this->membernya_model->count_all();
		$data['jumlah_simember']=$this->si_membernya_model->count_all();
		$data['jumlah_posting']=$this->posting_model->count_all();
		$data['jumlah_siposting']=$this->si_posting_model->count_all();
		$data['jumlah_poin_admin']=$this->si_posting_model->poin_admin();
		$data['jt']='<i class="fa fa-dashboard"></i> Dashboard';
		$data['jd']='';
		$this->template->display('jangkrik/dashboard',$data);
        }   
	}

	public function save_history(){
		date_default_timezone_set("Asia/Jakarta");
		$tgl=date('Y-m-d H:i:s');
		//insert history admin
		$data = array(
			'username' => $this->session->userdata('admin'),
			'kegiatan'=> 'TRANSFER G POIN KE '.$this->input->post('username'),
			'tgl'=> $tgl
			);
	
		$this->melakukan_model->insert_data($data);
	}

	public function admin_poin(){
		
		$poin 	=$this->si_posting_model->poin_admin();
		$jml    =$poin->jml;
		$jmlpoin=$this->input->post('jmlpoin');
		$total 	= ($jml - $jmlpoin);
		if($jml < $jmlpoin){
			$this->session->set_flashdata('fail_login', 'Maaf transfer gagal, Poin Admin Kurang dari poin yang ditambahkan !!!');
		   	redirect('jangkrik/transfer');
	        return false;
		}else{
		$data   = array('jml'=>$total,
						'status' => date('Y-m-d')
						);
		
		$this->si_posting_model->update_poin_admin($data);
		}
	}

	public function history(){
		if ($this->session->userdata('id_admin') !="10") {
			redirect('jangkrik/auth');
		}else{
		$this->load->model('melakukan_model');
		$data['admin'] = $this->melakukan_model->get_data();
		$data['jt']='<i class="fa fa-user"></i> History Admin';
		$data['jd']='';

		$this->template->display('jangkrik/history_admin',$data);
		}
	}


	public function transfer(){

		$tipe = $this->input->post('tipe');
		$jmlpoin = $this->input->post('jmlpoin');
		$username = $this->input->post('username');
		$password = md5($this->input->post('password'));

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
						$sess_array = array();
			            foreach($hasil1->result() as $sess){
							$id_user = $sess->id_user;
							$username = $sess->username;	
			            }
			            //var_dump($id_user);die();
			            //cek data posting
							$this->load->model('posting_model');	
							$hasil = $this->posting_model->cek_data($id_user);
						    	//var_dump($hasil); die(); /// salah nen kene
						    if($hasil->num_rows() == 1) {
						        $sess_array = array();
						            foreach($hasil->result() as $sess){
										$id_user = $sess->id_user;
										$id_posting = $sess->id_posting;
										$jml = $sess->jml;	
						            }
						            
						        	// update data posting
						        if($id_user=='10'){
									$this->session->set_flashdata('fail_login', 'Maaf Admin tidak bisa menambahkan poin sendiri');
									redirect('jangkrik/transfer');
			            		}else{
				            		//poin admin berkurang
									$this->admin_poin();
									///
									$total 	= ($jml + $jmlpoin);
									$data  = array(
										'jml'=>$total,
										'status' => date('Y-m-d')
										);
									//var_dump($data);die();
									$this->posting_model->update_poin_member($id_user,$data);
									

									// insert data transaksi
									date_default_timezone_set("Asia/Jakarta");
									$tgl=date('Y-m-d H:i:s');
									$data = array(
										'id_user' => $id_user,
										'id_posting'=>$id_posting,
										'tgl' => date('Ymd'),
										'kredit'=> $jmlpoin,
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
									redirect('jangkrik/transfer');
						            return TRUE;
			            		}
					            	
								$this->session->set_flashdata('pass_login', 'Data Ada');
								redirect('jangkrik/transfer');
						        return TRUE;
						    }else {

						    	//poin admin berkurang
								$this->admin_poin();

						    	// insert data posting
						    	$data = array(
						    		'id_user' => $id_user,
						    		'tgl' => date('Ymd'),
						    		'jml'=> $jmlpoin,
						    		'ket'=> 'G POIN',
						    		'status' => date('Y-m-d')
						    	 );
						    	$this->posting_model->insert_data($data);
						    	
						    	// insert data transaksi
						 
				            	date_default_timezone_set("Asia/Jakarta");
								$tgl=date('Y-m-d H:i:s');
			            		//$id_posting =$this->posting_model->poin_member();
			            		$hasil = $this->posting_model->cek_data($id_user);
			            		if($hasil->num_rows() == 1) {
							        $sess_array = array();
							            foreach($hasil->result() as $sess){
											$id_user = $sess->id_user;
											$id_posting = $sess->id_posting;	
							            }
									$data = array(
										'id_user' => $id_user,
										'id_posting'=>$id_posting,
										'tgl' => date('Ymd'),
										'kredit'=> $jmlpoin,
										'ket'=> 'TRANSFER G POIN',
										'status' => 'VALID',
										'id_user2'=>'10',
										'debit'=>'0',
										'maxtime'=> $tgl
										);

									$this->transaksinya_model->insert_data($data);
								}
								$this->session->set_flashdata('pass_login', 'Poin berhasil ditambahkan');
								redirect('jangkrik/transfer');
						        return false;   
						    }
			            	//end cek data posting

							$this->session->set_flashdata('pass_login', 'Data Ada');
							redirect('jangkrik/transfer');
				            return TRUE;
						//
					}else{
						$this->session->set_flashdata('fail_login', 'Maaf Data Salah');
					redirect('jangkrik/transfer');
					return false;
					}
				}elseif($tipe=="G-POIN"){
					$hasil2 = $this->si_membernya_model->cek_data($data);
					if($hasil2->num_rows()==1){
						//
						$sess_array = array();
			            foreach($hasil2->result() as $sess){
							$id_user = $sess->id_user;
							$username = $sess->username;	
			            }
			            //cek data posting
							$this->load->model('posting_model');	
							$hasil = $this->si_posting_model->cek_data($id_user);
						    	//var_dump($hasil); die(); /// salah nen kene
						    if($hasil->num_rows() == 1) {
						        $sess_array = array();
						            foreach($hasil->result() as $sess){
										$id_user = $sess->id_user;
										$id_posting = $sess->id_posting;
										$jml = $sess->jml;	
						            }
						            
						// update data posting admin
						        if($id_user=='10'){
									$this->session->set_flashdata('fail_login', 'Maaf Admin tidak bisa menambahkan poin sendiri');
									redirect('jangkrik/transfer');
			            		}else{
			            			//poin admin berkurang
									$this->admin_poin();

				        //update poin member
									$total 	= ($jml + $jmlpoin);
									$data  = array(
										'jml'=>$total,
										'status' => date('Y-m-d')
										);
									
									$this->si_posting_model->update_poin_member($id_user,$data);
									

						// insert data transaksi member
									date_default_timezone_set("Asia/Jakarta");
									$tgl=date('Y-m-d H:i:s');
									$data = array(
										'id_user' => $id_user,
										'id_posting'=>$id_posting,
										'tgl' => date('Ymd'),
										'kredit'=> $jmlpoin,
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
									redirect('jangkrik/transfer');
						            return TRUE;
			            		}
					            	
								$this->session->set_flashdata('pass_login', 'Data Ada');
								redirect('jangkrik/transfer');
						        return TRUE;
						    }else {
						    	//poin admin berkurang
								$this->admin_poin();

						// insert data posting
						    	
						    	$data = array(
						    		'id_user' => $id_user,
						    		'tgl' => date('Ymd'),
						    		'jml'=> $jmlpoin,
						    		'ket'=> 'G POIN',
						    		'status' => date('Y-m-d')
						    	 );
						    	
						    	$this->si_posting_model->insert_data($data);
						    	

						// insert data transaksi
						 
				            	date_default_timezone_set("Asia/Jakarta");
								$tgl=date('Y-m-d H:i:s');
			            		
			            		$hasil = $this->si_posting_model->cek_data($id_user);
			            		if($hasil->num_rows() == 1) {
							        $sess_array = array();
							            foreach($hasil->result() as $sess){
											$id_user = $sess->id_user;
											$id_posting = $sess->id_posting;	
							            }
			            		
									$data = array(
										'id_user' => $id_user,
										'id_posting'=>$id_posting,
										'tgl' => date('Ymd'),
										'kredit'=> $jmlpoin,
										'ket'=> 'TRANSFER G POIN',
										'status' => 'VALID',
										'id_user2'=>'10',
										'debit'=>'0',
										'maxtime'=> $tgl
										);

									$this->si_transaksinya_model->insert_data($data);
								}
								$this->session->set_flashdata('pass_login', 'Poin berhasil ditambahkan');
								redirect('jangkrik/transfer');
						        return false;   
						    }
			            	//end cek data posting

							$this->session->set_flashdata('pass_login', 'Data Ada');
							redirect('jangkrik/transfer');
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
				$this->session->set_flashdata('fail_login', 'Maaf, Gagal Transfer Password Salah !!!');
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