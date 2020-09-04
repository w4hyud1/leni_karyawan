<?php
class Import_m extends CI_Model{

    function get_count_ci_periode($periode){
        $query = "SELECT  DATE_FORMAT(payment_timestamp,'%Y-%m-%d') AS date, COUNT(DISTINCT order_id) AS count_order_id FROM ci_workday_".$periode." GROUP BY DATE_FORMAT(payment_timestamp,'%Y-%m-%d');";
        return $this->db->query($query);
    }

    function get_count_cp_periode($periode){
        $query = "SELECT  DATE_FORMAT(payment_date,'%Y-%m-%d') AS date, COUNT(DISTINCT order_id) AS count_order_id FROM cp_workday_".$periode." GROUP BY DATE_FORMAT(payment_date,'%Y-%m-%d');";
        return $this->db->query($query);
    }

    function get_count_si_periode($periode){
        $query = "SELECT  DATE_FORMAT(invoice_date,'%Y-%m-%d') AS date, COUNT(DISTINCT order_id) AS count_order_id FROM si_workday_".$periode." GROUP BY DATE_FORMAT(invoice_date,'%Y-%m-%d');";
        return $this->db->query($query);
    }
}

?>