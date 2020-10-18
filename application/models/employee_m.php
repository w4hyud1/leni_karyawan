<?php
class Employee_m extends CI_Model{

    function get_all(){
        return $this->db->get("employee");
    }

    function get_nik_new(){
        $old_nik = $this->db->query("SELECT MAX(MID(nik,5,4))+1 AS nik FROM employee")->row();
        return $old_nik;
    }

    function save_data($data){
        $this->db->insert('employee',$data);
    }

    function delete_data($data){
        $this->db->delete('employee',$data);
    }

    function get_client(){
        return $this->db->get("client");
    }
    
    function get_jabatan(){
        return $this->db->get("position");
    }

    function get_data_nik($nik){
        $this->db->where('nik',$nik);
        return $this->db->get("employee")->result();
    }

    function update_data($data,$nik){
        $this->db->where($nik);
        $this->db->set($data);
        $query = $this->db->update('employee');
        //echo $this->db->last_query(); exit;
    }


}


?>