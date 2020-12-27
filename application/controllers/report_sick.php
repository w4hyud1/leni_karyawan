<?php
class Report_sick extends CI_Controller{
    
    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('report_sick_m');
    }

    public function index(){
        $data['get_all']        = $this->report_sick_m->get_all();
        $data['title']			= "Data Sick";
        $data['title_page']		= "Data Sick";
        $data['page_content'] 	= "report_sick_v";
        $this->load->view('utama_v',$data);
    }

    public function approve(){
        $id         = $this->uri->segment(3);
        if(!empty($id)){
            $data = array ('id' => $id);
            $this->report_sick_m->approve_sick($data);
            $this->session->set_flashdata('message', '<div class="alert alert-info" role="alert">Approve Success</div>');
            redirect ('report_sick');
        }
    }

    public function cancel(){
        $id         = $this->uri->segment(3);
        if(!empty($id)){
            $data = array ('id' => $id);
            $this->report_sick_m->cancel_sick($data);
            $this->session->set_flashdata('message', '<div class="alert alert-info" role="alert">Cancel Success</div>');
            redirect ('report_sick');
        }
    }

    public function add(){
        $data['title']			= "Data Cuti";
        $data['title_page']		= "Data Cuti";
        $data['get_data_employee']      = $this->report_sick_m->get_all_employee();
        $data['page_content']   = "report_sick_add_v";
        $this->load->view('utama_v', $data);
    }

    function list_cuti(){
        // POST data
        $postData = $this->input->post();
        // Get data
        $data = $this->report_sick_m->get_list_cuti_auto($postData);
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
        $this->report_sick_m->save_data($data);
        redirect ('report_sick');
    }

    public function edit(){
        $data['title']			= "Edit Sick";
        $data['get_data']       = $this->report_sick_m->get_id($this->uri->segment(3))->row_array();
        $data['title_page']		= "Edit Sick";
        $data['page_content']   = "report_sick_edit_v";
        $this->load->view('utama_v', $data);
    }

    public function update(){
        $data = array (
            'date'      => $this->input->post('date'),
            'activity'  => $this->input->post('activity'),
            'remarks'   => $this->input->post('remarks'),
        );
        $id     = array ('id'  => $this->input->post('id'));
        $this->report_sick_m->update_data($data, $id);
        $this->index();
    }  
}
?>