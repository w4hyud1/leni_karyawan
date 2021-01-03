<?php
class Employee_status_m extends CI_Model{

    function get_all(){
        return $this->db->query("select es.*, e.name from employee_status es left join employee e on es.nik=e.nik;");
        //return $this->db->get("employee_status");
    }

    function get_all_where($status){
        if($status=="active"){
            $query = $this->db->query("SELECT es.*, e.name FROM employee_status es LEFT JOIN employee e ON es.nik=e.nik WHERE inactive_date = '0000-00-00'");
        }elseif($status=='cek'){
            $query = $this->db->query("SELECT 
            es.* ,e.name, TIMESTAMPDIFF(MONTH, es.end_date, NOW()) AS selisih
            FROM employee_status AS es LEFT JOIN employee AS e ON es.nik=e.nik WHERE TIMESTAMPDIFF(MONTH, es.end_date, NOW())>=2 AND es.inactive_date='0000-00-00'");
        }else{
            $query = $this->db->query("SELECT es.*, e.name FROM employee_status es LEFT JOIN employee e ON es.nik=e.nik WHERE inactive_date <> '0000-00-00'");
        }
        return $query;
        //echo $this->db->last_query(); exit;
    }
    
    function get_list(){
        return $this->db->query("select nik, name from employee");
        //return $this->db->get("employee");
    }

    function get_data_nik($nik){
        return $this->db->query("SELECT es.*, e.name FROM employee_status es LEFT JOIN employee e ON es.nik=e.nik WHERE es.nik=$nik");
    }

    function update_data($data,$where){
        $this->db->where($where);
        $this->db->set($data);
        $query = $this->db->update('employee_status');
        //echo $this->db->last_query(); exit;
    }

    function cek_save($cek_save){
        $this->db->where($cek_save);
        return $this->db->get("employee_status")->num_rows();
    }

    function save($data){
        return $this->db->insert('employee_status',$data);
    }
    
    function count_contract(){
        return $this->db->select('select max(contract_of_periode) from employee_status');
    }

    function delete_data($nik){
        $this->db->where('nik', $nik);
        $this->db->delete('employee_status');
    }

    function set_cuti(){
        $this->db->query("UPDATE employee_status SET cuti=12-MONTH(join_date) WHERE YEAR(join_date)=YEAR(NOW());");
    }

    function set_cuti_12(){
        $this->db->query("UPDATE employee_status SET cuti=12 WHERE YEAR(join_date)<>YEAR(NOW());");
    }

    function update_cuti2(){
        date_default_timezone_set('Asia/Jakarta');
        $query = $this->db->query("UPDATE employee_status es
        JOIN (SELECT nik, COUNT(nik) AS cuti FROM cuti WHERE status='Approve' AND YEAR(date)=YEAR(NOW()) GROUP BY nik) AS c
        ON es.nik=c.nik
        SET es.cuti=es.cuti-c.cuti,
           es.upddate=NOW()");
        
    }

    function update_cuti(){
        date_default_timezone_set('Asia/Jakarta');
        $query = $this->db->query("SELECT nik,COUNT(*) AS count_cuti FROM cuti WHERE status='Approve' GROUP BY nik");
        $row = $query->row();
        $num_row = $query->num_rows();
        for($i = 1; $i <= $num_row; $i++){
            $query = $this->db->query("SELECT nik,COUNT(*) AS count_cuti FROM cuti WHERE status='Approve' and nik='$row->nik' GROUP BY nik")->row();
            $row2 = $this->db->query("SELECT nik,cuti,contract_of_period FROM employee_status WHERE status='Active' AND nik='$query->nik'")->row();
            if(isset($row2)){
                $saldo_cuti = $row2->cuti;
                $cuti       = $query->count_cuti;
                $sisa_cuti=$saldo_cuti-$cuti;
                $query_update = $this->db->query("UPDATE employee_status SET cuti='$sisa_cuti', upddate=now() where nik='$query->nik' and contract_of_period='$row2->contract_of_period'") ;
            }
        }
    }

}

?>