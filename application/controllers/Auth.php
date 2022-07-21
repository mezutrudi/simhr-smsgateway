<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_models');
	}

	public function index()
	{
		check_already_login();
		$judul['halaman']="Halaman Login";

		$this->load->view('login', $judul, FALSE);
	}
	public function proses()
	{
		$post = $this->input->post(null, TRUE);
		if (isset($post['login'])) {
			$query = $this->user_models->login($post);
			if ($query->num_rows() > 0) {
					$row = $query->row();
					$param = array(
						'id_admin'		=>	$row->id_admin,
						'username'		=>	$row->username,
						'nama_lengkap'	=>	$row->nama_lengkap
					);
					$this->session->set_userdata($param);
					echo "<script>
						alert('Berhasil');
						window.location='".base_url('home')."';
					</script>";
			}else{
				echo "<script>
					alert('Gagal');
					window.location='".base_url('auth')."';
				</script>";
			}
		}else{
			echo "Pa bender";
		}
	}
	public function logout()
	{
		$param = array('id_admin', 'username', 'nama_lengkap');
		$this->session->unset_userdata($param);
		redirect('auth','refresh');
	}

}

/* End of file Auth.php */
/* Location: ./application/controllers/Auth.php */