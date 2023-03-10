<?php
class Nasabah_model extends CI_Model
{
	public function tampilData() {
		return $query = $this->db->get('nasabah');
	}
	public function tambahData() {
		$kelas = $this->input->post('kelas', true);
		if($kelas == "Guru"){
			$jenis = 1;
		} else {
			$jenis = 2;
		}
		$data = [
			//namakolom => value
			"no_rek" => $jenis.substr($this->input->post('nisn_nik', true), -5),
			"nisn_nik" => $this->input->post('nisn_nik', true),
			"nama" => $this->input->post('nama', true),
			"kd_kelas" => $kelas,
			"alamat" => $this->input->post('alamat', true),
			"no_telp" => $this->input->post('notelp', true),
		];
		$this->db->insert('nasabah', $data);
	}
	public function hapusData($id){
		$this->db->where('no_rek', $id);
		$this->db->delete('nasabah');
	}
	public function tampilDataByID($id){
		return $this->db->get_where('nasabah', ['no_rek' => $id]);
	}
	public function editData(){
		$data = [
			"nisn_nik" => $this->input->post('nisn_nik', true),
			"nama" => $this->input->post('nama', true),
			"kd_kelas" => $this->input->post('kelas', true),
			"alamat" => $this->input->post('alamat', true),
			"no_telp" => $this->input->post('notelp', true),
		];
		$this->db->where('no_rek', $this->input->post('no_rek'));
		$this->db->update('nasabah', $data);
	}
	public function cariData(){
		$keyword = $this->input->post('keyword', true);
		$this->db->like('nisn_nik', $keyword);
		$this->db->or_like('nama', $keyword);
		$this->db->or_like('kelas', $keyword);
		$this->db->or_like('alamat', $keyword);
		$this->db->or_like('no_telp', $keyword);
		return $this->db->get('nasabah');
	}
}
?>

