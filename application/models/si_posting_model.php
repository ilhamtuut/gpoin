<?php
class Si_posting_model extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    public function cek_data($data) {
        $query = $this->db->get_where('si_posting', $data);
        return $query;
    }

    public function count_all(){
        $this->db->from('si_posting');
        $this->db->join('si_membernya','si_membernya.id_user = si_posting.id_user');
        $this->db->where('si_posting.ket','G POIN');
        $this->db->where('si_membernya.hak_akses !=','44');
        return $this->db->count_all_results();
    }

    public function get_data(){
        $this->db->select('
            si_posting.status,
            si_posting.ket,
            si_posting.jml,
            si_posting.tgl,
            si_membernya.username,
            si_membernya.hak_akses
            ');
        $this->db->from('si_posting');
        $this->db->join('si_membernya','si_membernya.id_user = si_posting.id_user');
        $this->db->where('si_posting.ket','G POIN');
        $this->db->where('si_membernya.hak_akses !=','44');
        $this->db->order_by('si_posting.status','desc');
        //$this->db->order_by('status','desc');
        $query = $this->db->get();
        return $query->result();
    }
    
    public function poin_admin() {
        $this->db->select('*');
        $this->db->from('si_posting');
        $this->db->where('id_user','10');
        $this->db->where('ket','G POIN');
        $query = $this->db->get();
        return $query->row();
    }

    public function update_poin_admin($data) {
        $this->db->where('id_user','10');
        $this->db->where('ket','G POIN');
        $this->db->update('si_posting',$data);
    }    


    public function poin_member() {
        $id_user=$this->session->userdata('id_user');
        $this->db->select('*');
        $this->db->from('si_posting');
        $this->db->where('id_user',$id_user);
        $this->db->where('ket','G POIN');
        $query = $this->db->get();
        return $query->row();
    }

    public function update_poin_member($id_user,$data) {
        $this->db->where('id_user',$id_user);
        $this->db->where('ket','G POIN');
        $this->db->update('si_posting',$data);
    }   

    public function insert_data($data){
        $insert=$this->db->insert('si_posting',$data);
        return $insert;
    }

}