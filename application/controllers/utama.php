<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Utama extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('utama_m');
    }

    public $periode = "012020";
	public function index()
	{
        $this->load->model("import_m");
        $data['title']			    = "Dashboard";
        $data['employee_all']       = $this->utama_m->count_employee_all()->row();
        $data['employee_warning']   = $this->utama_m->count_employee_warning()->row();
        $data['employee_danger']    = $this->utama_m->count_employee_danger()->row();
        $data['get_data']          = $this->utama_m->get_all()->result();
        $data['page_content'] 	    = "home_v";
        $this->load->view('utama_v',$data);
    }
    
    public function index2(){
        $this->load->model("import_m");
		$data['title']			= "Dashboard";
        $data['page_content'] 	= "import_v";
		$this->load->view('utama_v',$data);
    }

	
}
