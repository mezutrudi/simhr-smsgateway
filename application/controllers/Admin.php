<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model('admin_model');
	}

	public function index()
	{
		$judul['halaman']="Halaman Admin";
		$judul['menu']="Admin";
		$judul['awal']="Halaman Data Admin";
		$judul['pusat']="Admin";
		$judul['content']="admin/index";
		$judul['admin']=$this->admin_model->tampildata('admin', 'id_admin');
		$this->load->view('template/wrapper', $judul, FALSE);
	}
	public function tambah()
	{
		$data=array(
			'username'=>$this->input->post('username'),
			'password'=>sha1($this->input->post('password')),
			'nama_lengkap'=>$this->input->post('nama_lengkap'),
		);
		$this->admin_model->simpandata('admin', $data);
	}
	public function ubah(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$nama = $this->input->post('nama_lengkap');
		if ($password == "") {
			$data=array(
				'username'=>$username,
				'nama_lengkap'=>$nama,
			);
		} else {
			$data=array(
				'username'=>$username,
				'password'=>sha1($password),
				'nama_lengkap'=>$nama,
			);
		}
		$id = $this->input->post('id_admin');
		$this->admin_model->ubahdata('admin', 'id_admin', $id, $data);
	}
	public function hapus(){
		$id = $this->input->get('id_admin');
		$result = $this->admin_model->hapusdata('admin', $id, 'id_admin');
		$msg['success'] = false;
		if($result){
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}

}

/* End of file Admin.php */
/* Location: ./application/controllers/Admin.php */