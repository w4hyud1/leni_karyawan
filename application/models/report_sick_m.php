<?php
class Report_sick_m extends CI_Model{

    function get_all(){
        return $this->db->query("SELECT s.*,e.name FROM sick AS s LEFT JOIN employee e ON s.nik=e.nik");
    }

    function get_id($id){
        return $this->db->query("SELECT s.*,e.name FROM sick AS s LEFT JOIN employee e ON s.nik=e.nik where id='$id'");
    }

    function get_all_employee(){
        return $this->db->query('select nik,`name` from employee');
    }

    function get_list_sick(){
        return $this->db->get('list_sick');
    }

    function save_data($data){
        $this->db->insert('sick',$data);
    }   

    function update_data($data,$id){
        $this->db->where($id);
        $this->db->set($data);
        $this->db->update('sick');
    }

    function approve_sick($data){
        $this->db->where($data);
        $this->db->set('status', 'Approve');
        $this->db->update('sick');
    }

    function cancel_sick($data){
        $this->db->where($data);
        $this->db->set('status', 'Cancel');
        $this->db->update('sick');
    }

    function delete_data($data){
        $this->db->delete('client', $data);
    }
    
}
?>