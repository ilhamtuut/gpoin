<?php
class Bank_model extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    public function insert($data){
    	$insert=$this->db->insert('si_bank',$data);
        return $insert;
    }

    public function update_active($id){

        $data = array('cek'=>'1');
        $this->db->where('id', $id);
        $this->db->update('si_bank', $data);
    }

    public function update_deactive($id){
        $data = array('cek'=>'2');
        $this->db->where('id',$id);
        $this->db->update('si_bank',$data);
    }

    public function get_data(){
    	$this->db->select('*');
    	$this->db->where('cek','1');
    	$this->db->from('si_bank');
    	$query = $this->db->get();
        return $query->result();
    }

    public function get_data_deactive(){
    	$this->db->select('*');
    	$this->db->where('cek','2');
    	$this->db->from('si_bank');
    	$query = $this->db->get();
        return $query->result();
    }
}