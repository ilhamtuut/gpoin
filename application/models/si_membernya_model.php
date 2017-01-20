<?php
class Si_membernya_model extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    public function cek_admin($data) {
            $query = $this->db->get_where('si_membernya', $data);
            return $query;
        }

    public function cek_data($data) {
            $query = $this->db->get_where('si_membernya', $data);
            return $query;
        }

    public function count_all()
    {
        $this->db->from('si_membernya');
        $this->db->where('hak_akses !=','44');
        return $this->db->count_all_results();;
    }

    public function get_data()
    {
        $this->db->where('hak_akses !=','44');
        $query = $this->db->get('si_membernya');
        return $query->result();
    }

    public function detail_data($id_user)
    {
        $this->db->select('*');
        $this->db->from('si_membernya');
        $this->db->where('id_user',$id_user);
        $query = $this->db->get();
        return $query->row();
    }


}