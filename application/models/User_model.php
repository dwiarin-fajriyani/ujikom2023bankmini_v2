<?php
class User_model extends CI_Model
{
	public function tampilData() {
		$this->db->select('id_user, no_rek_kd_petugas, email, role_id, is_active, nasabah.nama as nama_nasabah, petugas.nama as nama_petugas');
		$this->db->join('petugas', 'petugas.kd_petugas = user.no_rek_kd_petugas','left');
		$this->db->join('nasabah', 'nasabah.no_rek = user.no_rek_kd_petugas','left');
		return $query = $this->db->get('user');
	}
	public function tambahDataUser() {
		$data = [
			//namakolom => value
			"no_rek_kd_petugas" => $this->input->post('no_rek_kd_petugas', true),
			"email" => $this->input->post('email', true),
			"password" => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
			"role_id" => $this->input->post('roleId'),
			"is_active" => 1, 
			"date_created" => mdate('%Y-%m-%d %H:%i:%s', now()),
		];
		$this->db->insert('user', $data);
	}
	public function getUserRole() {
		return $query = $this->db->get('user_role');
	}
}
?>