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

        function update_clock_out($data, $data_where){
            $this->db->where($data_where);
            $this->db->set($data);
            $this->db->update('absensi');
        }

        function save_data_spl($data){
            $this->db->insert('spl', $data);
        }

        function get_data_all_mount(){
            $date_ym = date("Y-m");
            $this->db->like('date', $date_ym);
            return $this->db->get('absensi');
        }

        function insert_report_absensi(){
            $query = "WITH 
                        absensi_in AS (
                            SELECT 
                                nik
                                , `date`
                                , TIME AS time_in
                                , activity AS activity_in
                                , remarks AS remarks_in
                                , STATUS
                            FROM absensi AS status_in WHERE `status`='IN'
                        )
                        , absensi_out AS (
                            SELECT 
                                nik
                                , `date`
                                , TIME AS time_out
                                , activity AS activity_out
                                , remarks AS remarks_out
                                , STATUS
                            FROM absensi AS status_in WHERE `status`='OUT'
                        )
                        , combain AS (
                            SELECT 
                                a_in.nik
                                , a_in.date
                                , CASE
                                    WHEN a_in.status='IN' THEN a_in.time_in
                                    ELSE NULL
                                    END AS time_in
                                , CASE 
                                    WHEN a_out.status='OUT' THEN a_out.time_out
                                    ELSE NULL
                                    END AS time_out
                                -- a_out.time_out
                                , COALESCE(a_in.activity_in, a_out.activity_out) AS activity
                                , COALESCE(a_in.remarks_in, a_out.remarks_out) AS remarks
                            FROM absensi_in AS a_in LEFT JOIN absensi_out AS a_out ON a_in.nik=a_out.nik GROUP BY nik,DATE
                        )
                        SELECT * FROM combain ORDER BY nik,`date`;";
        }
    }
    
?>