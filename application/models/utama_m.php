<?php
    class Utama_m extends CI_Model{
        
       function count_employee_all(){
           return $this->db->query("SELECT COUNT(*) as jml FROM employee_status");
       }

       // cek karyawan yang kurang dari 2 bulan
       function count_employee_warning(){
            return $this->db->query("SELECT 
                                COUNT(*) AS jml,
                                TIMESTAMPDIFF(MONTH, end_date, NOW()) AS selisih_bulan 
                            FROM employee_status WHERE TIMESTAMPDIFF(MONTH, end_date, NOW())>=-2 AND inactive_date='0000-00-00'");
       }

       function count_employee_danger(){
        return $this->db->query("SELECT 
                                    COUNT(*) AS jml,
                                    TIMESTAMPDIFF(MONTH, end_date, NOW()) AS selisih_bulan 
                                FROM employee_status WHERE inactive_date<>'0000-00-00'");
        }

        function get_all(){
            return $this->db->query("select es.*, e.name from employee_status es left join employee e on es.nik=e.nik where es.inactive_date='0000:00:00';");
            //echo $this->db->last_query(); exit;
        }


    }
    
?>