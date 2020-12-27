<?php 
class Approve_spl extends CI_Controller{
    
    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('approve_spl_m');
    }

    function index(){
      //echo $this->input->get('nik');
      if(empty($this->input->get('nik'))){
        $data['get_data']     = $this->approve_spl_m->get_data_all()->result();
        
      }else{
        $data2 = array('nik' => $this->input->get('nik') , 'date' => $this->input->get('date') );
        $data['get_data']     = $this->approve_spl_m->get_data_where( $this->input->get('nik'),$this->input->get('date') )->result();
      }
        $data['title']			= "Reports Over Time";
        $data['title_page']		= "Reports Over Time";
        $data['page_content']   = "approve_spl_v";
        $data['list_employee']  = $this->approve_spl_m->get_employee()->result();
        // $data['get_data']     = $this->approve_spl_m->get_data_all()->result();
        $this->load->view('utama_v', $data);
    }

    public function add(){
        $data['get_data']       = $this->approve_spl_m->get_employee()->result();
        $data['title']			= "New Over Time";
        $data['title_page']		= "New Over Time";
        $data['page_content']   = "approve_spl_add_v";
        $this->load->view('utama_v', $data);
    }

    public function save(){
        $nik = $this->input->post('nik');
        $get_data = $this->approve_spl_m->get_employee_where($nik)->row();
        $data = array(  'nik'       => $nik, 
                        'name'      => $get_data->name,
                        'date'      => $this->input->post('date'),
                        'clock_in'  => $this->input->post('clock_in'),
                        'clock_out' => $this->input->post('clock_out'),
                        'activity'  => $this->input->post('activity'),
                        'total_hour'=> $this->input->post('total_hour')
                    );
        $this->approve_spl_m->save_data_spl($data);
        $this->session->set_flashdata('message', '<div class="alert alert-info" role="alert">Add Data Success</div>');
        redirect ('Approve_spl');

    }

    public function edit(){
        $data['title']			= "Edit Over Time";
        $data['get_data']       = $this->approve_spl_m->get_id($this->uri->segment(3))->row_array();
        $data['title_page']		= "Edit Over Time";
        $data['page_content']   = "approve_spl_edit_v";
        $this->load->view('utama_v', $data);
    }

    public function update(){
        $data = array (
            'activity'      => $this->input->post('activity'),
            'total_hour'    => $this->input->post('total_hour')
        );
        $id     = array ('id'  => $this->input->post('id'));
        $this->approve_spl_m->update_data($data, $id);
        redirect ('Approve_spl');
    }  

    public function approve(){
        $id         = $this->uri->segment(3);
        if(!empty($id)){
            $data = array ('id' => $id);
            $this->approve_spl_m->approve_spl($data);
            $this->session->set_flashdata('message', '<div class="alert alert-info" role="alert">Approve Success</div>');
            redirect ('approve_spl');
        }
    }

    public function cancel(){
        $id         = $this->uri->segment(3);
        if(!empty($id)){
            $data = array ('id' => $id);
            $this->approve_spl_m->cancel_spl($data);
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Cancel Success</div>');
            redirect ('Approve_spl');
        }
    }
}


?>