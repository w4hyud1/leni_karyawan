<?php
class Client extends CI_Controller{
    
    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('client_m');
    }

    public function index(){
        $data['get_all']        = $this->client_m->get_all();
        $data['title']			= "Data Client";
        $data['title_page']		= "Master Client";
        $data['page_content'] 	= "client_v";
        $this->load->view('utama_v',$data);
    }

    public function add(){
        $data['title']			= "Add Client";
        $data['title_page']		= "Add Client";
        $data['page_content']   = "client_add_v";
        $this->load->view('utama_v', $data);
    }

    public function save(){
        $data = array (
                'name'      => $this->input->post('name'),
                'address'   => $this->input->post('address'),
                'phone'     => $this->input->post('phone'),
                'npwp'      => $this->input->post('npwp')
            );
        $this->client_m->save_data($data);
        $this->index();
    }

    public function edit(){
        $data['title']			= "Edit Client";
        $data['get_data']       = $this->client_m->get_id($this->uri->segment(3))->row_array();
        $data['title_page']		= "Edit Client";
        $data['page_content']   = "client_edit_v";
        $this->load->view('utama_v', $data);
    }

    public function update(){
        $data = array (
            'name'      => $this->input->post('name'),
            'address'   => $this->input->post('address'),
            'phone'     => $this->input->post('phone'),
            'npwp'      => $this->input->post('npwp')
        );
        $id     = array ('id'  => $this->input->post('id'));
        $this->client_m->update_data($data, $id);
        $this->index();
    }

    public function delete(){
        $id         = $this->uri->segment(3);
        if(!empty($id)){
            $data = array ('id' => $id);
            $this->client_m->delete_data($data);
            $this->index();
        }
    }
}
?>