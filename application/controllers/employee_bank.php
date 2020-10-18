<?php
class Employee_bank extends CI_Controller{

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('employee_bank_m');
    }

    public function index(){
        if(isset($_GET['status'])){
            $get_nik = $this->employee_bank_m->get_all_where($status)->result();
        }else{
            $get_nik = $this->employee_bank_m->get_all()->result();
        }
        $data['title']		    = "Employee Bank & Salary";
        $data['title_page']	    = "Employee Bank & Salary";
        $data['page_content']   = "employee_bank_v";
        $data['get_data']       = $get_nik;
        $this->load->view('utama_v', $data);
    }

    public function edit(){
        $data['get_data']       = $this->employee_bank_m->get_data_nik($this->uri->segment(3))->row();
        $data['get_bank']       = $this->employee_bank_m->get_bank()->result();
        $data['title']			= "Employee Bank & Salary";
        $data['title_page']		= "Employee Bank & Salary";
        $data['page_content'] 	= "employee_bank_edit_v";
        $this->load->view('utama_v',$data);
    }

    public function add(){
        $data['get_list']       = $this->employee_bank_m->get_list()->result(); 
        $data['get_bank']       = $this->employee_bank_m->get_bank()->result();
        $data['title']			= "Employee Bank & Salary";
        $data['title_page']		= "Employee Bank & Salary";
        $data['page_content'] 	= "employee_bank_add_v";
        $this->load->view('utama_v',$data);
    }

    public function save(){
        $cek_save = array(
                'nik'               => $this->input->post('nik'),
                'contract_of_period'=> $this->input->post('periode_contract'));
        $data = array(
                'nik'               => $this->input->post('nik'),
                'contract_of_period'=> $this->input->post('periode_contract'),
                'name_of_bank'      => $this->input->post('name_of_bank'),
                'bank_account'      => $this->input->post('bank_account'),
                'salary'            => $this->input->post('salary'),
                'status'            => $this->input->post('status')
                );
        if($this->employee_bank_m->cek_save($cek_save)==1){
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Faild save data because data exsiss</div>');
        }else{
            $this->employee_bank_m->save($data);
            $this->session->set_flashdata('message', '<div class="alert alert-info" role="alert">Sucess save data</div>');
        }
        redirect ('employee_bank');
    }


    public function update(){
        $data = array(
                'nik'               => $this->input->post('nik'),
                'contract_of_period'=> $this->input->post('periode_contract'),
                'name_of_bank'      => $this->input->post('name_of_bank'),
                'bank_account'      => $this->input->post('bank_account'),
                'salary'            => $this->input->post('salary'),
                'status'            => $this->input->post('status')
                );
        $where = array('nik'    => $this->input->post('nik'));
        $this->employee_bank_m->update_data($data, $where);
        $this->session->set_flashdata('message', '<div class="alert alert-info" role="alert">Sucess update data</div>');
        redirect ('employee_bank');

    }

    public function delete($nik){
        $nik = $this->uri->segment(3);
        $this->employee_bank_m->delete_data($nik);
        $this->session->set_flashdata('message', '<div class="alert alert-info" role="alert">Sucess delete data</div>');
        redirect ('employee_bank');

    }
    
}

?>