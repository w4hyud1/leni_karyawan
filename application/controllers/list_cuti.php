<?php
class List_cuti extends CI_Controller{
    
    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('list_cuti_m');
    }

    public function index(){
        $data['get_all']        = $this->list_cuti_m->get_all();
        $data['title']			= "List Cuti";
        $data['title_page']		= "List Cuti";
        $data['page_content'] 	= "list_cuti_v";
        $this->load->view('utama_v',$data);
    }

    public function add(){
        $data['title']			= "Add List Cuti";
        $data['title_page']		= "Add List Cuti";
        $data['page_content']   = "list_cuti_add_v";
        $this->load->view('utama_v', $data);
    }

    public function save(){
        $data = array (
                'name'       => $this->input->post('name'),
                'count_cuti' => $this->input->post('count_cuti')
            );
        $this->list_cuti_m->save_data($data);
        $this->index();
    }

    public function edit(){
        $data['title']			= "Edit Client";
        $data['get_data']       = $this->list_cuti_m->get_id($this->uri->segment(3))->row_array();
        $data['title_page']		= "Edit Client";
        $data['page_content']   = "list_cuti_edit_v";
        $this->load->view('utama_v', $data);
    }

    public function update(){
        $data = array (
                'name'       => $this->input->post('name'),
                'count_cuti' => $this->input->post('count_cuti')
        );
        $id     = array ('id'  => $this->input->post('id'));
        $this->list_cuti_m->update_data($data, $id);
        $this->index();
    }

    public function delete(){
        $id         = $this->uri->segment(3);
        if(!empty($id)){
            $data = array ('id' => $id);
            $this->list_cuti_m->delete_data($data);
            $this->index();
        }
    }
}
?>