<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {
	public function tampildata($table, $id){
		return $this->db->from($table)
					->order_by($id, 'DESC')
					->get('');
	}
	public function simpandata($table, $data){
		return $this->db->insert($table, $data);
	}
	public function simpandata1($table, $data){
		return $this->db->insert_batch($table, $data);
	}
	public function get($table, $primary, $id){
		return $this->db->get_where($table, array($primary=>$id));
	}
	function hapusdata($table, $id, $primary){
		$this->db->where($primary, $id);
		$this->db->delete($table);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}
	public function ubahdata($table, $primary, $id, $data){
		return $this->db->where($primary, $id)
						->update($table, $data);
						
	}
	public function kepegawaian(){
		return $this->db->select('*')
						->from('kepegawaian')
						->join('pegawai', 'kepegawaian.nip = pegawai.nip')
						->order_by('kepegawaian.id_kep', 'DESC')
						->get();
	}
	public function penggajian(){
		return $this->db->select('*')
						->from('penggajian')
						->join('pegawai', 'penggajian.nip = pegawai.nip')
						->join('kepegawaian', 'penggajian.nip = kepegawaian.nip')
						->order_by('penggajian.id_gaji', 'DESC')
						->get();
	}
	public function pegawai(){
		return $this->db->select('*')
						->from('pegawai')
						->join('kepegawaian', 'pegawai.nip = kepegawaian.nip', 'RIGHT')
						->order_by('pegawai.nip', 'DESC')
						->get();
	}
	public function presensi(){
		return $this->db->select('*')
						->from('presensi')
						->join('pegawai', 'presensi.nip = pegawai.nip')
						->order_by('presensi.tgl_masuk', 'DESC')
						->get();
	}
	public function presensi1($awal, $akhir){
		return $this->db->select('*')
						->from('presensi')
						->join('pegawai', 'presensi.nip = pegawai.nip')
						->where('DATE(tgl_masuk) >=',$awal)
						->where('DATE(tgl_masuk) <=',$akhir)
						->order_by('presensi.tgl_masuk', 'ASC')
						->get();
	}
	public function gajibulan($bulan, $tahun){
		return $this->db->select('*')
						->from('penggajian')
						->join('pegawai', 'penggajian.nip = pegawai.nip')
						->join('kepegawaian', 'penggajian.nip = kepegawaian.nip')
						->where('bulan =',$bulan)
						->where('tahun =',$tahun)
						->order_by('penggajian.id_gaji', 'DESC')
						->get();
	}
	public function absensi($nip){
		return $this->db->select('*')
						->from('presensi')
						->get();

	}
	

}

/* End of file Admin_model.php */
/* Location: ./application/models/Admin_model.php */