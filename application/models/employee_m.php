<?php
class Employee_m extends CI_Model{

    function get_all(){
        return $this->db->get("employee");
    }

    function get_nik_new(){
        $old_nik = $this->db->query("SELECT MAX(MID(nik,5,4))+1 AS nik FROM employee")->row();
        return $old_nik;
    }

    function save_data($data, $nik, $name){
        $date = date("Y-m-d");
        $this->db->insert('employee',$data);
        // Update table employee_bank, employee_status, user_login
        $this->db->query("insert into employee_bank (nik) value ('$nik')");
        $this->db->query("insert into employee_status (nik, contract_of_period, status, upddate) value ('$nik','1', 'Active', '$date' )");
        $this->db->query("insert into user_login (username, name, level, password, status) value ('$nik', '$name', 'Staff', '123', 'Active')");
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