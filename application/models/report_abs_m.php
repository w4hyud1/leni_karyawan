<?php
    class Report_abs_m extends CI_Model{
        
        function get_data_all(){
            return $this->db->query("SELECT absensi.*,karyawan.name FROM absensi LEFT JOIN karyawan ON absensi.nik=karyawan.nik");
        }
        
        function get_data_all_where($nik){
            return $this->db->query("SELECT absensi.*,karyawan.name FROM absensi LEFT JOIN karyawan ON absensi.nik=karyawan.nik and absensi.nik='$nik'");
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

        function get_data_all_nik(){
            return $this->db->query("select a.nik, b.name from absensi a left join karyawan b on a.nik=b.nik group by a.nik");
        }

    }
    
?>