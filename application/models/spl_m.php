<?php
    class Spl_m extends CI_Model{
        
        function get_data_all(){
            return $this->db->get("absensi");
        }

        function get_data_where(){
            $nik = $_SESSION['username'];
            $date = date("Y-m");
            $query = "select * from spl where nik='$nik' and date like '$date%'";
            // print_r($query);
            return $this->db->query($query);
        }

        function save_data($data){
            $this->db->insert('spl', $data);
        }
    }
    
?>