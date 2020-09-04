<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Utama extends CI_Controller {

    public $periode = "012020";
	public function index()
	{
        $this->load->model("import_m");
		$data['title']			= "Dashboard";
        $data['page_content'] 	= "home_v";
        $this->load->view('utama_v',$data);
    }
    
    public function index2(){
        $this->load->model("import_m");
		$data['title']			= "Dashboard";
        $data['page_content'] 	= "import_v";
		$this->load->view('utama_v',$data);
    }

	
}
