<?php
class Member_model extends CI_Model
{
	public function tampilData() {
		return $query = $this->db->get('nasabah');
	}
	public function tampilById($id){
		return $this->db->get_where('nasabah', ['no_rek' => $id]);
	}
}
?>

