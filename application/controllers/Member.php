<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Controller {
	function __construct(){
		parent:: __construct();
		if(empty($this->session->userdata('username'))){
			redirect('auth');
		}
		$this->load->model('Member_model');
		$this->load->model('Transaksi_model');
		$this->load->library('form_validation');
	} 
 
	public function index()
	{
		$id = $this->session->userdata('id');
		$data['member'] = $this->Member_model->tampilById($id)->row();
		$data['ministeatment'] = $this->Transaksi_model->getTransaksiById($id)->result();
		$data['setor'] = $this->Transaksi_model->jumlahSetorById($id)->row();
		$data['tarik'] = $this->Transaksi_model->jumlahTarikById($id)->row();
		$this->load->view('templates/headerMember');
		$this->load->view('member/index', $data);
		$this->load->view('templates/footer');
	}
}

