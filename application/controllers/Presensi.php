<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Presensi extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model('admin_model');
	}


	public function index()
	{
		$judul = array(
			'halaman'		=> 'Halaman Presensi',
			'menu'			=> 'Presensi',
			'awal'			=> 'Halaman Presensi',
			'pusat'			=> 'Presensi',
			'content'		=> 'presensi/index',
			'presensi'		=> $this->admin_model->presensi(),
		);
		$this->load->view('template/wrapper', $judul, FALSE);
	}
	public function cetak()
	{
		$awal = $this->input->post('tgl_awal');
		$akhir = $this->input->post('tgl_akhir');
		if (isset($awal) && isset($akhir)) {
			$judul = array(
				'halaman'		=> 'Halaman Presensi',
				'menu'			=> 'Presensi',
				'awal'			=> 'Halaman Presensi',
				'pusat'			=> 'Presensi',
				'content'		=> 'presensi/cetak',
				'presensi'		=> $this->admin_model->presensi1($awal, $akhir),
			);
		} else {
			$judul = array(
				'halaman'		=> 'Halaman Presensi',
				'menu'			=> 'Presensi',
				'awal'			=> 'Halaman Presensi',
				'pusat'			=> 'Presensi',
				'content'		=> 'presensi/cetak',
				'presensi'		=> $this->admin_model->presensi1('0000-00-00','0000-00-00'),
			);
		}
		$this->load->view('template/wrapper', $judul, FALSE);
	}
	public function cetakpdf()
	{
		$awal = $this->input->post('tgl_awal');
		$akhir = $this->input->post('tgl_akhir');
		if (isset($bulan) && isset($tahun)) {
			$judul = array(
				'awal'			=> $awal,
				'akhir'			=> $akhir,
				'presensi'		=> $this->admin_model->presensi1('0000-00-00','0000-00-00'),
			);
		} else {
			$judul = array(
				'awal'			=> $awal,
				'akhir'			=> $akhir,
				'presensi'		=> $this->admin_model->presensi1($awal, $akhir),
			);
		}
		$html = $this->load->view('presensi/print', $judul, true);
		$this->fungsi->PdfGenerator($html, 'Presensi Karyawan', 'portrait');
	}
	public function absen()
	{
		$data = $this->admin_model->tampildata('pegawai', 'nip');
		$judul = array(
			'halaman'		=> 'Halaman Presensi',
			'menu'			=> 'Presensi',
			'awal'			=> 'Halaman Presensi',
			'pusat'			=> 'Presensi',
			'content'		=> 'presensi/form',
			'pegawai'		=> $data,
		);
		$this->load->view('template/wrapper', $judul, FALSE);
	}
	public function add()
	{
		$tgl = $this->input->post('tgl_masuk');
		$nip = $this->input->post('nip');
		$ket = $this->input->post('ket');
		for ($i=0; $i < count($nip); $i++) {
			$data[] = [
				'nip'		=>	$nip[$i],
				'tgl_masuk'	=>	$tgl,
				'ket'		=>	$ket[$i]
			];

		}
		$result = $this->db->insert_batch('presensi', $data);
		if ($result) {
			echo "<script>window.location='".base_url('presensi')."'</script>";
		}else{
			echo "error";
		}
	}
	public function ubah(){
		$data=array(
			'nip'=>$this->input->post('nip'),
			'tgl_masuk'=>$this->input->post('tgl_masuk'),
			'ket'=>$this->input->post('ket'),
		);
		$id = $this->input->post('id_absen');
		$this->admin_model->ubahdata('presensi', 'id_absen', $id, $data);
	}
	public function hapus(){
		$id = $this->input->get('id_absen');
		$result = $this->admin_model->hapusdata('presensi', $id, 'id_absen');
		$msg['success'] = false;
		if($result){
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}

}

/* End of file Presensi.php */
/* Location: ./application/controllers/Presensi.php */