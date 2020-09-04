<?php
class Position extends CI_Controller{
    
    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('position_m');
    }

    public function index(){
        $data['get_all']        = $this->position_m->get_all();
        $data['title']			= "Data Position";
        $data['title_page']		= "Master Position";
        $data['page_content'] 	= "position_v";
        $this->load->view('utama_v',$data);
    }

    public function add(){
        $data['title']			= "Add Position";
        $data['title_page']		= "Add Position";
        $data['page_content']   = "position_add_v";
        $this->load->view('utama_v', $data);
    }

    public function save(){
        $data = array ('name' => $this->input->post('name'));
        $this->position_m->save_data($data);
        $this->index();
    }

    public function edit(){
        $data['title']			= "Edit Position";
        $data['get_data']       = $this->position_m->get_id($this->uri->segment(3))->row_array();
        $data['title_page']		= "Edit Position";
        $data['page_content']   = "position_edit_v";
        $this->load->view('utama_v', $data);
    }

    public function update(){
        $data   = array ('name' => $this->input->post('name'));
        $id     = array ('id'  => $this->input->post('id'));
        $this->position_m->update_data($data, $id);
        $this->index();
    }

    public function delete(){
        $id         = $this->uri->segment(3);
        if(!empty($id)){
            $data = array ('id' => $id);
            $this->position_m->delete_data($data);
            $this->index();
        }
    }
}
?>