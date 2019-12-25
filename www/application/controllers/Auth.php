<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends MY_Controller {

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
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{	
		// Redirect to dashboard if logged in
		// Use function from system_helper
		if (get_logged_user() != null) {
			redirect('dashboard');
		}

		show_404();
	}

	public function login()
	{
		if (get_logged_user() != null) {
			redirect('dashboard');
		}

		$data = array(
			'title' => 'Login'
		);
		
		$data["error_message"] = [];

		// Validate post form
		if ($this->input->post()){
			
			$config = array(
				array(
						'field' => 'username',
						'label' => 'Username',
						'rules' => 'required'
				),
				array(
						'field' => 'password',
						'label' => 'Password',
						'rules' => 'required',
						'errors' => array(
							'required' => 'You must provide a %s.',
						),
				)
			);
			
			$this->form_validation->set_rules($config);
			$this->load->model('User_model');
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			
			// Validate form and check login from UserModel
			if ($this->form_validation->run() == true)
			{
				$user = $this->User_model->getUserByPassword($username, $password);

				if($user != null)
				{
					// Use function from system_helper
					set_logged_user($user);
					// Redirect to dashboard
					redirect('dashboard');		
				}
			}

			$data["error_message"][] = "Username/password does not match";

			// if ($this->session->userdata("loginattempts")) {
			// 	echo "2";
			// 	$postData = $this->input->post();
			// 	$loginattempts = $this->session->userdata("loginattempts");
			// 	if ($loginattempts > 4) { 
			// 		$data["error"] = 1;
			// 		$this->render('login', $data);
			// 	 } else {
			// 	 	$auth = $this->Admin_model->adminLogin($postData);
			// 		if ($auth == true) {
			// 			redirect(base_url(), "auto");
			// 		} else {
			// 			$data["error"] = 2;
			// 			$this->render('login', $data);
			// 		}
			// 	 } 
			// } else {
			// 	echo "1";
			// 	$this->session->set_userdata("loginattempts", 0);
			// 	$postData = $this->input->post();
			// 	$auth = $this->Admin_model->adminLogin($postData);
			// 	if ($auth == true) {
			// 		redirect(base_url(), "auto");
			// 	} else {
			// 		$data["error"] = 2;
			// 		$this->render('login', $data);
			// 	}
			// } 
		}

		// Show login form
		$this->render('login', $data);
	}

	public function logout()
	{
		user_logout();
		redirect('login');
	}
}
