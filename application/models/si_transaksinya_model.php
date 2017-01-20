<?php
class Si_transaksinya_model extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    public function cek_data($data) {
            $query = $this->db->get_where('si_transaksinya', $data);
            return $query;
        }

    public function get_data_id($id_user) {
        $this->db->select('*');
        $this->db->from('si_transaksinya');
        $this->db->where('id_user',$id_user);
        
        $query = $this->db->get();
        return $query;
    }

    public function count_all()
    {
        return $this->db->count_all('si_transaksinya');
    }

    public function get_data()
    {
    	$this->db->select('
    		si_transaksinya.status,
    		si_transaksinya.ket,
    		si_transaksinya.debit,
    		si_transaksinya.kredit,
    		si_transaksinya.tgl,
    		si_membernya.username,
            si_membernya.hak_akses
    		');
    	$this->db->from('si_transaksinya');
    	$this->db->join('si_membernya','si_membernya.id_user = si_transaksinya.id_user');
        $this->db->where('si_transaksinya.ket','TRANSFER G POIN');
        $this->db->where('si_membernya.hak_akses !=','44');
    	$this->db->order_by('tgl','desc');
        $query = $this->db->get();
        return $query->result();
    }

    public function insert_data($data){
        $insert=$this->db->insert('si_transaksinya',$data);
        return $insert;
    }
}