<?php
class Report_cuti_m extends CI_Model{

    function get_all(){
        return $this->db->query("SELECT c.*,e.name FROM cuti AS c LEFT JOIN employee e ON c.nik=e.nik");
    }

    function get_all_employee(){
        return $this->db->query('select nik,`name` from employee');
        // $this->db->select('nik','name');
        // return $this->db->get('employee');
    }

    function get_list_cuti(){
        return $this->db->get('list_cuti');
    }

    function get_list_cuti_auto($postData){

        $response = array();
   
        if(isset($postData['search']) ){
          // Select record
          $this->db->select('*');
          $this->db->where("name like '%".$postData['search']."%' ");
   
          $records = $this->db->get('list_cuti')->result();
   
          foreach($records as $row ){
             $response[] = array("value"=>$row->count_cuti,"label"=>$row->name);
          }
   
        }
   
        return $response;
     }

    function save_data($data){
        $this->db->insert('cuti',$data);
    }   

    function approve_cuti($data){
        $this->db->where($data);
        $this->db->set('status', 'Approve');
        $this->db->update('cuti');
    }

    function cancel_cuti($data){
        $this->db->where($data);
        $this->db->set('status', 'Cancel');
        $this->db->update('cuti');
    }

    function delete_data($data){
        $this->db->delete('client', $data);
    }
    
}
?>