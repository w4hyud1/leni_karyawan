<?php
class List_national_holiday extends CI_Controller{
    
    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('list_national_holiday_m');
    }

    public function index(){
        $data['get_all']        = $this->list_national_holiday_m->get_all();
        $data['title']			= "List National Holiday";
        $data['title_page']		= "List National Holiday";
        $data['page_content'] 	= "list_national_holiday_v";
        $this->load->view('utama_v',$data);
    }

    public function add(){
        $data['title']			= "Add List National Holiday";
        $data['title_page']		= "Add List National Holiday";
        $data['page_content']   = "list_national_holiday_add_v";
        $this->load->view('utama_v', $data);
    }

    public function save(){
        $data = array (
                'name_holiday' => $this->input->post('name'),
                'date' => $this->input->post('date')
            );
        $this->list_national_holiday_m->save_data($data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Add National Holiday success</div>');
        $this->index();
    }

    public function edit(){
        $data['title']			= "Edit List National Holiday";
        $data['get_data']       = $this->list_national_holiday_m->get_id($this->uri->segment(3))->row_array();
        $data['title_page']		= "Edit List National Holiday";
        $data['page_content']   = "list_national_holiday_edit_v";
        $this->load->view('utama_v', $data);
    }

    public function update(){
        $data = array (
                'name_holiday'  => $this->input->post('name'),
                'date'    => $this->input->post('date')
        );
        $id     = array ('id'  => $this->input->post('id'));
        $this->list_national_holiday_m->update_data($data, $id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Update National Holiday success</div>');
        $this->index();
    }

    public function delete(){
        $id         = $this->uri->segment(3);
        if(!empty($id)){
            $data = array ('id' => $id);
            $this->list_national_holiday_m->delete_data($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Delete National Holiday success</div>');
            $this->index();
        }
    }
}
?>