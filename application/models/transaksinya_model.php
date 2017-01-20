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
        $this->db->order_by('tgl','desc');
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

}