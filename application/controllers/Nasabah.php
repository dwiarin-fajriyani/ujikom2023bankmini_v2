<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nasabah extends CI_Controller {
	function __construct(){
		parent:: __construct();
		if(empty($this->session->userdata('username'))){
			redirect('auth');
		}
		$this->load->model('Nasabah_model');
		$this->load->model('Kelas_model');
		$this->load->library('form_validation');
	} 
	public function index()
	{
		$data['nasabah'] = $this->Nasabah_model->tampilData()->result();
		if ($this->input->post('keyword')) {
			$data['nasabah'] = $this->Nasabah_model->cariData()->result();
		}
		$this->load->view('templates/header');
		$this->load->view('nasabah/tampil', $data);
		$this->load->view('templates/footer');
	}
	public function tambah(){
		$this->form_validation->set_rules('nisn_nik', 'NISN / NIK', 'required|is_unique[nasabah.nisn_nik]');
		$this->form_validation->set_rules('nama', 'nama nasabah', 'required');
		$this->form_validation->set_rules('alamat', 'alamat siswa', 'required');
		$this->form_validation->set_rules('notelp', 'No. Telp', 'required');

		if($this->form_validation->run() == FALSE){
			$data['kelas'] = $this->Kelas_model->tampilData()->result();
			$this->load->view('templates/header');
			$this->load->view('nasabah/tambah', $data);
			$this->load->view('templates/footer');
		} else{
			$this->Nasabah_model->tambahData();
			$this->session->set_flashdata('notif', 'ditambahkan');
			redirect('nasabah');
		}
		
	}
	public function hapus($id){
		$this->Nasabah_model->hapusData($id);
		$this->session->set_flashdata('notif', 'dihapus');
		redirect('nasabah');
	}
	public function edit($id){
		$this->form_validation->set_rules('nisn_nik', 'NISN / NIK', 'required');
		$this->form_validation->set_rules('nama', 'nama nasabah', 'required');
		$this->form_validation->set_rules('alamat', 'alamat siswa', 'required');
		$this->form_validation->set_rules('notelp', 'No. Telp', 'required');

		if($this->form_validation->run() == FALSE){
			$data['kelas'] = $this->Kelas_model->tampilData()->result(); 
			$data['nasabah'] = $this->Nasabah_model->tampilDataById($id)->row();
			$this->load->view('templates/header');
			$this->load->view('nasabah/edit', $data);
			$this->load->view('templates/footer');
		} else{
			//syntax untuk edit data
			$this->Nasabah_model->editData();
			$this->session->set_flashdata('notif', 'ditambahkan');
			redirect('nasabah');
		}
		
	}

}

