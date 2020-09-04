<?php
    class Absensi extends CI_Controller{
        
        public function __construct() {
            parent::__construct();
            $this->load->helper('url');
            $this->load->model('absensi_m');
        }
        
        public function index(){
            $nik    = $_SESSION['username'];
            $data['get_data']   = $this->absensi_m->get_data_where()->result();
            $this->load->view("absensi2_v", $data);
        }

        function save(){
            // cek isi data
            $nik    = $_SESSION['username'];
            $date   = date('Y-m-d');
            $status = $this->input->post('status');
            $cek = $this->db->query("select * from absensi where nik='$nik' and date='$date' and status='$status'")->num_rows();
            if($cek==0){
                $data = array (
                        'nik'       => $this->input->post('nik'),
                        'time'      => date("h:i:s"),
                        'date'      => date("Y-m-d"),
                        'status'    => $this->input->post('status'),
                        'activity'  => $this->input->post('activity'),
                        'remarks'   => $this->input->post('remarks')
                );
                $this->absensi_m->save_data($data);
                redirect ('absensi');
            }else{
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">you are already absent</div>');
                redirect ('absensi');
            }
            
        }

        function report(){
            $data['title']			= "Data Karyawan";
            $data['title_page']		= "Master Karyawan";
            $data['page_content'] 	= "absensi_report_v";
            $data['get_data']   = $this->absensi_m->get_data_all_mount()->result();
            $this->load->view('utama_v', $data);
        }
    }
    
?>