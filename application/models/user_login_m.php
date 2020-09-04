<?php
    class User_login_m extends CI_Model{
        
        function get_data(){
            return $this->db->get("user_login");
        }

        function load_data(){
            $this->db->query("INSERT IGNORE user_login 
                                SELECT 
                                DISTINCT(nik) AS username, 
                                name, 
                                '0' AS role_id, 
                                '123' AS PASSWORD  
                                FROM karyawan 
                                WHERE 
                                nik NOT IN (SELECT username FROM user_login)");
        }
    }
    
?>