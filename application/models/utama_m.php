<?php
    class Utama_m extends CI_Model{
        
       function count_employee_all(){
           return $this->db->query("SELECT COUNT(*) as jml FROM employee_status");
       }

       function selisih_bulan(){
            $query = $this->db->query("select * from employee_status")->row();
            $awal  = date_create($query->end_date);
            $akhir = date_create(); // waktu sekarang
            $diff  = date_diff( $awal, $akhir );
            echo $diff->m ;
       }

       // cek karyawan yang kurang dari 2 bulan
       function count_employee_warning(){
            return $this->db->query("SELECT 
                                COUNT(*) AS jml,
                                TIMESTAMPDIFF(MONTH, end_date, NOW()) AS selisih_bulan 
                            FROM employee_status WHERE TIMESTAMPDIFF(MONTH, end_date, NOW())>=2 AND inactive_date='0000-00-00'");
       }

    //    cek command
       function count_employee_danger(){
        return $this->db->query("SELECT 
                                    COUNT(*) AS jml,
                                    TIMESTAMPDIFF(MONTH, end_date, NOW()) AS selisih_bulan 
                                FROM employee_status WHERE inactive_date<>'0000-00-00'");
        }

        function get_all(){
            $month = date("m");
           return $this->db->query("SELECT * FROM employee WHERE MONTH(`birth_date`)=$month");
            //echo $this->db->last_query(); exit;
        }

        function count_alert_cuti(){
            return $this->db->query("SELECT COUNT(*) AS jml FROM cuti WHERE STATUS='Pending' AND YEAR(DATE)=YEAR(NOW())");
        }


    }
    
?>