<?php
    class Cuti_m extends CI_Model{
        
        function get_data_all(){
            return $this->db->get("cuti");
        }

        function get_data_where(){
            // $this->db->where('nik', $_SESSION['username']);
            // $this->db->where('date', date("Y-m-d"));
            // return $this->db->get('cuti');
            return $this->db->query("select * from cuti where year(date)=year(now()) and nik='$_SESSION[username]'");
        }

        function count_cuti (){
            $nik = $_SESSION['username'];
            return $this->db->query("SELECT nik,cuti FROM employee_status WHERE nik='$nik' AND status='Active'");
        }

        function list_cuti(){
            return $this->db->get('list_cuti');
        }

        function save_data($data){
            $this->db->insert('cuti', $data);
        }

        function save_data_spl($data){
            $this->db->insert('spl', $data);
        }

        function get_data_all_mount(){
            $date_ym = date("Y-m");
            $this->db->like('date', $date_ym);
            return $this->db->get('cuti');
        }
    }
    
?>