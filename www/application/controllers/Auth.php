<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

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
		$data = array(
 			'title' => 'Login'             
        );
		$this->load->model('blog_model','test_model');
		var_dump($this->test_model->get_last_ten_entries());

        //$this->template->load('default', 'login', $data);
	}

	public function login()
	{
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

		if ($this->form_validation->run() == FALSE)
		{
				$this->index();
		}
		else
		{
				echo 'Success';
		}
		
	}
}
