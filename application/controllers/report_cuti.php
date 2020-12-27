<?php
class Report_cuti extends CI_Controller{
    
    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('report_cuti_m');
    }

    public function index(){
        $data['get_all']        = $this->report_cuti_m->get_all();
        $data['title']			= "Data Cuti";
        $data['title_page']		= "Data Cuti";
        $data['page_content'] 	= "report_cuti_v";
        $this->load->view('utama_v',$data);
    }

    public function approve(){
        $id         = $this->uri->segment(3);
        if(!empty($id)){
            $data = array ('id' => $id);
            $this->report_cuti_m->approve_cuti($data);
            $this->session->set_flashdata('message', '<div class="alert alert-info" role="alert">Approve Success</div>');
            redirect ('report_cuti');
        }
    }

    public function cancel(){
        $id         = $this->uri->segment(3);
        if(!empty($id)){
            $data = array ('id' => $id);
            $this->report_cuti_m->cancel_cuti($data);
            $this->session->set_flashdata('message', '<div class="alert alert-info" role="alert">Cancel Success</div>');
            redirect ('report_cuti');
        }
    }

    public function add(){
        $data['title']			= "Data Cuti";
        $data['title_page']		= "Data Cuti";
        $data['get_data_employee']      = $this->report_cuti_m->get_all_employee();
        $data['get_data_list_cuti']     = $this->report_cuti_m->get_list_cuti();
        $data['page_content']   = "report_cuti_add_v";
        $this->load->view('utama_v', $data);
    }

    function list_cuti(){
        // POST data
        $postData = $this->input->post();
        // Get data
        $data = $this->report_cuti_m->get_list_cuti_auto($postData);
        echo json_encode($data);
    }

    public function save(){
        $data = array (
                'nik'       => $this->input->post('nik'),
                'date'      => $this->input->post('date'),
                'activity'  => $this->input->post('activity'),
                'remarks'   => $this->input->post('remarks'),
                'status'    => 'Pending'
            );
        $this->report_cuti_m->save_data($data);
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
}
?>