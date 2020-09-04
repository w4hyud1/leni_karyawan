<?php 
class User_login extends CI_Controller{
    
    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('user_login_m');
    }

    function index(){
        $data['title']			= "User Login";
        $data['title_page']		= "User Login";
        $data['page_content'] 	= "user_login_v";
        $data['get_data']   = $this->user_login_m->get_data()->result();
        $this->load->view('utama_v', $data);
    }

    function load(){
        $this->user_login_m->load_data();
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data added successfully</div>');
        redirect ('user_login');
    }
}


?>