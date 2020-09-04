<?php
class Log_wd_m extends CI_Model{

    public function get_error_wd(){
        return $this->db->query("select * from error_workday");
    }

    public function get_error_wd_where1($order_id, $process_date){
        return $this->db->query("select * from error_workday where order_id in(".$order_id.") and process_date like '".$process_date."%'");
    }

    public function get_error_wd_where2($order_id, $process_date, $type_data){
        return $this->db->query("select * from error_workday where order_id in(".$order_id.") and type_data='".$type_data."' and process_date like '".$process_date."%'");
    }

    public function get_error_wd_where3($process_date, $type_data){
        return $this->db->query("select * from error_workday where process_date like '".$process_date."%'");
    }

    public function save($data){
        return $this->db->insert('error_workday_tmp', $data);
    }

    function get_all_validate(){
         return $this->db->get("error_workday_tmp");
    }

    function transfer_data(){
        $this->db->query("insert ignore error_workday select * from error_workday_tmp");
        $this->db->query("delete from error_workday_tmp");
    }


}

?>