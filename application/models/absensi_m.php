<?php
    class Absensi_m extends CI_Model{
        
        function get_data_all(){
            return $this->db->get("absensi");
        }

        function get_data_where(){
            $this->db->where('nik', $_SESSION['username']);
            $this->db->where('date', date("Y-m-d"));
            return $this->db->get('absensi');
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
    }
    
?>