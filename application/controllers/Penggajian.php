<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penggajian extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model('admin_model');
	}


	public function index()
	{
		$data = $this->admin_model->pegawai();
		// $guru[null]= '--Pilih Pegawai--';
		// foreach($data->result() as $pgw){
		// 	$pegawai[$pgw->nip] = $pgw->nama_pegawai;
		// };
		$judul = array(
			'halaman'		=> 'Halaman Data Penggajian',
			'menu'			=> 'Penggajian',
			'awal'			=> 'Halaman Data Penggajian',
			'pusat'			=> 'Penggajian',
			'content'		=> 'penggajian/index',
			'pegawai'		=> $this->admin_model->kepegawaian(),
			'penggajian'	=> $this->admin_model->Penggajian(),
		);
		$this->load->view('template/wrapper', $judul, FALSE);
	}
	public function tambah()
	{
		function rupiah($angka){                
	        $hasil_rupiah = "Rp " . number_format($angka,0,',','.');
	        return $hasil_rupiah;             
        }
		$bulan = $this->input->post('bulan');
		$tahun = $this->input->post('tahun');
		$nip = $this->input->post('nip');
		$nama = $this->input->post('nama');
		$gaji = $this->input->post('gaji');
		$nohp = $this->input->post('nohp');
		for ($i=0; $i < count($nip); $i++) {
			$data[] = [
				'nip'	=>	$nip[$i],
				'bulan'	=>	$bulan,
				'tahun'	=>	$tahun,
				'gaji'	=>	$gaji[$i]
			];
			$data1[] = [
				'DestinationNumber'	=>	$nohp[$i],
				'TextDecoded'		=>	"Yth. Bpk/Ibu ".$nama[$i]." NIP: ".$nip[$i].". Gaji Anda Bulan ".$bulan." ".$tahun." Sebesar ".rupiah($gaji[$i])." ",
				'CreatorID'			=>	"Gammu"
			];

		}
		$result = $this->db->insert_batch('outbox', $data1);
		$result = $this->db->insert_batch('penggajian', $data);
		if ($result) {
			echo "<script>window.location='".base_url('penggajian')."'</script>";
		}else{
			echo "error";
		}
	}
	public function cetak()
	{
		$bulan = $this->input->post('bulan');
		$tahun = $this->input->post('tahun');
		if (isset($bulan) && isset($tahun)) {
			$judul = array(
				'halaman'		=> 'Halaman Penggajian',
				'menu'			=> 'Penggajian',
				'awal'			=> 'Halaman Penggajian',
				'pusat'			=> 'Penggajian',
				'content'		=> 'penggajian/cetak',
				'penggajian'	=> $this->admin_model->gajibulan($bulan, $tahun),
			);
		} else {
			$judul = array(
				'halaman'		=> 'Halaman Penggajian',
				'menu'			=> 'Penggajian',
				'awal'			=> 'Halaman Penggajian',
				'pusat'			=> 'Penggajian',
				'content'		=> 'penggajian/cetak',
				'penggajian'	=> $this->admin_model->gajibulan('', ''),
			);
		}
		$this->load->view('template/wrapper', $judul, FALSE);
	}
	public function cetakpdf()
	{
		$bulan = $this->input->post('bulan');
		$tahun = $this->input->post('tahun');
		if (isset($bulan) && isset($tahun)) {
			$judul = array(
				'halaman'		=> 'Halaman Penggajian',
				'menu'			=> 'Penggajian',
				'awal'			=> 'Halaman Penggajian',
				'pusat'			=> 'Penggajian',
				'content'		=> 'penggajian/print',
				'penggajian'	=> $this->admin_model->gajibulan($bulan, $tahun),
			);
		} else {
			$judul = array(
				'penggajian'	=> $this->admin_model->gajibulan('', ''),
			);
		}
		$html = $this->load->view('penggajian/print', $judul, true);
		$this->fungsi->PdfGenerator($html, 'Gaji Karyawan', 'portrait');
	}

}

/* End of file Penggajian.php */
/* Location: ./application/controllers/Penggajian.php */