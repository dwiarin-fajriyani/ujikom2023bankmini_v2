<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	function __construct(){
		parent:: __construct();
		if(empty($this->session->userdata('username'))){
			redirect('auth');
		}
		$this->load->model('User_model');
		$this->load->library('form_validation');
	} 
	public function index() {
		$data['user'] = $this->User_model->tampilData()->result();
		$this->load->view('templates/header');
		$this->load->view('user/tampil_user', $data);
		$this->load->view('templates/footer');
	}

	public function tambah() {
		$this->form_validation->set_rules('nama', 'Nama', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]');
		$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]');
		$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');
		if ($this->form_validation->run()== FALSE) {
			$data['user_role'] = $this->User_model->getUserRole()->result();
			$this->load->view('templates/header');
			$this->load->view('user/tambah', $data);
			$this->load->view('templates/footer');
		} else {
			$this->User_model->tambahDataUser();
			$this->session->set_flashdata('notif', 'ditambahkan');
			redirect('user');
		}
	}
}

?>