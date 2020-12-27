<?php
class List_cuti_m extends CI_Model{

    function get_all(){
        $this->db->order_by("id");
        return $this->db->get("list_cuti");
    }

    function get_id($id){
        $this->db->where('id',$id);
        return $this->db->get("list_cuti");
    }

    function save_data($data){
        $this->db->insert('list_cuti',$data);
    }   

    function update_data($data, $id){
        $this->db->where($id);
        $this->db->set($data);
        $this->db->update('list_cuti');
    }

    function delete_data($data){
        $this->db->delete('list_cuti', $data);
    }
    
}
?>