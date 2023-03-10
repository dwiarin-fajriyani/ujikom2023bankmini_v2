<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	function __construct(){
		parent:: __construct();
		if(empty($this->session->userdata('username'))){
			redirect('auth');
		}
	} 
	public function index()
	{
		$this->load->view('templates/header');
		$this->load->view('home/beranda');
		$this->load->view('templates/footer');
	}

	
}

?>
