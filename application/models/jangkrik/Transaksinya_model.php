<?php
class Transaksinya_model extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    public function cek_data($data) {
            $query = $this->db->get_where('transaksinya', $data);
            return $query;
        }

    public function get_data()
    {
        $this->db->select('
            transaksinya.status,
            transaksinya.ket,
            transaksinya.debit,
            transaksinya.kredit,
            transaksinya.tgl,
            membernya.username,
            membernya.hak_akses
            ');
        $this->db->from('transaksinya');
        $this->db->join('membernya','membernya.id_user = transaksinya.id_user');
        $this->db->where('transaksinya.ket','TRANSFER G POIN');
        $this->db->where('membernya.hak_akses !=','44');
        $this->db->order_by('transaksinya.tgl','desc');
        $query = $this->db->get();
        return $query->result();
    }

    public function count_all()
    {
        return $this->db->count_all('transaksinya');
    }


    public function insert_data($data){
        $insert=$this->db->insert('transaksinya',$data);
        return $insert;
    }

    public function get_data_all(){
        $ket=array('TRANSFER G POIN', 'BUY G POIN');
        $this->db->select('
            transaksinya.status,
            transaksinya.ket,
            transaksinya.debit,
            transaksinya.kredit,
            transaksinya.tgl,
            membernya.username,
            membernya.hak_akses
            ');
        $this->db->from('transaksinya');
        $this->db->join('membernya','membernya.id_user = transaksinya.id_user');
        $this->db->where('membernya.hak_akses !=','44');
        $this->db->where('transaksinya.id_user !=','10');
        $this->db->where_in('transaksinya.ket ',$ket);
        $this->db->order_by('transaksinya.tgl','desc');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_data_all2(){
        $this->db->select('
            transaksinya.status,
            transaksinya.ket,
            transaksinya.debit,
            transaksinya.kredit,
            transaksinya.tgl,
            membernya.username,
            membernya.hak_akses
            ');
        $this->db->from('transaksinya');
        $this->db->join('membernya','membernya.id_user = transaksinya.id_user');
        $this->db->where('membernya.hak_akses !=','44');
        $this->db->where('transaksinya.id_user !=','10');
        $this->db->like('transaksinya.ket ','CREDIT PURCHASE WITH G POIN','after');
        $this->db->order_by('transaksinya.tgl','desc');
        $query = $this->db->get();
        return $query->result();
    }

     public function get_data_bydate($tglawal,$tglakhir){
        $ket=array('TRANSFER G POIN', 'BUY G POIN');
        $this->db->select('
            transaksinya.status,
            transaksinya.ket,
            transaksinya.debit,
            transaksinya.kredit,
            transaksinya.tgl,
            membernya.username,
            membernya.hak_akses
            ');
        $this->db->from('transaksinya');
        $this->db->join('membernya','membernya.id_user = transaksinya.id_user');
        $this->db->where('membernya.hak_akses !=','44');
        $this->db->where('transaksinya.id_user !=','10');
        $this->db->where_in('transaksinya.ket ',$ket);
        $this->db->where('transaksinya.tgl >=',$tglawal);
        $this->db->where('transaksinya.tgl <=',$tglakhir);
        $this->db->order_by('transaksinya.tgl','desc');
        $query = $this->db->get();
        return $query->result();
     }

    public function get_data_byket($ket){
        $this->db->select('
            transaksinya.status,
            transaksinya.ket,
            transaksinya.debit,
            transaksinya.kredit,
            transaksinya.tgl,
            membernya.username,
            membernya.hak_akses
            ');
        $this->db->from('transaksinya');
        $this->db->join('membernya','membernya.id_user = transaksinya.id_user');
        $this->db->where('membernya.hak_akses !=','44');
        $this->db->where('transaksinya.id_user !=','10');
        $this->db->where('transaksinya.ket',$ket);
         $this->db->order_by('transaksinya.tgl','desc');
        $query = $this->db->get();
        return $query->result();
     }

     public function get_data_bydaket($tglawal,$tglakhir,$ket){
        $this->db->select('
            transaksinya.status,
            transaksinya.ket,
            transaksinya.debit,
            transaksinya.kredit,
            transaksinya.tgl,
            membernya.username,
            membernya.hak_akses
            ');
        $this->db->from('transaksinya');
        $this->db->join('membernya','membernya.id_user = transaksinya.id_user');
        $this->db->where('membernya.hak_akses !=','44');
        $this->db->where('transaksinya.id_user !=','10');
        $this->db->where('transaksinya.tgl >=',$tglawal);
        $this->db->where('transaksinya.tgl <=',$tglakhir);
        $this->db->where('transaksinya.ket',$ket);
        $this->db->order_by('transaksinya.tgl','desc');
        $query = $this->db->get();
        return $query->result();
     }

     public function get_data_bydate_in($tglawal,$tglakhir){
        $this->db->select('
            transaksinya.status,
            transaksinya.ket,
            transaksinya.debit,
            transaksinya.kredit,
            transaksinya.tgl,
            membernya.username,
            membernya.hak_akses
            ');
        $this->db->from('transaksinya');
        $this->db->join('membernya','membernya.id_user = transaksinya.id_user');
        $this->db->where('membernya.hak_akses !=','44');
        $this->db->where('transaksinya.id_user !=','10');
       $this->db->like('transaksinya.ket ','CREDIT PURCHASE WITH G POIN','after');
        $this->db->where('transaksinya.tgl >=',$tglawal);
        $this->db->where('transaksinya.tgl <=',$tglakhir);
        $this->db->order_by('transaksinya.tgl','desc');
        $query = $this->db->get();
        return $query->result();
     }
}