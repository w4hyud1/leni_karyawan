<?php
    class Absensi extends CI_Controller{
        
        public function __construct() {
            parent::__construct();
            $this->load->helper('url');
            $this->load->model('absensi_m');
            date_default_timezone_set('Asia/Jakarta');
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
            //cek clock in
            if($status=='IN'){
                $cek = $this->db->query("select * from absensi where nik='$nik' and date='$date'")->num_rows();
                if($cek==0){
                    $data = array (
                            'nik'       => $this->input->post('nik'),
                            'date'      => date("Y-m-d"),
                            'clock_in'  => date("G:i:s"),
                            'activity'  => $this->input->post('activity'),
                            'remarks'   => $this->input->post('remarks')
                    );
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Add Absensi success</div>');
                    $this->absensi_m->save_data($data);
                    redirect ('absensi');
                }else{
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">you are already absensi</div>');
                    redirect ('absensi');
                }
            //cek clock out
            }else{
                $cek = $this->db->query("select * from absensi where nik='$nik' and date='$date' and clock_out<>NUll")->num_rows();
                if($cek==0){
                    $data = array (
                            'clock_out' => date("G:i:s"),
                            'activity'  => $this->input->post('activity'),
                            'remarks'   => $this->input->post('remarks')
                    );
                    $data_where = array (
                                'nik'       => $this->input->post('nik'),
                                'date'      => date("Y-m-d")
                    );
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Add Absensi success</div>');
                    $this->absensi_m->update_clock_out($data, $data_where);
                    redirect ('absensi');
                }else{
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">you are already absensi</div>');
                    redirect ('absensi');
                }
            }
            
        }

        function report(){
            $data['title']			= "Data Karyawan";
            $data['title_page']		= "Master Karyawan";
            $data['page_content'] 	= "absensi_report_v";
            $data['get_data']   = $this->absensi_m->get_data_all_mount()->result();
            $this->load->view('utama_v', $data);
        }

        function coba(){
            $this->absensi_m->create_templet_report_absensi();
        }
    }
    
?>