<?php
class Melakukan_model extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
     public function insert_data($data){
        $insert=$this->db->insert('melakukan',$data);
        return $insert;
    }


	public function get_data()
    {
        $this->db->order_by('tgl','desc');
        $query = $this->db->get('melakukan');
        return $query->result();
    }

}