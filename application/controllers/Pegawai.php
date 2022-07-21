<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model('admin_model');
	}

	public function index()
	{
		$judul['halaman']="Halaman Data Pegawai";
		$judul['menu']="Data Diri";
		$judul['awal']="Halaman Data Pegawai";
		$judul['pusat']="Pegawai";
		$judul['content']="pegawai/index";
		$judul['pegawai']=$this->admin_model->tampildata('pegawai', 'nip');
		$this->load->view('template/wrapper', $judul, FALSE);
	}
	// public function add()
	// {
	// 	$pegawai = new stdClass();
	// 	$pegawai->nip = null;
	// 	$pegawai->nama_pegawai = null;
	// 	$pegawai->jk = null;
	// 	$pegawai->tmp_lahir = null;
	// 	$pegawai->tgl_lahir = null;
	// 	$pegawai->agama = null;
	// 	$pegawai->alamat = null;
	// 	$pegawai->nohp = null;
	// 	$pegawai->email = null;
	// 	$judul['halaman']="Halaman Tambah Data Pegawai";
	// 	$judul['menu']="Data Diri";
	// 	$judul['awal']="Halaman Data Pegawai";
	// 	$judul['pusat']="Pegawai";
	// 	$judul['content']="pegawai/form";
	// 	$judul['page']="add";
	// 	$judul['row']=$pegawai;
	// 	$this->load->view('template/wrapper', $judul, FALSE);
	// }
	// public function edit($id)
	// {
	// 	$query = $this->admin_model->get('pegawai', 'nip', $id);
	// 	if ($query->num_rows() > 0) {
	// 		$pegawai = $query->row();
	// 		$judul['halaman']="Halaman Tambah Data Pegawai";
	// 		$judul['menu']="Data Diri";
	// 		$judul['awal']="Halaman Data Pegawai";
	// 		$judul['pusat']="Pegawai";
	// 		$judul['content']="pegawai/form";
	// 		$judul['page']="edit";
	// 		$judul['row']=$pegawai;
	// 		$this->load->view('template/wrapper', $judul, FALSE);
	// 	} else {
	// 		echo "<script>alert('Data Tidak ada')</script>";
	// 		echo "<script>window.location='".base_url('pegawai')."'</script>";
	// 	}
		
	// }
	// public function proses()
	// {
	// 	$post = array(
	// 		'nip'	=> $this->input->post('nip'),
	// 		'nama_pegawai'	=> $this->input->post('nama_pegawai'),
	// 		'jk'	=> $this->input->post('jk'),
	// 		'tmp_lahir'	=> $this->input->post('tmp_lahir'),
	// 		'tgl_lahir'	=> $this->input->post('tgl_lahir'),
	// 		'agama'	=> $this->input->post('agama'),
	// 		'alamat'	=> $this->input->post('alamat'),
	// 		'nohp'	=> $this->input->post('nohp'),
	// 		'email'	=> $this->input->post('email'),
	// 	);
	// 	$id = $this->input->post('nip');
	// 	if (isset($_POST['add'])) {
	// 		$this->admin_model->simpandata('pegawai', $post);
	// 	}else if (isset($_POST['edit'])) {
	// 		$this->admin_model->ubahdata('pegawai', 'nip', $id, $post);
	// 	}
	// 	if ($this->db->affected_rows() > 0) {
	// 		echo "<script>alert('Data Tersimpan')</script>";
	// 	}
	// 	echo "<script>window.location='".base_url('pegawai')."'</script>";
	// }
	public function tambahpegawai()
	{
		$data=array(
			'nama_pegawai'=>$this->input->post('nama_pegawai'),
			'jk'=>$this->input->post('jk'),
			'tmp_lahir'=>$this->input->post('tmp_lahir'),
			'tgl_lahir'=>$this->input->post('tgl_lahir'),
			'agama'=>$this->input->post('agama'),
			'alamat'=>$this->input->post('alamat'),
			'nohp'=>$this->input->post('nohp'),
			'email'=>$this->input->post('email'),
			// 'foto'=>$this->input->post('foto'),
		);
		$this->admin_model->simpandata('pegawai', $data);
	}
	public function ubahpegawai(){
		$data=array(
			'nama_pegawai'=>$this->input->post('nama_pegawai'),
			'jk'=>$this->input->post('jk'),
			'tmp_lahir'=>$this->input->post('tmp_lahir'),
			'tgl_lahir'=>$this->input->post('tgl_lahir'),
			'agama'=>$this->input->post('agama'),
			'alamat'=>$this->input->post('alamat'),
			'nohp'=>$this->input->post('nohp'),
			'email'=>$this->input->post('email'),
			// 'foto'=>$this->input->post('foto'),
		);
		$id = $this->input->post('nip');
		$this->admin_model->ubahdata('pegawai', 'nip', $id, $data);
	}
	public function hapuspegawai(){
		$nip = $this->input->get('nip');
		$result = $this->admin_model->hapusdata('pegawai', $nip, 'nip');
		$msg['success'] = false;
		if($result){
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}

}

/* End of file Pegawai.php */
/* Location: ./application/controllers/Pegawai.php */