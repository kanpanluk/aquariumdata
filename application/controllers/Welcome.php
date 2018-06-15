<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

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
        if($this->session->userdata('login')){
            redirect('MyController/index','refresh');
        }
	    else $this->load->view('login');
	}

    public function logincheck()
    {
        $name = $this->input->post('name');
        $password = $this->input->post('password');

        $check = $this->QueryJSONModel->logincheck($name,$password);

        if($check){

            redirect('MyController/index','refresh');
        }
        else{
            echo "<script>alert('Wrong Username or Password');</script>";
            redirect('Welcome/index','refresh');

        }

    }


}
