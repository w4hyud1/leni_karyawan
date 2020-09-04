<?php
class Karyawan extends CI_Controller{
    
    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('karyawan_m');
    }

    public function index(){
        $data['get_all']        = $this->karyawan_m->get_all()->result();
        $data['title']			= "Data Employee";
        $data['title_page']		= "Master Employee";
        $data['page_content'] 	= "karyawan_v";
        $this->load->view('utama_v',$data);
    }

    public function add(){
        $old_nik = $this->karyawan_m->get_nik_new()->nik;
        if(strlen($old_nik)<10){
            $nik = "00".$old_nik;
        }elseif(strlen($old_nik)<100){
            $nik = "0".$old_nik;
        }else{
            $nik = $old_nik;
        }
        $new_nik = date("Y")."". $nik;
        $data['get_nik_new']    = $new_nik;
        $data['get_client']     = $this->karyawan_m->get_client()->result();
        $data['get_jabatan']    = $this->karyawan_m->get_jabatan()->result();
        $data['title_page']		= "Add Employee";
        $data['page_content']   = "karyawan_add_v";
        $this->load->view('utama_v', $data);
    }

    public function save(){
        // $nik            = $this->input->post("nik");
        // $name           = $this->input->post("name");
        // $id_client      = $this->input->post("id_client");
        // $birth_date     = $this->input->post("birth_date");
        // $birth_place    = $this->input->post("birth_place");
        // $position       = $this->input->post("position");
        // $gender         = $this->input->post("gender");
        // $blooad_type    = $this->input->post("blooad_type");
        // $marital_status = $this->input->post("marital_status");
        // $cityzenship    = $this->input->post("cityzenship");
        // $phone          = $this->input->post("phone");
        // $religion       = $this->input->post("religion");
        // $email          = $this->input->post("email");
        // $id_number      = $this->input->post("id_number");
        // $id_type        = $this->input->post("id_type");
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
            'id_type'        => $this->input->post("id_type")    
        );
        $this->karyawan_m->save_data($data);
        redirect('karyawan');        
    }

    public function edit(){
        $data['get_data']       = $this->karyawan_m->get_data_nik($this->uri->segment(3));
        $data['get_client']     = $this->karyawan_m->get_client()->result();
        $data['get_jabatan']    = $this->karyawan_m->get_jabatan()->result();
        $data['title']			= "Data Employee";
        $data['title_page']		= "Master Employee";
        $data['page_content'] 	= "karyawan_edit_v";
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
            'id_type'        => $this->input->post("id_type")    
        );
        $nik = array('nik'   => $this->input->post("nik"));
        $this->karyawan_m->update_data($data,$nik);
        redirect('karyawan');   
    }

    public function delete(){
        $data = array('nik' => $this->uri->segment(3));
        $this->karyawan_m->delete_data($data);
        redirect('karyawan');
    }
}
?>