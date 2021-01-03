<?php
    class Cuti extends CI_Controller{
        
        public function __construct() {
            parent::__construct();
            $this->load->helper('url');
            $this->load->model('cuti_m');
            $this->load->model('employee_status_m');
        }
        
        public function index(){
            $nik    = $_SESSION['username'];
            $this->employee_status_m->set_cuti();
            $this->employee_status_m->set_cuti_12();
            $this->employee_status_m->update_cuti2();
            $data['get_data']   = $this->cuti_m->get_data_where()->result();
            $data['count_cuti'] = $this->cuti_m->count_cuti()->row();
            $data['list_cuti'] = $this->cuti_m->list_cuti()->result();
            $this->load->view("cuti_v", $data);
        }

        function save(){
            date_default_timezone_set('Asia/Jakarta');
            // cek isi data
            $nik    = $_SESSION['username'];
            $date   = $this->input->post('date');
            $status = $this->input->post('status');
            $cek = $this->db->query("select * from cuti where nik='$nik' and date='$date'")->num_rows();
            if($cek==0){
                $data = array (
                        'nik'       => $this->input->post('nik'),
                        'date'      => $this->input->post('date'),
                        'activity'  => $this->input->post('activity'),
                        'remarks'   => $this->input->post('remarks'),
                        'adddate'   => date('Y-m-d h:i:s'),
                        'status'    => "Pending"
                );
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Add cuti success</div>');
                $this->cuti_m->save_data($data);
                redirect ('cuti');
            }else{
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">you are already Cuti</div>');
                redirect ('cuti');
            }
            
        }

        function report(){
            $data['title']			= "Data Karyawan";
            $data['title_page']		= "Master Karyawan";
            $data['page_content'] 	= "cuti_report_v";
            $data['get_data']   = $this->cuti_m->get_data_all_mount()->result();
            $this->load->view('utama_v', $data);
        }

        function coba(){
            $this->cuti_m->create_report_cuti();
        }
    }
    
?>