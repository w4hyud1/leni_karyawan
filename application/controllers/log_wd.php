<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Karyawan extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('karyawan_m');
        // if ($this->session->userdata('nik') == null) {
        //     redirect(base_url().'auth/login');
        // }elseif ($this->session->userdata('level') == 'Karyawan') {
        //     redirect(base_url().'user');
        // }
    }

	public function index(){
        if($this->input->get('order_id')==true || $this->input->get('process_date')==true ){
            $order_id       = $this->input->get("order_id");
            $process_date   = $this->input->get("process_date");
            $type_data      = $this->input->get("type_data");
            
            if($order_id<>null && $type_data=="all"){
                $data['get_error']      = $this->log_wd_m->get_error_wd_where1($order_id, $process_date);
            }elseif($order_id==null){
                $data['get_error']      = $this->log_wd_m->get_error_wd_where3($process_date, $type_data);
            }else{
                $data['get_error']      = $this->log_wd_m->get_error_wd_where2($order_id, $process_date, $type_data);
            }

        }elseif($this->input->get('order_id')==false && $this->input->get('process_date')==true){
            $order_id               = $this->input->get("process_date");
            $data['get_error']      = $this->log_wd_m->get_error_wd_where($process_date);
        }else{
            $data['get_error']      = $this->log_wd_m->get_error_wd();
        }
        $data['title']			= "Log Push Workday";
        $data['title_page']     = "Log Push Workday";
        $data['page_content'] 	= "log_wd_v";
        $this->load->view('utama_v',$data);
    }

    public function import(){
        $data['title']			= "Import Log Push";
        $data['title_page']     = "Import Log Push Workday";
        $data['page_content'] 	= "log_import_v";
        $this->load->view('utama_v',$data);
    }
    
    public function process_data()
	{
		if ( isset($_POST['import'])) {

            $file = $_FILES['file_error']['tmp_name'];

			// Medapatkan ekstensi file csv yang akan diimport.
			$ekstensi  = explode('.', $_FILES['file_error']['name']);

			// Tampilkan peringatan jika submit tanpa memilih menambahkan file.
			if (empty($file)) {
				echo 'File tidak boleh kosong!';
			} else {
				// Validasi apakah file yang diupload benar-benar file csv.
				if (strtolower(end($ekstensi)) === 'csv' && $_FILES["file_error"]["size"] > 0) {

					$i = 0;
					$handle = fopen($file, "r");
					while (($row = fgetcsv($handle, 2048))) {
						$i++;
						if ($i == 1) continue;
						
						// Data yang akan disimpan ke dalam databse
						$data = [
                            'type_data' => $this->input->post('type_data'),
                            'process_date' => $row[0],
                            'data_date' => $this->input->post('data_date'),
							'severity' => $row[1],
							'order_id' => $row[2],
                            'message' => $row[3],
                            'message_details' => $row[4],
						];
						// Simpan data ke database.
						$this->log_wd_m->save($data);
					}

					fclose($handle);
					redirect('log_wd\validate');

				} else {
					echo 'Format file tidak valid!';
				}
			}
        }
    }
    
    function validate(){
        $data['get_validate']   = $this->log_wd_m->get_all_validate();
        $data['title']			= "Validate Data";
        $data['title_page']     = "Validate Data Upload";
        $data['page_content']   = "log_validate_v";
        $this->load->view("utama_v", $data);
    }

    function transfer(){
        $this->log_wd_m->transfer_data();
        redirect('log_wd');
    }
	
}
