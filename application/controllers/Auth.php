<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	function __construct(){
		parent:: __construct();
		$this->load->library('form_validation');
		$this->load->model('User_model');
	} 

	public function index()
	{
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		if($this->form_validation->run() == FALSE) {
			$data['role'] = $this->User_model->getUserRole()->result();
			$this->load->view('templates/headerNavless');
			$this->load->view('formlogin', $data);
			$this->load->view('templates/footer');
		} else {
			$this->_login();
		}
	}

	private function _login(){
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$role_id = $this->input->post('roleId');

		if($role_id == 1 || $role_id == 2){
			$user = $this->db->get_where('petugas', ['username' => $email])->row();
		} elseif($role_id == 3){
			$user = $this->db->get_where('nasabah', ['username' => $email])->row();
		}
		
		//jika usernya ada
		if ($user) {
			//cek password
			if(password_verify($password, $user->password)){
				if($role_id == 1 || $role_id == 2){
					$data = [
						'username' => $user->username,
						'role_id' => $user->role_id,
						'id' => $user->id_petugas
					];
					$this->session->set_userdata($data);
					redirect('home');
				} elseif($role_id == 3){
					$data = [
						'username' => $user->username,
						'role_id' => '3',
						'id' => $user->no_rek
					];
					$this->session->set_userdata($data);
					redirect('member');
				}
			} else{
				$this->session->set_flashdata('notif', 'Password salah!');
				redirect('auth');
			}
		} else{
			$this->session->set_flashdata('notif', 'Email belum terdaftar!');
			redirect('auth');
		}
	}

	public function logout() {
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('role_id');
		redirect('auth');
	}
}

