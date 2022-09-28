<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */

    public function __construct() {
        parent::__construct();
        $this->load->helper('url', 'form');
        $this->load->library('form_validation');
        $this->load->model('family_model');
    }

	public function index()
	{
		$this->load->view('login');
	}

    public function register(){

		$this->load->view('register');
	}

    public function registerSumbit(){
		
		//this is CI form validations
			$this->form_validation->set_rules('username','User Name','trim|required|max_length[30]');
			$this->form_validation->set_rules('password','Password','trim|required|min_length[6]|max_length[30]');
			$this->form_validation->set_rules('email','Email','trim|required|valid_email');

        
        if($this->form_validation->run() == FALSE){

            $data["notMsg"] = "Please Enter Valid Data";
            $data["notMsgType"] = "danger";
            $this->load->view("register", $data);
        }
        else {

            $username 	= $this->input->post('username');
            $email 		= $this->input->post('email');
            $password 	= $this->input->post('password');
    
            $result       = $this->family_model->registerSumbit($username, $email, $password);

            if ($result->output == "TRUE") {

                $data["notMsg"] = $result->message;
                $data["notMsgType"] = "success";
                $this->load->view("login",$data);
            }
            else {
    
                $data["notMsg"] = $result->message;
                $data["notMsgType"] = "danger";
                $this->load->view("register", $data);
            }
        }
	}

    public function validate() {

        //this is CI form validations
            $this->form_validation->set_rules('password','Password','trim|required');
            $this->form_validation->set_rules('email','Email','trim|required|valid_email');

        if($this->form_validation->run() == FALSE){

            $data["notMsg"] = "Please Enter Valid data.";
            $data["notMsgType"] = "danger";
            $this->load->view("login",$data);
        }
        else {


            $email    	= $this->input->post('email');
            $password   = $this->input->post('password');

            $result     = $this->family_model->loginSumbit($email, $password);

            if($result->output == "TRUE"){


                redirect('family/familyinfo');
            }
            else {

                redirect('login');
            }
        }
        
    }
}
