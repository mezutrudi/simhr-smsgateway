<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kepegawaian extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model('admin_model');
	}

	// public function index()
	// {
	// 	$judul['halaman']="Halaman Data Kepegawaian";
	// 	$judul['menu']="Kepegawaian";
	// 	$judul['awal']="Halaman Data Kepegawaian";
	// 	$judul['pusat']="Kepegawaian";
	// 	$judul['content']="kepegawaian/index";
	// 	$judul['kepegawaian']=$this->admin_model->kepegawaian();
	// 	$this->load->view('template/wrapper', $judul, FALSE);
	// }
	public function index()
	{
		$data = $this->admin_model->tampildata('pegawai', 'nip');
		$judul = array(
			'halaman'		=> 'Halaman Data Kepegawaian',
			'menu'			=> 'Kepegawaian',
			'awal'			=> 'Halaman Data Kepegawaian',
			'pusat'			=> 'Kepegawaian',
			'content'		=> 'kepegawaian/index',
			'pegawai'		=> $data,
			'kepegawaian'	=> $this->admin_model->kepegawaian(),
		);
		$this->load->view('template/wrapper', $judul, FALSE);
	}
	public function tambah()
	{
		$data=array(
			'nip'=>$this->input->post('nip'),
			'jabatan'=>$this->input->post('jabatan'),
			'prestasi'=>$this->input->post('prestasi'),
			'sk'=>$this->input->post('sk'),
			'skill'=>$this->input->post('skill'),
			'gaji'=>$this->input->post('gaji'),
		);
		$this->admin_model->simpandata('kepegawaian', $data);
	}
	public function ubah(){
		$data=array(
			'nip'=>$this->input->post('nip'),
			'jabatan'=>$this->input->post('jabatan'),
			'prestasi'=>$this->input->post('prestasi'),
			'sk'=>$this->input->post('sk'),
			'skill'=>$this->input->post('skill'),
			'gaji'=>$this->input->post('gaji'),
		);
		$id = $this->input->post('id_kep');
		$this->admin_model->ubahdata('kepegawaian', 'id_kep', $id, $data);
	}
	public function hapus(){
		$id = $this->input->get('id_kep');
		$result = $this->admin_model->hapusdata('kepegawaian', $id, 'id_kep');
		$msg['success'] = false;
		if($result){
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}

}

/* End of file Kepegawaian.php */
/* Location: ./application/controllers/Kepegawaian.php */