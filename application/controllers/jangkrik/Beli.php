<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Beli extends CI_Controller {

	public function index(){
		if ($this->session->userdata('id_admin') !="10") {
			redirect('jangkrik/auth');
		}
	}

	public function baru(){
		if ($this->session->userdata('id_admin') !="10") {
			redirect('jangkrik/auth');
		}else{
		$data['baru']=$this->beli_model->get_data_baru();
		$data['jt']='<i class="glyphicon glyphicon-download-alt"></i> Data Pembelian Baru';
		$data['jd']='';
		$this->template->display('jangkrik/belibaru',$data);
		}

	}

	public function masuk(){
		if ($this->session->userdata('id_admin') !="10") {
			redirect('jangkrik/auth');
		}else{
		$data['masuk']=$this->beli_model->get_data_masuk();
		$data['jt']='<i class="glyphicon glyphicon-edit"></i> Data Konfirmasi Pembelian';
		$data['jd']='';
		$this->template->display('jangkrik/belimasuk',$data);
		}

	}

	public function accept(){
		if ($this->session->userdata('id_admin') !="10") {
			redirect('jangkrik/auth');
		}else{
		$data['accept']=$this->beli_model->get_data_accept();
		$data['jt']='<i class="glyphicon glyphicon-check"></i> Data Konfirmasi Pembelian ACC';
		$data['jd']='';
		$this->template->display('jangkrik/beliaccept',$data);
		}
		
	}

	public function cancel(){
		if ($this->session->userdata('id_admin') !="10") {
			redirect('jangkrik/auth');
		}else{
		$data['cancel']=$this->beli_model->get_data_cancel();
		$data['jt']='<i class="glyphicon glyphicon-remove"></i> Data Konfirmasi Pembelian Cancel';
		$data['jd']='';
		$this->template->display('jangkrik/belicancel',$data);
		}
		
	}

	public function update_accept($id){
		
		$data=$this->beli_model->get_iduser($id);
		$id_user=$data->id_user;
		$poin=$data->poin;
		$username=$data->username;
		$email=$data->email;

		// Cek Poin Admin
		$poinadmin 	= $this->si_posting_model->poin_admin();
		$jml    	= $poinadmin->jml;
		$total 		= ($jml - $poin);
		if($jml < $poin){
			$this->session->set_flashdata('fail_login', 'Maaf gagal konfirmasi pembelian, Poin Admin Kurang dari poin yang dibeli !!!');
		   	redirect('jangkrik/beli/masuk');
	        return false;
		}else{
			//Update Poin admin		
			$data   = array('jml'=>$total,
							'status' => date('Y-m-d')
							);
			
			$this->si_posting_model->update_poin_admin($data);
			}

			// Update Data Poin
			$hasil = $this->si_posting_model->cek_data($id_user);				    	
			if($hasil->num_rows() == 1) {
				$sess_array = array();
				foreach($hasil->result() as $sess){
						$id_user = $sess->id_user;
						$id_posting = $sess->id_posting;
						$jml = $sess->jml;	
				}

				$total=$jml+$poin;
				$data  = array('jml'=>$total,
								'status' => date('Y-m-d'));
				$this->si_posting_model->update_poin_member($id_user,$data);
				$this->beli_model->update_accept($id);
				$this->sendMail($username,$poin,$email);
				//insert transaksi
				date_default_timezone_set("Asia/Jakarta");
				$tgl=date('Y-m-d H:i:s');
				$data = array(
							'id_user' => $id_user,
							'id_posting'=>$id_posting,
							'tgl' => date('Ymd'),
							'kredit'=> $poin,
							'ket'=> 'BUY G POIN',
							'status' => 'VALID',
							'id_user2'=>'10',
							'debit'=>'0',
							'maxtime'=> $tgl
							);

				$this->si_transaksinya_model->insert_data($data);

				// insert history
				date_default_timezone_set("Asia/Jakarta");
				$tgl=date('Y-m-d H:i:s');
				//insert history admin
				$data = array(
					'username' => $this->session->userdata('admin'),
					'kegiatan'=> 'Menerima Pembelian Poin dari '.$username,
					'tgl'=> $tgl
					);
			
				$this->melakukan_model->insert_data($data);

				
				$this->session->set_flashdata('pass_login', 'Berhasil konfirmasi pembelian dan poin sudah ditambahkan');
				redirect('jangkrik/beli/masuk');

			}else{

				//Update Poin admin		
				$data   = array('jml'=>$poin,
								'status' => date('Y-m-d')
								);
				
				$this->si_posting_model->update_poin_admin($data);
				//insert Data Poin
				$data = array(
						    'id_user' => $id_user,
						    'tgl' => date('Ymd'),
						    'jml'=> $poin,
						    'ket'=> 'G POIN',
						   	'status' => date('Y-m-d')
						    );
						    	
				$this->si_posting_model->insert_data($data);
				$this->beli_model->update_accept($id);
				$this->sendMail($username,$poin,$email);
				//INsert Transaksi
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
								'kredit'=> $poin,
								'ket'=> 'BUY G POIN',
								'status' => 'VALID',
								'id_user2'=>'10',
								'debit'=>'0',
								'maxtime'=> $tgl
								);

					$this->si_transaksinya_model->insert_data($data);
				}
				// insert history
				date_default_timezone_set("Asia/Jakarta");
				$tgl=date('Y-m-d H:i:s');
				//insert history admin
				$data = array(
					'username' => $this->session->userdata('admin'),
					'kegiatan'=> 'Menerima Pembelian Poin dari '.$username,
					'tgl'=> $tgl
					);
			
				$this->melakukan_model->insert_data($data);
				$this->session->set_flashdata('pass_login', 'Berhasil konfirmasi pembelian dan poin sudah ditambahkan');
				redirect('jangkrik/beli/masuk');
			}	
    }

    public function update_cancel($id){
    	$data=$this->beli_model->get_iduser($id);
		$username=$data->username;

    	$this->beli_model->update_cancel($id);
    	date_default_timezone_set("Asia/Jakarta");
		$tgl=date('Y-m-d H:i:s');
		//insert history admin
		$data = array(
			'username' => $this->session->userdata('admin'),
			'kegiatan'=> 'Membatalkan Pembelian Poin Dari '.$username,
			'tgl'=> $tgl
			);
	
		$this->melakukan_model->insert_data($data);

    	$this->session->set_flashdata('pass_login', 'Berhasil membatalkan pembelian poin');
    	redirect('jangkrik/beli/masuk');
    }
    public function sendMail($username,$poin,$email)
    {

    	
    	$to=$email;
        $subject='Konfirmasi Pembelian';
        
        $isi="<p>Bapak/Ibu ".$username." Poin Anda telah bertambah sebanyak ".$poin." Silahkan cek saldo Poin Anda. Terima kasih<br>Salam Sukses<br>GPoin2u</>
        ";      
        $this->load->library('kirim_email');
        $this->kirim_email->proses($to, $subject, $isi);

    }
}