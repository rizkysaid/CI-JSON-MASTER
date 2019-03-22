<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class person_model extends CI_Model{
   
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    private function get_datatable_query(){
        $this->db->from('persons');
    }

    function get_datatables(){
        $query = $this->db->get('persons');
        return $query->result();
    }

    function count_filtered(){
        $this->get_datatable_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    function count_all(){
        $this->db->from('persons');
        return $this->db->count_all_results();
    }

    public function get_by_id($id){
        $this->db->from('persons');
        $this->db->where('id', $id);
        $query = $this->db->get();

        return $query->row();
    }

    public function simpan($data){
        $this->db->insert('persons', $data);
        return $this->db->insert_id();
    }

    public function update($where, $data){
        $this->db->update('persons', $data, $where);
        return $this->db->affected_rows();
    }

    public function delete_by_id($id){
        $this->db->where('id', $id);
        $this->db->delete('persons');
    }

}
?>