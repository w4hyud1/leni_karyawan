<?php
class Login extends CI_Controller{
    public function index(){
        $data['title']			= "Login Portal HRD";
        $data['title_page']		= "Login";
        $this->load->view('login_v',$data);
        // $this->load->view("login_v");
    }

    public function cek(){
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->db->get_where('user_login', ['username'=>$username])->row_array();
        if ($user) {
            if ($password == $user['password']){
                $data = [
                    'username'  => $user['username'],
                    'name'      => $user['name'],
                    'role_id'   => $user['role_id']
                ];
                $this->session->set_userdata($data);
                if($user['role_id'] == 1){
                    redirect ('');
                }else{
                    redirect ('absensi');
                }
                
            } else {
                
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong password</div>');
                redirect ('auth1'.$password);
                echo $username ."pass : ". $password;
            }
        }else {
            
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Username is not registered</div>');
            redirect('auth2');
            echo $username ."pass : ". $password;
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('role_id');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">You have been logged out!</div>');
        redirect('login');
    }
}

?>