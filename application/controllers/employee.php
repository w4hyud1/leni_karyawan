<?php
class Employee extends CI_Controller{
    
    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('employee_m');
    }

    public function index(){
        $data['get_all']        = $this->employee_m->get_all()->result();
        $data['title']			= "Data Employee";
        $data['title_page']		= "Master Employee";
        $data['page_content'] 	= "employee_v";
        $this->load->view('utama_v',$data);
    }

    public function add(){
        $old_nik = $this->employee_m->get_nik_new()->nik;
        if(strlen($old_nik)<10){
            $nik = "00".$old_nik;
        }elseif(strlen($old_nik)<100){
            $nik = "0".$old_nik;
        }else{
            $nik = $old_nik;
        }
        $new_nik = date("Y")."". $nik;
        $data['get_nik_new']    = $new_nik;
        $data['get_client']     = $this->employee_m->get_client()->result();
        $data['get_jabatan']    = $this->employee_m->get_jabatan()->result();
        $data['title_page']		= "Add Employee";
        $data['page_content']   = "employee_add_v";
        $this->load->view('utama_v', $data);
    }

    public function save(){
        $data = array (
            'nik'            => $this->input->post("nik"),
            'name'           => $this->input->post("name"),
            'id_client'      => $this->input->post("id_client"),
            'birth_date'     => $this->input->post("birth_date"),
            'birth_place'    => $this->input->post("birth_place"),
            'position'       => $this->input->post("position"),
            'gender'         => $this->input->post("gender"),
            'blood_type'     => $this->input->post("blood_type"),
            'marital_status' => $this->input->post("marital_status"),
            'cityzenship'    => $this->input->post("cityzenship"),
            'phone'          => $this->input->post("phone"),
            'religion'       => $this->input->post("religion"),
            'email'          => $this->input->post("email"),
            'id_number'      => $this->input->post("id_number"),
            'id_type'        => $this->input->post("id_type"),

            'card_expired'      => $this->input->post("card_expired"),
            'street'            => $this->input->post("street"),
            'city'              => $this->input->post("city"),
            'country'           => $this->input->post("country"),
            'state'             => $this->input->post("state"),
            'original_street'   => $this->input->post("original_street"),
            'original_city'     => $this->input->post("original_city"),
            'npwp'              => $this->input->post("npwp"),
            'ptkp_code'         => $this->input->post("ptkp_code"),
            'allowance'         => $this->input->post("allowance"),
            'overtime_allowance'=> $this->input->post("overtime_allowance"),
            'education_level'   => $this->input->post("education_level"),
            'education_major'   => $this->input->post("education_major"),
            'institution_name'  => $this->input->post("institution_name"),
            'graduation_year'   => $this->input->post("graduation_year"),
            'billing_rate'      => $this->input->post("billing_rate")         
        );
        $this->employee_m->save_data($data);
        redirect('employee');        
    }

    public function edit(){
        $data['get_data']       = $this->employee_m->get_data_nik($this->uri->segment(3));
        $data['get_client']     = $this->employee_m->get_client()->result();
        $data['get_jabatan']    = $this->employee_m->get_jabatan()->result();
        $data['title']			= "Data Employee";
        $data['title_page']		= "Master Employee";
        $data['page_content'] 	= "employee_edit_v";
        $this->load->view('utama_v',$data);

    }

    public function view(){
        $data['get_data']       = $this->employee_m->get_data_nik($this->uri->segment(3));
        $data['get_client']     = $this->employee_m->get_client()->result();
        $data['get_jabatan']    = $this->employee_m->get_jabatan()->result();
        $data['title']			= "Data Employee";
        $data['title_page']		= "Master Employee";
        $data['page_content'] 	= "employee_view_v";
        $this->load->view('utama_v',$data);

    }

    public function update(){
        $data = array (
            'name'           => $this->input->post("name"),
            'id_client'      => $this->input->post("id_client"),
            'birth_date'     => $this->input->post("birth_date"),
            'birth_place'    => $this->input->post("birth_place"),
            'position'       => $this->input->post("position"),
            'gender'         => $this->input->post("gender"),
            'blood_type'     => $this->input->post("blood_type"),
            'marital_status' => $this->input->post("marital_status"),
            'cityzenship'    => $this->input->post("cityzenship"),
            'phone'          => $this->input->post("phone"),
            'religion'       => $this->input->post("religion"),
            'email'          => $this->input->post("email"),
            'id_number'      => $this->input->post("id_number"),
            'id_type'        => $this->input->post("id_type"),
            
            'card_expired'      => $this->input->post("card_expired"),
            'street'            => $this->input->post("street"),
            'city'              => $this->input->post("city"),
            'country'           => $this->input->post("country"),
            'state'             => $this->input->post("state"),
            'original_street'   => $this->input->post("original_street"),
            'original_city'     => $this->input->post("original_city"),
            'npwp'              => $this->input->post("npwp"),
            'ptkp_code'         => $this->input->post("ptkp_code"),
            'allowance'         => $this->input->post("allowance"),
            'overtime_allowance'=> $this->input->post("overtime_allowance"),
            'education_level'   => $this->input->post("education_level"),
            'education_major'   => $this->input->post("education_major"),
            'institution_name'  => $this->input->post("institution_name"),
            'graduation_year'   => $this->input->post("graduation_year"),
            'billing_rate'      => $this->input->post("billing_rate") 
        );
        $nik = array('nik'   => $this->input->post("nik"));
        $this->employee_m->update_data($data,$nik);
        redirect('employee');   
    }

    public function delete(){
        $data = array('nik' => $this->uri->segment(3));
        $this->employee_m->delete_data($data);
        redirect('employee');
    }
}
?>