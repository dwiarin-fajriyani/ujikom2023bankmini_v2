<?php
class Transaksi_model extends CI_Model
{
	public function tampilData() {
		$this->db->select('kd_transaksi, tanggal, nasabah.no_rek, nasabah.nama as nama_nasabah, jenis_transaksi, petugas.nama as nama_petugas, nominal');
		$this->db->from('transaksi');
		$this->db->join('nasabah', 'nasabah.no_rek = transaksi.no_rek');
		$this->db->join('petugas', 'petugas.kd_petugas = transaksi.kd_petugas');
		return $query = $this->db->get();
	}
	public function dataLaporan($tglAwal, $tglAkhir) {
		$this->db->select('kd_transaksi, tanggal, nasabah.no_rek, nasabah.nama as nama_nasabah, jenis_transaksi, petugas.nama as nama_petugas, nominal');
		$this->db->from('transaksi');
		$this->db->join('nasabah', 'nasabah.no_rek = transaksi.no_rek');
		$this->db->join('petugas', 'petugas.kd_petugas = transaksi.kd_petugas');
		$this->db->where('tanggal BETWEEN "'. date('Y-m-d', strtotime($tglAwal)). '" and "'. date('Y-m-d', strtotime($tglAkhir)).'"');
		return $query = $this->db->get();
	}
	public function getMaxTrans(){
		$this->db->select_max('substr(kd_transaksi,-4)','kode');
		return $query = $this->db->get('transaksi');
	}
	public function getTransaksiById($id){
		$this->db->order_by('tanggal', 'ASC');
		return $this->db->get_where('transaksi', ['no_rek' => $id], 10);
	}
	public function jumlahSetorById($id){
		$this->db->select_sum('nominal','saldo');
		$this->db->where('no_rek', $id);
		$this->db->where('jenis_transaksi', 'ST');
		return $this->db->get('transaksi');
	}
	public function jumlahTarikById($id){
		$this->db->select_sum('nominal','saldo');
		$this->db->where('no_rek', $id);
		$this->db->where('jenis_transaksi', 'TR');
		return $this->db->get('transaksi');
	}

	public function tambahData() {
		$data = [
			//namakolom => value
			"kd_transaksi" => $this->input->post('kd_transaksi', true),
			"tanggal" => mdate('%Y-%m-%d %H:%i:%s', now()),
			"no_rek" => $this->input->post('no_rek', true),
			"jenis_transaksi" => $this->input->post('jenis_transaksi', true),
			"kd_petugas" => $this->input->post('kd_petugas', true),
			"nominal" => $this->input->post('nominal', true),
			
		];
		$this->db->insert('transaksi', $data);
	}
	public function hapusData($id){
		$this->db->where('kd_transaksi', $id);
		$this->db->delete('transaksi');
	}
	public function tampilDataByID($id){
		return $this->db->get_where('transaksi', ['kd_transaksi' => $id]);
	}

	public function editData(){
		$data = [
			"no_rek" => $this->input->post('no_rek', true),
			"jenis_transaksi" => $this->input->post('jenis_transaksi', true),
			"kd_petugas" => $this->input->post('kd_petugas', true),
			"nominal" => $this->input->post('nominal', true),
		];
		$this->db->where('kd_transaksi', $this->input->post('kd_transaksi'));
		$this->db->update('transaksi', $data);
	}
	public function cariData(){
		$keyword = $this->input->post('keyword', true);
		$this->db->select('kd_transaksi, tanggal, nasabah.no_rek, nasabah.nama as nama_nasabah, jenis_transaksi, petugas.nama as nama_petugas, nominal');
		$this->db->like('nasabah.no_rek', $keyword);
		$this->db->or_like('tanggal', $keyword);
		$this->db->or_like('kd_transaksi', $keyword);
		$this->db->or_like('jenis_transaksi', $keyword);
		$this->db->or_like('nasabah.nama', $keyword);
		$this->db->or_like('petugas.nama', $keyword);
		$this->db->or_like('nominal', $keyword);
		$this->db->from('transaksi');
		$this->db->join('nasabah', 'nasabah.no_rek = transaksi.no_rek');
		$this->db->join('petugas', 'petugas.kd_petugas = transaksi.kd_petugas');
		return $this->db->get();
	}
}