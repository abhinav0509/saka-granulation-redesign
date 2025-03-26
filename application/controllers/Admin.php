<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function index()
	{
		$this->load->view('cms/header');
        $this->load->view('cms/dashboard');
        $this->load->view('cms/footer');
	}
}
