<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model('admin_model');
	}

	public function index()
	{
		$judul['halaman']="Halaman Utama Administrator";
		$judul['menu']="Utama";
		$judul['awal']="Halaman Utama";
		$judul['pusat']="Utama";
		$judul['content']="utama";

		$this->load->view('template/wrapper', $judul, FALSE);
	}

}

/* End of file Admin.php */
/* Location: ./application/controllers/Admin.php */