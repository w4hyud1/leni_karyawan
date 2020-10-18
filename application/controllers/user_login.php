<?php 
class User_login extends CI_Controller{
    
    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('user_login_m');
    }

    public function index(){
        $data['title']			= "User Login";
        $data['title_page']		= "User Login";
        $data['page_content'] 	= "user_login_v";
        $data['get_data']   = $this->user_login_m->get_data()->result();
        $this->load->view('utama_v', $data);
    }

    public function load(){
        $this->user_login_m->load_data();
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data added successfully</div>');
        redirect ('user_login');
    }

    public function edit(){
        $data['title']			= "Edit User Login";
        $data['title_page']		= "Edit User Login";
        $data['page_content'] 	= "user_login_edit_v";
        $data['get_data']       = $this->user_login_m->get_data_where($this->uri->segment(3))->row();
        $this->load->view('utama_v', $data);
    }

    public function update(){
        $data = array(
                    'name'      => $this->input->post('name'),
                    'level'     => $this->input->post('level'),
                    'password'  => $this->input->post('password'),
                    'status'    => $this->input->post('status'));
        $where = array ('username'  => $this->input->post('username'));
        $this->user_login_m->update($data, $where);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data add successfully</div>');
        redirect ('user_login');
    }

    public function delete(){
        $this->user_login_m->delete($this->uri->segment(3));
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data delete successfully</div>');
        redirect ('user_login');
    }
}


?>