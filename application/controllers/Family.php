<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Family extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/family
	 *	- or -
	 * 		http://example.com/index.php/family/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/family/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */

	public function __construct() {
        parent::__construct();
        $this->load->helper('url', 'form');
        $this->load->library('form_validation');

		$this->load->model('family_model');

		$this->validateLogin();
    }

	public function index()
	{
		redirect("Family/familyinfo");
	}

	public function validateLogin(){

		$this->load->model('validate_model');
		$result = $this->validate_model->validate();
		
		if($result->output == "FALSE"){

			redirect("login");
		}
	}

	public function familyinfo(){

		$name = "";

		if ($this->input->server('REQUEST_METHOD') === 'POST') {

			$name = $this->input->post('familyname');
		};

		$data['fname'] = $name;
		$data['familyInfo'] = $this->family_model->familyinfo($name);

		$this->load->view('header');
		$this->load->view('familyinfo', $data);
		$this->load->view('footer');
	}

	public function createfamily(){

		if ($this->input->server('REQUEST_METHOD') === 'POST') {

			// this is CI form validations
				$this->form_validation->set_rules('name','Family Name','trim|required|max_length[30]');
				$this->form_validation->set_rules('surname','Surname','trim|required|max_length[30]');
				$this->form_validation->set_rules('mobno','Mobile Number','trim|required|max_length[10]');
				
			if($this->form_validation->run() == FALSE){

				$data['stateList'] = $this->family_model->stateList();
				$this->load->view('header');
				$this->load->view('createfamily', $data);
				$this->load->view('footer');
			}
			else {

				$config['upload_path']          = './uploads/';
				$config['allowed_types']        = 'gif|jpg|png';
				$config['max_size']             = 2048;
				$config['max_width']            = 1024;
				$config['max_height']           = 768;

				$this->load->library('upload', $config);

				if ( ! $this->upload->do_upload('familyphoto'))
				{
					$error = array('error' => $this->upload->display_errors());

					$this->load->view('header');
					$this->load->view('createemployee', $error);
					$this->load->view('footer');
				}
				else {

					$data = array('upload_data' => $this->upload->data());

					$name = $this->input->post('name');
					$surname = $this->input->post('surname');
					$dob = $this->input->post('dob');
					$mobno = $this->input->post('mobno');
					$address = $this->input->post('address');
					$state = $this->input->post('state');
					$city = $this->input->post('city');
					$pincode = $this->input->post('pincode');
					$mStatus = $this->input->post('mStatus');
					$wdob = $this->input->post('wdob');
					$hobbies = $this->input->post('hobbies');
					$photo = $data['upload_data']['file_name'];

					$result = $this->family_model->createfamilysave($name, $surname, $dob, $mobno, $address, $state, $city, $pincode, $mStatus, $wdob, $hobbies, $photo);

					if($result->output == "TRUE"){

						redirect("Family");
					}
					else {

						$data['error'] = $result->message;
						$data['stateList'] = $this->family_model->stateList();

						$this->load->view('header');
						$this->load->view('createemployee', $data);
						$this->load->view('footer');
					}
				}
			}
		} 
		else {

			$data['stateList'] = $this->family_model->stateList();

			$this->load->view('header');
			$this->load->view('createfamily', $data);
			$this->load->view('footer');
		}

	}

	public function addMembers(){

		if ($this->input->server('REQUEST_METHOD') === 'POST') {

			//this is CI form validations
				$this->form_validation->set_rules('name','Name','trim|required|max_length[30]');
				$this->form_validation->set_rules('dob','Date Of Birth','trim|required');

			$familyId = $this->input->get_post("for");

			if($this->form_validation->run() == FALSE){

				$data['familyId'] = $familyId;
				$this->load->view('header');
				$this->load->view('addMember', $data);
				$this->load->view('footer');
			}
			else {

				$config['upload_path']          = './uploads/';
				$config['allowed_types']        = 'gif|jpg|png';
				$config['max_size']             = 2048;
				$config['max_width']            = 1024;
				$config['max_height']           = 768;

				$this->load->library('upload', $config);

				if( ! $this->upload->do_upload("familyphoto")) {

					$error = array('error' => $this->upload->display_errors());

					$data['error'] = $error;
					$data['familyId'] = $familyId;

					$this->load->view('header');
					$this->load->view('addMember', $data);
					$this->load->view('footer');
				}
				else {

					$data = array('upload_data' => $this->upload->data());

					$name = $this->input->post('name');
					$dob = $this->input->post('dob');
					$mStatus = $this->input->post('mStatus');
					$wdob = $this->input->post('wdob');
					$education = $this->input->post('education');
					$photo = $data['upload_data']['file_name'];

					$result = $this->family_model->addMembersSave($familyId, $name, $dob, $mStatus, $wdob, $education, $photo);

					if($result->output == "TRUE"){

						redirect("Family");
					}
					else {

						$data['error'] = $result->message;
						$data['familyId'] = $familyId;

						$this->load->view('header');
						$this->load->view('addMember', $data);
						$this->load->view('footer');
					}
				}
			}
		}
		else {

			$data['familyId'] = $this->input->get_post('for');
			$this->load->view('header');
			$this->load->view('addMember', $data);
			$this->load->view('footer');
		}
		
	}

	public function viewMembers(){

		$familyId = $this->input->get_post('familyId');

		$result = $this->family_model->viewMembers($familyId);

		$this->load->view('header');
		$this->load->view('viewMembers', $result);
		$this->load->view('footer');
	}

	public function cityList(){

		$stateId = $this->input->get_post("stateId");

		$result = $this->family_model->cityList($stateId);

		echo json_encode($result);
	}

	public function logoutuser(){

		$this->session->sess_destroy();
		redirect("login");
	}
}
