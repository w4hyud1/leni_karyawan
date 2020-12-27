<?php
class List_national_holiday_m extends CI_Model{

    function get_all(){
        $this->db->order_by("id");
        return $this->db->get("list_national_holiday");
    }

    function get_id($id){
        $this->db->where('id',$id);
        return $this->db->get("list_national_holiday");
    }

    function save_data($data){
        $this->db->insert('list_national_holiday',$data);
    }   

    function update_data($data, $id){
        $this->db->where($id);
        $this->db->set($data);
        $this->db->update('list_national_holiday');
    }

    function delete_data($data){
        $this->db->delete('list_national_holiday', $data);
    }
    
}
?>