<?php
class Posting_model extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    public function cek_data($id_user) {
        $this->db->where('id_user',$id_user);
        $this->db->where('ket','G POIN');
        $this->db->from('posting');
        $query = $this->db->get();
        return $query;
    }

    public function get_data()
    {
        $this->db->select('
            posting.status,
            posting.ket,
            posting.jml,
            posting.tgl,
            membernya.username,
            membernya.hak_akses
            ');
        $this->db->from('posting');
        $this->db->join('membernya','membernya.id_user = posting.id_user');
        $this->db->where('posting.ket','G POIN');
        $this->db->where('membernya.hak_akses !=','44');
        $this->db->order_by('posting.status','desc');
        //$this->db->order_by('status','desc');
        $query = $this->db->get();
        return $query->result();
    }

    public function count_all(){
        $this->db->from('posting');
        $this->db->join('membernya','membernya.id_user = posting.id_user');
        $this->db->where('posting.ket','G POIN');
        $this->db->where('membernya.hak_akses !=','44');
        return $this->db->count_all_results();
    }

    public function update_poin_admin($data) {
        $this->db->where('id_user','10');
        $this->db->where('ket','G POIN');
        $this->db->update('posting',$data);
    }    

    public function update_poin_member($id_user,$data) {
        $this->db->where('id_user',$id_user);
        $this->db->where('ket','G POIN');
        $this->db->update('posting',$data);
    } 

    public function insert_data($data){
        $insert=$this->db->insert('posting',$data);
        return $insert;
    }
}