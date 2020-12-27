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
                                'staff' AS levek, 
                                '123' AS PASSWORD,
                                'Active' as status
                                FROM employee 
                                WHERE 
                                nik NOT IN (SELECT username FROM user_login)");
        }

        function get_data_where($username){
            $this->db->where('username',$username);
            return $this->db->get("user_login");
        }

        function update($data, $where){
            $this->db->where($where);
            $this->db->set($data);
            $this->db->update('user_login');
            //echo $this->db->last_query(); exit;
        }

        function delete($username){
            $this->db->where('username', $username);
            $this->db->delete('user_login');
        }

    }
    
?>