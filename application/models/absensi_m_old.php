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

        function create_table_report_absensi(){
            $query = "CREATE TABLE `report_absensi` (
                    `nik` varchar(20) NOT NULL,
                    `date` date NOT NULL,
                    `day` varchar(15) DEFAULT NULL,
                    `clock_in` time DEFAULT NULL,
                    `clock_out` time DEFAULT NULL,
                    `remarks` varchar(50) DEFAULT NULL,
                    `note` varchar(50) DEFAULT NULL,
                    PRIMARY KEY (`nik`,`date`)
                    ) ENGINE=InnoDB DEFAULT CHARSET=latin1";
            $this->db->query($query);
        }

        function create_templet_report_absensi(){
            $kalender = CAL_GREGORIAN;
            $bulan = date("m");
            $tahun = date("y");
            $hari = cal_days_in_month($kalender, $bulan, $tahun);
            echo $hari;
            for($i=1; $i<=$hari ; $i++){
                if($i < 10){
                    $ii = "0".$i;
                }else{
                    $ii = $i;
                }
                $date = $tahun ."-". $bulan ."-". $ii; 
                $day = date('l', strtotime($date));
                $query_insert = "insert into report_absensi (`nik`, `date`, `day`) value ('2020','$date', '$day');"; 
                echo $query_insert;
            }
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