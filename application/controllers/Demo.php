<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Demo extends CI_Controller {

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
	public function __construct(){
parent::__construct();
$this->load->library("ion_auth");
	}


	public function index()
	{

/*
		$identity = 'administrator';
		$password = 'admin1234';
		$remember = false; // remember the user
		$this->ion_auth->login($identity, $password, $remember);

$user = $this->ion_auth->user()->row ();
print_r($this->ion_auth->logged_in() );
*/



/*
$id = 1;
$data = array(
'password' => 'admin1234',
);
$this->ion_auth->update($id, $data);
*/


/*
$user = $this->ion_auth->user();
$data = array(
'identity' => $this->input->post('identity'),
'first_name' => $this->input->post('first_name'),
'last_name' => $this->input->post('last_name'),
);
if ($data['identity'] === $user->username || $data['identity'] === $user->email || $this->ion_auth->identity_check($data['identity']) === FALSE)
{
$this->ion_auth->update_user($user->id, $data)
}
*/

/*
if (!$this->ion_auth->is_admin())
{
$this->session->set_flashdata('message', 'You must be an admin to view this page');
redirect('w elcome/index');
}
*/

		$this->load->view("demo/header");
		$this->load->view("demo/index");
		$this->load->view("demo/js");

		$this->load->view("modules/user_management/app");

		//vue component bellow

	}
}
