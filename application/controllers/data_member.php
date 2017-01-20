<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Data_member extends CI_Controller {
	private $limit=25;
	public function __construct() {
		parent::__construct();

		$this->load->helper('text');
	}

	public function index(){
		if ($this->session->userdata('id_admin') !="10") {
			redirect('auth');
		}else{
		
		$data['member']=$this->membernya_model->get_data();
		$data['member2']=$this->si_membernya_model->get_data();
		
		$data['jt']='<i class="glyphicon glyphicon-user"></i> Data Member';
		$data['jd']='';
		$this->template->display('datamember',$data);
		//var_dump($data1); die();
		}
	}

	public function data(){
		if ($this->session->userdata('id_admin') !="10") {
			redirect('auth');
		}else{
		$data['member']=$this->membernya_model->get_data();
		$data['member2']=$this->si_membernya_model->get_data();
		
		$data['jt']='<i class="glyphicon glyphicon-user"></i> Data Member';
		$data['jd']='';
		$this->template->display('datasimember',$data);
		//var_dump($data1); die();
		}
	}

	public function view(){
		if ($this->session->userdata('id_admin') !="10") {
			redirect('auth');
		}else{
		$id_user=$this->input->post('id_user');

		$detail = $this->membernya_model->detail_data($id_user);
		//$detail1 = $this->si_membernya_model->detail_data($id_user);
	?>
		<div class="table-responsive">
			<table  class="table table-hover table-striped">	
				<tbody>
				<tr>
				<td width="30%">Nama Lengkap</td>
				<td width="3%">:</td>
				<td><?php echo $detail->namalengkap; ?></td>
				</tr>
				<tr>
				<td width="30%">Username</td>
				<td width="3%">:</td>
				<td><?php echo $detail->username; ?></td>
				</tr>
				<tr>
				<td width="30%">Email</td>
				<td width="3%">:</td>
				<td><?php echo $detail->email; ?></td>
				</tr>
				<tr>
				<td width="30%">No Hp</td>
				<td width="3%">:</td>
				<td><?php echo $detail->nohp; ?></td>
				</tr>
				<tr>
				<td width="30%">Alamat</td>
				<td width="3%">:</td>
				<td><?php echo $detail->alamat; ?></td>
				</tr>
				<tr>
				<td width="30%">Kode Pos</td>
				<td width="3%">:</td>
				<td><?php echo $detail->zipcode; ?></td>
				</tr>
				<tr>
				<td width="30%">Kota</td>
				<td width="3%">:</td>
				<td><?php echo $detail->city; ?></td>
				</tr>
				<tr>
				<td width="30%">Provinsi</td>
				<td width="3%">:</td>
				<td><?php echo $detail->provinsi; ?></td>
				</tr>
				<tr>
				<td width="30%">Negara</td>
				<td width="3%">:</td>
				<td><?php echo $detail->country; ?></td>
				</tr>
				<tr>
				<td width="30%">Nama BANK</td>
				<td width="3%">:</td>
				<td><?php echo $detail->bankname; ?></td>
				</tr>
				<tr>
				<td width="30%">Tanggal Registrasi</td>
				<td width="3%">:</td>
				<td><?php echo $detail->tglreg; ?></td>
				</tr>

				</tbody>
			</table>
			<?php
	}
}

	public function view1(){
		if ($this->session->userdata('id_admin') !="10") {
			redirect('auth');
		}else{
		$id_user=$this->input->post('id_user');

		//$detail = $this->membernya_model->detail_data($id_user);
		$detail = $this->si_membernya_model->detail_data($id_user);
	?>
		<div class="table-responsive">
			<table  class="table table-hover table-striped">	
				<tbody>
				<tr>
				<td width="30%">Nama Lengkap</td>
				<td width="3%">:</td>
				<td><?php echo $detail->namalengkap; ?></td>
				</tr>
				<tr>
				<td width="30%">Username</td>
				<td width="3%">:</td>
				<td><?php echo $detail->username; ?></td>
				</tr>
				<tr>
				<td width="30%">Email</td>
				<td width="3%">:</td>
				<td><?php echo $detail->email; ?></td>
				</tr>
				<tr>
				<td width="30%">No Hp</td>
				<td width="3%">:</td>
				<td><?php echo $detail->nohp; ?></td>
				</tr>
				<tr>
				<td width="30%">Alamat</td>
				<td width="3%">:</td>
				<td><?php echo $detail->alamat; ?></td>
				</tr>
				<tr>
				<td width="30%">Kode Pos</td>
				<td width="3%">:</td>
				<td><?php echo $detail->zipcode; ?></td>
				</tr>
				<tr>
				<td width="30%">Kota</td>
				<td width="3%">:</td>
				<td><?php echo $detail->city; ?></td>
				</tr>
				<tr>
				<td width="30%">Provinsi</td>
				<td width="3%">:</td>
				<td><?php echo $detail->provinsi; ?></td>
				</tr>
				<tr>
				<td width="30%">Negara</td>
				<td width="3%">:</td>
				<td><?php echo $detail->country; ?></td>
				</tr>
				<tr>
				<td width="30%">Nama BANK</td>
				<td width="3%">:</td>
				<td><?php echo $detail->bankname; ?></td>
				</tr>
				<tr>
				<td width="30%">Tanggal Registrasi</td>
				<td width="3%">:</td>
				<td><?php echo $detail->tglreg; ?></td>
				</tr>

				</tbody>
			</table>
			<?php
	}
}
}
?>
