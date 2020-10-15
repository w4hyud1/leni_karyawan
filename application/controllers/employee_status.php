<?php
class Employee_status extends CI_Controller{

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('employee_status_m');
    }

    public function index(){
        //echo $this->uri->segment(4);
        $status = $this->input->get('status');
        //echo $status;
        if(isset($_GET['status'])){
            $get_nik = $this->employee_status_m->get_all_where($status)->result();
        }else{
            $get_nik = $this->employee_status_m->get_all()->result();
        }
        $data['title']		    = "Employee Status";
        $data['title_page']	    = "Employee Status";
        $data['page_content']   = "employee_status_v";
        $data['get_data']       = $get_nik;
        $this->load->view('utama_v', $data);
    }

    public function edit(){
        $data['get_data']       = $this->employee_status_m->get_data_nik($this->uri->segment(3));
        $data['get_client']     = $this->employee_status_m->get_client()->result();
        $data['get_jabatan']    = $this->employee_status_m->get_jabatan()->result();
        $data['title']			= "Employee Status";
        $data['title_page']		= "Employee Status";
        $data['page_content'] 	= "employee_status_edit_v";
        $this->load->view('utama_v',$data);
    }
}

?>