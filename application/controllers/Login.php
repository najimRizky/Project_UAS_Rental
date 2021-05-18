<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller{
    public function __construct(){
		parent::__construct();
        session_start();
        $this->load->model('user');
        $this->load->model('transaction');
        if(isset($_SESSION['role'])) redirect(base_url());
	}
    
    public function index(){
        $data['nav'] = $this->load->view('components/nav',NULL, TRUE);
        $data['style'] = $this->load->view('include/ui',NULL,TRUE);
        $this->load->view('pages/login',$data);
    }

    public function auth(){
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        if($this->user->cekUser($email, md5($password))){
            if($this->user->getRole($email) == "0"){
                $_SESSION['role'] = 'admin';
                $_SESSION['email'] = $email;
            } else {
                $_SESSION['role'] = 'customer';
                $_SESSION['email'] = $email;
            }
            redirect(base_url());
        } else {
            redirect(base_url('index.php/Login?login=false'));
        }
    }

    public function logOut(){
        session_destroy();  
        redirect(base_url());
    }
}
?>