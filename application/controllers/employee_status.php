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
        $data['get_data']       = $this->employee_status_m->get_data_nik($this->uri->segment(3))->row();
        //$data['get_client']     = $this->employee_status_m->get_client()->result();
        //$data['get_jabatan']    = $this->employee_status_m->get_jabatan()->result();
        $data['title']			= "Employee Status";
        $data['title_page']		= "Employee Status";
        $data['page_content'] 	= "employee_status_edit_v";
        $this->load->view('utama_v',$data);
    }

    public function add(){
        $data['get_list']       = $this->employee_status_m->get_list()->result(); 
        $data['title']			= "Employee Status";
        $data['title_page']		= "Employee Status";
        $data['page_content'] 	= "employee_status_add_v";
        $this->load->view('utama_v',$data);
    }

    public function save(){
        $cek_save = array(
                'nik'               => $this->input->post('nik'),
                'contract_of_period'=> $this->input->post('periode_contract'));
        $data = array(
                'nik'               => $this->input->post('nik'),
                'join_date'         => $this->input->post('join_date'),
                'end_date'          => $this->input->post('end_date'),
                'inactive_date'     => $this->input->post('inactive_date'),
                'inactive_reason'   => $this->input->post('inactive_reason'),
                'contract_of_period'=> $this->input->post('periode_contract'));
        if($this->employee_status_m->cek_save($cek_save)==1){
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Faild save data because data exsiss</div>');
        }else{
            $this->employee_status_m->save($data);
            $this->session->set_flashdata('message', '<div class="alert alert-info" role="alert">Sucess save data</div>');
        }
        redirect ('employee_status');
    }


    public function update(){
        $data = array(
            'join_date'         => $this->input->post('join_date'),
            'end_date'          => $this->input->post('end_date'),
            'inactive_date'     => $this->input->post('inactive_date'),
            'inactive_reason'   => $this->input->post('inactive_reason'),
            'contract_of_period'=> $this->input->post('periode_contract'));
        $where = array('nik'    => $this->input->post('nik'));
        $this->employee_status_m->update_data($data, $where);
        $this->session->set_flashdata('message', '<div class="alert alert-info" role="alert">Sucess update data</div>');
        redirect ('employee_status');

    }

    public function delete($nik){
        $nik = $this->uri->segment(3);
        $this->employee_status_m->delete_data($nik);
        $this->session->set_flashdata('message', '<div class="alert alert-info" role="alert">Sucess delete data</div>');
        redirect ('employee_status');

    }
    
}

?>