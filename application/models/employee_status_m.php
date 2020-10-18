<?php
class Employee_status_m extends CI_Model{

    function get_all(){
        return $this->db->query("select es.*, e.name from employee_status es left join employee e on es.nik=e.nik;");
        //return $this->db->get("employee_status");
    }

    function get_all_where($status){
        if($status=="active"){
            $query = $this->db->query("SELECT es.*, e.name FROM employee_status es LEFT JOIN employee e ON es.nik=e.nik WHERE inactive_date = '0000-00-00'");
        }else{
            $query = $this->db->query("SELECT es.*, e.name FROM employee_status es LEFT JOIN employee e ON es.nik=e.nik WHERE inactive_date <> '0000-00-00'");
        }
        return $query;
        //echo $this->db->last_query(); exit;
    }
    
    function get_list(){
        return $this->db->query("select nik, name from employee");
        //return $this->db->get("employee");
    }

    function get_data_nik($nik){
        return $this->db->query("SELECT es.*, e.name FROM employee_status es LEFT JOIN employee e ON es.nik=e.nik WHERE es.nik=$nik");
    }

    function update_data($data,$where){
        $this->db->where($where);
        $this->db->set($data);
        $query = $this->db->update('employee_status');
        //echo $this->db->last_query(); exit;
    }

    function cek_save($cek_save){
        $this->db->where($cek_save);
        return $this->db->get("employee_status")->num_rows();
    }

    function save($data){
        return $this->db->insert('employee_status',$data);
    }
    
    function count_contract(){
        return $this->db->select('select max(contract_of_periode) from employee_status');
    }

    function delete_data($nik){
        $this->db->where('nik', $nik);
        $this->db->delete('employee_status');
    }


}


?>