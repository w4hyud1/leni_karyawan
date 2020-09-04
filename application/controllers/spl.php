<?php
    class Spl extends CI_Controller{
        
        public function __construct() {
            parent::__construct();
            $this->load->helper('url');
            $this->load->model('spl_m');
        }
        
        public function index(){
            $nik    = $_SESSION['username'];
            $data['get_data']   = $this->spl_m->get_data_where()->result();
            $this->load->view("spl_v", $data);
        }

        function save(){
            $nik    = $_SESSION['username'];
            $date   = date('Y-m-d');
            $status = $this->input->post('status');
            $cek = $this->db->query("select * from spl where nik='$nik' and date='$date'")->num_rows();
            if($cek==0){
                $data   = array (
                            'nik'       => $_SESSION['username'],
                            'name'      => $_SESSION['name'],
                            'date'      => date("Y-m-d"),
                            'total_hour'=> $this->input->post('total_hour'),
                            'clock_in'  => $this->input->post('clock_in'),
                            'clock_out' => $this->input->post('clock_out'),
                            'activity'  => $this->input->post('activity')
                );
                $this->spl_m->save_data($data);
                redirect ('spl');
            }else{
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">you are already over times</div>');
                redirect ('spl');
            }
        }
    }
    
?>