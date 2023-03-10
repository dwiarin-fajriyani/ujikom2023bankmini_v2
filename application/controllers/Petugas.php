<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Petugas extends CI_Controller {
	function __construct(){
		parent:: __construct();
		if(empty($this->session->userdata('username'))){
			redirect('auth');
		}
		$this->load->model('Petugas_model');
		$this->load->model('Kelas_model');
		$this->load->library('form_validation');
	} 
	public function index()
	{
		$data['petugas'] = $this->Petugas_model->tampilData()->result();
		if ($this->input->post('keyword')) {
			$data['petugas'] = $this->Petugas_model->cariData()->result();
		}
		$this->load->view('templates/header');
		$this->load->view('petugas/tampil', $data);
		$this->load->view('templates/footer');
	}
	public function tambah(){
		$this->form_validation->set_rules('kd_petugas', 'kode petugas', 'required');
		$this->form_validation->set_rules('nama', 'nama', 'required');
		$this->form_validation->set_rules('alamat', 'alamat siswa', 'required');
		$this->form_validation->set_rules('notelp', 'no telp', 'required');

		if($this->form_validation->run() == FALSE){
			$data['kelas'] = $this->Kelas_model->tampilData()->result();
			$this->load->view('templates/header');
			$this->load->view('petugas/tambah', $data);
			$this->load->view('templates/footer');
		} else{
			$this->Petugas_model->tambahData();
			$this->session->set_flashdata('notif', 'ditambahkan');
			redirect('petugas');
		}
		
	}
	public function hapus($id){
		$this->Petugas_model->hapusData($id);
		$this->session->set_flashdata('notif', 'dihapus');
		redirect('petugas');
	}

	public function edit($id){
		$this->form_validation->set_rules('nama', 'nama', 'required');
		$this->form_validation->set_rules('alamat', 'alamat siswa', 'required');
		$this->form_validation->set_rules('notelp', 'no telp', 'required');

		if($this->form_validation->run() == FALSE){
			$data['kelas'] = $this->Kelas_model->tampilData()->result();
			$data['petugas'] = $this->Petugas_model->tampilDataById($id)->row();
			$this->load->view('templates/header');
			$this->load->view('petugas/edit', $data);
			$this->load->view('templates/footer');
		} else{
			//syntax untuk edit data
			$this->Petugas_model->editData();
			$this->session->set_flashdata('notif', 'ditambahkan');
			redirect('petugas');
		}
		
	}

}

