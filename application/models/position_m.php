<?php
class Position_m extends CI_Model{

    function get_all(){
        $this->db->order_by('name');
        return $this->db->get("position");
    }

    function get_id($id){
        $this->db->where('id',$id);
        return $this->db->get("position");
    }

    function save_data($name){
        $this->db->insert('position',$name);
    }   

    function update_data($data, $id){
        $this->db->where($id);
        $this->db->set($data);
        $this->db->update('position');
    }

    function delete_data($data){
        $this->db->delete('position', $data);
    }
    
}
?>