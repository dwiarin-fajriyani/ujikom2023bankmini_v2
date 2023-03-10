<?php
class Petugas_model extends CI_Model
{
	public function tampilData() {
		return $query = $this->db->get('petugas');
	}
	public function tampilPetugas() {
		return $this->db->get_where('petugas', ['role_id' => '2']);
	}
	public function tambahData() {
		$data = [
			//namakolom => value
			"kd_petugas" => $this->input->post('kd_petugas', true),
			"nama" => $this->input->post('nama', true),
			"kd_kelas" => $this->input->post('kelas', true),
			"alamat" => $this->input->post('alamat', true),
			"no_telp" => $this->input->post('notelp', true),
		];
		$this->db->insert('petugas', $data);
	}
	public function hapusData($id){
		$this->db->where('kd_petugas', $id);
		$this->db->delete('petugas');
	}
	public function tampilDataById($id){
		return $this->db->get_where('petugas', ['kd_petugas' => $id]);
	}
	public function editData(){
		$data = [
			"nama" => $this->input->post('nama', true),
			"kd_kelas" => $this->input->post('kelas', true),
			"alamat" => $this->input->post('alamat', true),
			"no_telp" => $this->input->post('notelp', true),
		];
		$this->db->where('kd_petugas', $this->input->post('kd_petugas'));
		$this->db->update('petugas', $data);
	}
	public function cariData(){
		$keyword = $this->input->post('keyword', true);
		$this->db->like('nama', $keyword);
		$this->db->or_like('kd_kelas', $keyword);
		$this->db->or_like('alamat', $keyword);
		$this->db->or_like('no_telp', $keyword);
		return $this->db->get('petugas');
	}
}
?>

