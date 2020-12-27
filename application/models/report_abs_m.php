<?php
    class Report_abs_m extends CI_Model{
        
        function get_data_all(){
            return $this->db->query("SELECT ra.*,e.name FROM report_absensi ra LEFT JOIN employee e ON ra.nik=e.nik order by date");
        }
        
        function get_data_employe(){
           return  $this->db->query("SELECT 
                                DISTINCT (ra.nik)
                                , ra.date
                                , e.name
                                , e.position
                                , c.name as client_name
                            FROM report_absensi ra 
                            LEFT JOIN employee e USING (nik)
                            LEFT JOIN `client` c ON e.id_client = c.id
                            LIMIT 1");
        }

        function get_data_all_where($nik){
            return $this->db->query("SELECT ra.*,e.name FROM report_absensi ra LEFT JOIN employee e ON ra.nik=e.nik and ra.nik='$nik'");
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
            return $this->db->query("select nik, name from employee");
            //return $this->db->query("select a.nik, e.name from absensi a left join employee e on a.nik=e.nik group by a.nik");
        }

        function get_info_report_absensi(){
            return $this->db->query("SELECT 
                                e.nik
                                , e.name 
                                , e.position
                                , c.name AS client_name
                                , ra.date
                            FROM report_absensi AS ra
                            LEFT JOIN employee e USING (nik)
                            LEFT JOIN `client` c ON e.`id_client`=c.id 
                            GROUP BY nik");
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

        function insert_templet_report_absensi($nik, $date){
            $kalender = CAL_GREGORIAN;
            $bulan = date("m", strtotime($date));
            $tahun = date("Y", strtotime($date));
            $hari = cal_days_in_month($kalender, $bulan, $tahun);
            echo $hari;
            for($i=1; $i<=$hari ; $i++){
                if($i < 10){
                    $ii = "0".$i;
                }else{
                    $ii = $i;
                }
                $date2 = $tahun ."-". $bulan ."-". $ii; 
                $day = date('l', strtotime($date2));
                if($day=='Saturday'){
                    $query_insert = "insert into report_absensi (`nik`, `date`, `day`,`remarks`) value ('$nik','$date2', '$day','Weekend');"; 
                }elseif($day=='Sunday'){
                    $query_insert = "insert into report_absensi (`nik`, `date`, `day`,`remarks`) value ('$nik','$date2', '$day','Weekend');"; 
                }else{
                    $query_insert = "insert into report_absensi (`nik`, `date`, `day`) value ('$nik','$date2', '$day');"; 
                }   
                $this->db->query($query_insert);
            }
        }
        function delete_templet_report_absensi(){
            $this->db->query('delete from report_absensi');
        }

        function update_report_absensi($nik){
           return $this->db->query("UPDATE report_absensi AS ra, absensi AS a SET ra.clock_in=a.clock_in,ra.`clock_out`=a.`clock_out`,ra.activity=a.activity, ra.remarks=a.remarks WHERE ra.nik=a.nik AND ra.date=a.date and a.nik='$nik'");
        }

        function update_report_cuti($nik){
            return $this->db->query("UPDATE report_absensi AS ra, cuti AS c SET ra.activity=c.`activity`,ra.remarks=c.`remarks` WHERE ra.nik=c.nik AND ra.date=c.date and c.nik='$nik' and c.status='Approve'");
        }

        function update_national_holiday($nik){
            return $this->db->query("UPDATE report_absensi AS ra, list_national_holiday AS lnh SET ra.remarks=lnh.name_holiday WHERE ra.date=lnh.date");
        }

        function update_sick($nik){
            return $this->db->query("UPDATE report_absensi AS ra, sick AS s SET ra.activity=s.`activity`,ra.remarks=s.`remarks` WHERE ra.nik=s.nik AND ra.date=s.date and s.nik='$nik' and s.status='Approve'");
        }
        
        function update_remarks(){
            $this->db->query("UPDATE report_absensi SET remarks='Mangkir' WHERE remarks IS NULL and clock_in IS NULL AND clock_out IS NULL");
            $this->db->query("UPDATE report_absensi SET remarks='Lupa Absen Datang' WHERE clock_in IS NULL AND remarks IS NULL");
            $this->db->query("UPDATE report_absensi SET remarks='Lupa Absen Pulang' WHERE clock_out IS NULL AND remarks IS NULL");
        }
    }
    
?>