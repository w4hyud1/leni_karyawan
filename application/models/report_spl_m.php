<?php
    class Report_spl_m extends CI_Model{
        
        function get_data_all(){
            return $this->db->get("report_spl");
        }

        function get_data_where($nik, $date){
            $date_Ym = date('Y-m', strtotime($date));
            return $this->db->query("select * from spl where nik='$nik' and `date` like '$date_Ym%'");
        }

        function get_employee(){
            return $this->db->query('select nik,`name` from employee');
        }

        function get_employee_where($nik){
            return $this->db->query("select nik,`name` from employee where nik='$nik'");
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

        function get_id($id){
            $this->db->where('id', $id);
            return $this->db->get('spl');
        }

        function update_data($data,$id){
            $this->db->where($id);
            $this->db->set($data);
            $this->db->update('spl');
        }

        function delete_templet_report_spl(){
            $this->db->query('delete from report_spl');
        }

        function insert_templet_report_spl($nik, $name,  $date){
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
                    $query_insert = "insert into report_spl (`nik`, `name`, `date`, `day`,`activity`) value ('$nik', '$name', '$date2', '$day','Weekend');"; 
                }elseif($day=='Sunday'){
                    $query_insert = "insert into report_spl (`nik`, `name`, `date`, `day`,`activity`) value ('$nik', '$name', '$date2', '$day','Weekend');"; 
                }else{
                    $query_insert = "insert into report_spl (`nik`, `name`,`date`, `day`) value ('$nik', '$name', '$date2', '$day');"; 
                }   
                $this->db->query($query_insert);
            }
        }

        function update_report_spl($nik){
            return $this->db->query("UPDATE report_spl AS rs, spl AS s SET rs.clock_in=s.clock_in,rs.`clock_out`=s.`clock_out`, rs.total_hour=s.total_hour ,rs.activity=s.activity WHERE rs.nik=s.nik AND rs.date=s.date and s.nik='$nik' and s.status='Approve'");
        }

         function get_info_report_spl(){
            return $this->db->query("SELECT 
                                e.nik
                                , e.name 
                                , e.position
                                , c.name AS client_name
                                , rs.date
                            FROM report_spl AS rs
                            LEFT JOIN employee e USING (nik)
                            LEFT JOIN `client` c ON e.`id_client`=c.id 
                            GROUP BY nik");
        }
    }
    
?>