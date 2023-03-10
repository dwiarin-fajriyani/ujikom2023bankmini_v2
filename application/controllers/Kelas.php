<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelas extends CI_Controller {
	function __construct(){
		parent:: __construct();
		if(empty($this->session->userdata('username'))){
			redirect('auth');
		}
		$this->load->model('Kelas_model');
		$this->load->library('form_validation');
	} 
	public function index()
	{
		$data['kelas'] = $this->Kelas_model->tampilData()->result();
		if ($this->input->post('keyword')) {
			$data['kelas'] = $this->Kelas_model->cariDataSiswa()->result();
		}
		$this->load->view('templates/header');
		$this->load->view('kelas/tampil_kelas', $data);
		$this->load->view('templates/footer');
	}
	public function tambah(){
		$this->form_validation->set_rules('nama_siswa', 'nama siswa', 'required');
		$this->form_validation->set_rules('alamat', 'alamat siswa', 'required');
		$this->form_validation->set_rules('desa', 'desa', 'required');

		if($this->form_validation->run() == FALSE){
			$data['kelas'] = $this->Kelas_model->tampilData()->result(); 
			$this->load->view('templates/header');
			$this->load->view('kelas/tambah', $data);
			$this->load->view('templates/footer');
		} else{
			$this->Siswa_model->tambahDataSiswa();
			$this->session->set_flashdata('notif', 'ditambahkan');
			redirect('siswa');
		}
		
	}
	public function hapus($kd_kelas){
		$this->Kelas_model->hapusDataKelas($kd_kelas);
		$this->session->set_flashdata('notif', 'dihapus');
		redirect('kelas');
	}
	public function edit($nis){
		$this->form_validation->set_rules('nama_siswa', 'nama siswa', 'required');
		$this->form_validation->set_rules('alamat', 'alamat siswa', 'required');
		$this->form_validation->set_rules('desa', 'desa', 'required');

		if($this->form_validation->run() == FALSE){
			$data['kelas'] = $this->Kelas_model->tampilData()->result(); 
			$data['siswa'] = $this->Siswa_model->tampilSiswaByNIS($nis)->row();
			$this->load->view('templates/header');
			$this->load->view('siswa/edit', $data);
			$this->load->view('templates/footer');
		} else{
			//syntax untuk edit data
		}
		
	}

}

