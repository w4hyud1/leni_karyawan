<?php
    class Approve_spl_m extends CI_Model{
        
        function get_data_all(){
            return $this->db->get("spl");
        }

        function get_data_where($nik, $date){
            $date_Ym = date('Y-m', strtotime($date));
            return $this->db->query("select * from spl where nik='$nik' and `date` like '$date_Ym%'");
        }

        function get_employee(){
            return $this->db->query('select nik,`name` from employee');
        }

        function get_employee_where($nik){
            return $this->db->query("select nik,`name` from employee where nik='$nik'");
        }

        function save_data($data){
            $this->db->insert('absensi', $data);
        }

        function save_data_spl($data){
            $this->db->insert('spl', $data);
        }

        function get_data_all_mount(){
            $date_ym = date("Y-m");
            $this->db->like('date', $date_ym);
            return $this->db->get('absensi');
        }

        function get_id($id){
            $this->db->where('id', $id);
            return $this->db->get('spl');
        }

        function update_data($data,$id){
            $this->db->where($id);
            $this->db->set($data);
            $this->db->update('spl');
        }

        function approve_spl($data){
            $this->db->where($data);
            $this->db->set('status', 'Approve');
            $this->db->update('spl');
        }
    
        function cancel_spl($data){
            $this->db->where($data);
            $this->db->set('status', 'Cancel');
            $this->db->update('spl');
        }
    }
?>