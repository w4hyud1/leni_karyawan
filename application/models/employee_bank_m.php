<?php
class Employee_bank_m extends CI_Model{

    function get_all(){
        return $this->db->query("select eb.*, e.name from employee_bank eb left join employee e on eb.nik=e.nik;");
        //return $this->db->get("employee_bank");
    }

    function get_all_where($status){
        if($status=="active"){
            $query = $this->db->query("SELECT es.*, e.name FROM employee_bank es LEFT JOIN employee e ON es.nik=e.nik WHERE end_date = '0000-00-00'");
        }else{
            $query = $this->db->query("SELECT es.*, e.name FROM employee_bank es LEFT JOIN employee e ON es.nik=e.nik WHERE end_date <> '0000-00-00'");
        }
        return $query;
        //echo $this->db->last_query(); exit;
    }
    
    function get_list(){
        return $this->db->query("select nik, name from employee");
        //return $this->db->get("employee");
    }

    function get_bank(){
        return $this->db->get('bank');
    }

    function get_data_nik($nik){
        return $this->db->query("SELECT eb.*, e.name FROM employee_bank eb LEFT JOIN employee e ON eb.nik=e.nik WHERE eb.nik=$nik");
    }

    function update_data($data,$where){
        $this->db->where($where);
        $this->db->set($data);
        $query = $this->db->update('employee_bank');
        //echo $this->db->last_query(); exit;
    }

    function cek_save($cek_save){
        $this->db->where($cek_save);
        return $this->db->get("employee_bank")->num_rows();
    }

    function save($data){
        return $this->db->insert('employee_bank',$data);
    }
    
    function count_contract(){
        return $this->db->select('select max(contract_of_periode) from employee_bank');
    }

    function delete_data($nik){
        $this->db->where('nik', $nik);
        $this->db->delete('employee_bank');
    }

}


?>