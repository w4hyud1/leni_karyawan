<?php
class Client_m extends CI_Model{

    function get_all(){
        $this->db->order_by("name");
        return $this->db->get("client");
    }

    function get_id($id){
        $this->db->where('id',$id);
        return $this->db->get("client");
    }

    function save_data($data){
        $this->db->insert('client',$data);
    }   

    function update_data($data, $id){
        $this->db->where($id);
        $this->db->set($data);
        $this->db->update('client');
    }

    function delete_data($data){
        $this->db->delete('client', $data);
    }
    
}
?>