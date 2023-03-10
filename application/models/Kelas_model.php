<?php
class Kelas_model extends CI_Model
{
	public function tampilData() {
		return $query = $this->db->get('kelas');
	}
	public function hapusDataKelas($kd_kelas){
		$this->db->where('kd_kelas', $kd_kelas);
		$this->db->delete('kelas');
	}
	public function cariDataKelas(){
		$keyword = $this->input->post('keyword', true);
		$this->db->like('kd_kelas', $keyword);
		$this->db->or_like('jurusan', $keyword);
		$this->db->or_like('jumlah_siswa', $keyword);
		return $this->db->get('kelas');
	}
}
?>

