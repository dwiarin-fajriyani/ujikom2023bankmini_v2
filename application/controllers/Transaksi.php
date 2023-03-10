<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {
	function __construct(){
		parent:: __construct();
		if(empty($this->session->userdata('username'))){
			redirect('auth');
		}
		$this->load->model('Transaksi_model');
		$this->load->model('Nasabah_model');
		$this->load->model('Petugas_model');
		$this->load->library('form_validation');
	} 
	public function index() {
		$data['transaksi'] = $this->Transaksi_model->tampilData()->result();
		if ($this->input->post('keyword')) {
			$data['transaksi'] = $this->Transaksi_model->cariData()->result();
		}
		$this->load->view('templates/header');
		$this->load->view('transaksi/tampil', $data);
		$this->load->view('templates/footer');
	}

	public function tambah() {
		$this->form_validation->set_rules('kd_transaksi', 'Kode Transaksi', 'required');
		$this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
		$this->form_validation->set_rules('no_rek', 'No Rekening', 'required');
		$this->form_validation->set_rules('nominal', 'Nominal', 'required|numeric');
		$this->form_validation->set_rules('kd_petugas', 'Petugas', 'required');
		
		if ($this->form_validation->run()== FALSE) {
			$data['nasabah'] = $this->Nasabah_model->tampilData()->result();
			$data['petugas'] = $this->Petugas_model->tampilPetugas()->result();
			$data['kd_transaksi'] = $this->Transaksi_model->getMaxTrans()->row();
			$this->load->view('templates/header');
			$this->load->view('transaksi/tambah', $data);
			$this->load->view('templates/footer');
		} else {
			$this->Transaksi_model->tambahData();
			$this->session->set_flashdata('notif', 'ditambahkan');
			redirect('transaksi');
		}
	}
	public function hapus($id){
		$this->Transaksi_model->hapusData($id);
		$this->session->set_flashdata('notif', 'dihapus');
		redirect('transaksi');
	}
	public function edit($id) {
		$this->form_validation->set_rules('kd_transaksi', 'Kode Transaksi', 'required');
		$this->form_validation->set_rules('no_rek', 'No Rekening', 'required');
		$this->form_validation->set_rules('nominal', 'Nominal', 'required|numeric');
		$this->form_validation->set_rules('kd_petugas', 'Petugas', 'required');
		
		if ($this->form_validation->run()== FALSE) {
			$data['nasabah'] = $this->Nasabah_model->tampilData()->result();
			$data['petugas'] = $this->Petugas_model->tampilData()->result();
			$data['transaksi'] = $this->Transaksi_model->tampilDataByID($id)->row();
			$this->load->view('templates/header');
			$this->load->view('transaksi/edit', $data);
			$this->load->view('templates/footer');
		} else {
			$this->Transaksi_model->editData();
			$this->session->set_flashdata('notif', 'ditambahkan');
			redirect('transaksi');
		}
	}
	public function pdf(){
		$this->load->library('dompdf_gen');
		$tglAwal = $this->input->post('tglAwal');
		$tglAkhir= $this->input->post('tglAkhir');
		$data['transaksi'] = $this->Transaksi_model->dataLaporan($tglAwal, $tglAkhir)->result();
		
		$this->load->view('transaksi/laporan_pdf', $data);

		$paper_size = 'A4';
		$orientation = 'landscape';

		$html = $this->output->get_output();
		$this->dompdf->set_paper($paper_size, $orientation);

		$this->dompdf->load_html($html);
		$this->dompdf->render();
		$this->dompdf->stream("laporan_transaksi.pdf", array('Attachment' => 0));


	}
}

