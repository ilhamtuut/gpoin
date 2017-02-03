<?php
class Beli_model extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    public function get_data_baru(){
        $this->db->select('
            si_beli.id,            
            si_beli.poin,
            si_beli.harga,
            si_beli.kode_unik,
            si_beli.tgl_beli,
            si_beli.tgl_accept,
            si_beli.tgl_konfirm,
            si_beli.gambar,
            si_beli.status,
            si_membernya.username,
            si_membernya.namalengkap,
            si_membernya.hak_akses
            ');
        $this->db->from('si_beli');
        $this->db->join('imei_membernya','imei_membernya.id = si_beli.id_imei');
        $this->db->join('si_membernya','si_membernya.id_user = imei_membernya.id_membernya');
        $this->db->where('si_membernya.hak_akses !=','44');
        $this->db->where('si_beli.status','1');
        $this->db->order_by('si_beli.tgl_beli','desc');
        $query = $this->db->get();
        return $query->result();
    }

	public function get_data_masuk(){
        $this->db->select('
            si_beli.id,            
            si_beli.poin,
            si_beli.harga,
            si_beli.kode_unik,
            si_beli.tgl_beli,
            si_beli.tgl_accept,
            si_beli.tgl_konfirm,
            si_beli.gambar,
            si_beli.status,
            si_beli.atas_nama_member,
            si_beli.bank_member,
            si_beli.metode,
            si_beli.no_rek_member,
            si_beli.jml_transfer,
            si_beli.tgl_transfer,
            si_membernya.username,
            si_membernya.namalengkap,
            si_membernya.hak_akses
            ');
        $this->db->from('si_beli');
        $this->db->join('imei_membernya','imei_membernya.id = si_beli.id_imei');
        $this->db->join('si_membernya','si_membernya.id_user = imei_membernya.id_membernya');
        $this->db->where('si_membernya.hak_akses !=','44');
        $this->db->where('si_beli.status','2');
        $this->db->order_by('si_beli.tgl_beli','desc');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_iduser($id){
        $this->db->select('si_membernya.id_user,si_membernya.username,si_membernya.email,si_beli.poin');
        $this->db->from('si_beli');
        $this->db->join('imei_membernya','imei_membernya.id = si_beli.id_imei');
        $this->db->join('si_membernya','si_membernya.id_user = imei_membernya.id_membernya');
        $this->db->where('si_membernya.hak_akses !=','44');
        $this->db->where('si_beli.status','2');
        $this->db->where('si_beli.id',$id);
        $this->db->order_by('si_beli.tgl_beli','desc');
        $query = $this->db->get();
        return $query->row();
    }

    public function get_data_accept(){
        $this->db->select('
            si_beli.id, 
            si_beli.poin,
            si_beli.harga,
            si_beli.kode_unik,
            si_beli.tgl_beli,
            si_beli.tgl_accept,
            si_beli.tgl_konfirm,
            si_beli.gambar,
            si_beli.status,
            si_membernya.username,
            si_membernya.namalengkap,
            si_membernya.hak_akses
            ');
        $this->db->from('si_beli');
        $this->db->join('imei_membernya','imei_membernya.id = si_beli.id_imei');
        $this->db->join('si_membernya','si_membernya.id_user = imei_membernya.id_membernya');
        $this->db->where('si_membernya.hak_akses !=','44');
        $this->db->where('si_beli.status','3');
        $this->db->order_by('si_beli.tgl_accept','desc');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_data_cancel(){
        $this->db->select('
            si_beli.poin,
            si_beli.harga,
            si_beli.kode_unik,
            si_beli.tgl_beli,
            si_beli.tgl_accept,
            si_beli.tgl_konfirm,
            si_beli.gambar,
            si_beli.status,
            si_membernya.username,
            si_membernya.namalengkap,
            si_membernya.hak_akses
            ');
        $this->db->from('si_beli');
        $this->db->join('imei_membernya','imei_membernya.id = si_beli.id_imei');
        $this->db->join('si_membernya','si_membernya.id_user = imei_membernya.id_membernya');
        $this->db->where('si_membernya.hak_akses !=','44');
        $this->db->where('si_beli.status','4');
        $this->db->order_by('si_beli.tgl_accept','desc');
        $query = $this->db->get();
        return $query->result();
    }

    public function update_accept($id){

        date_default_timezone_set("Asia/Jakarta");
        $tgl=date('Y-m-d H:i:s');
        $data = array('tgl_accept' => $tgl,
                        'status'=>'3');
        $this->db->where('id',$id);
        $this->db->update('si_beli',$data);
    }

    public function update_cancel($id){
        date_default_timezone_set("Asia/Jakarta");
        $tgl=date('Y-m-d H:i:s');
        $data = array('tgl_accept' => $tgl,
                        'status'=>'4');
        $this->db->where('id',$id);
        $this->db->update('si_beli',$data);
    }

     public function get_data_bydate($tglawal,$tglakhir){
        
        $this->db->select('
            si_beli.id, 
            si_beli.poin,
            si_beli.harga,
            si_beli.kode_unik,
            si_beli.tgl_beli,
            si_beli.tgl_accept,
            si_beli.tgl_konfirm,
            si_beli.gambar,
            si_beli.status,
            si_membernya.username,
            si_membernya.namalengkap,
            si_membernya.hak_akses
            ');
        $this->db->from('si_beli');
        $this->db->join('imei_membernya','imei_membernya.id = si_beli.id_imei');
        $this->db->join('si_membernya','si_membernya.id_user = imei_membernya.id_membernya');
        $this->db->where('si_membernya.hak_akses !=','44');
        $this->db->where('si_beli.status','3');
        //$this->db->where('si_beli.tgl_accept BETWEEN "'.$tglawal.'" and "'.$tglakhir.'"');
        $this->db->where('si_beli.tgl_accept >=',$tglawal);
        $this->db->where('si_beli.tgl_accept <=',$tglakhir);
        $this->db->order_by('si_beli.tgl_accept','desc');
        $query = $this->db->get();
        return $query->result();
    }

}