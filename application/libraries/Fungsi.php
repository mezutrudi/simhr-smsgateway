<?php 

Class Fungsi {

	protected $ci;

	function __construct() {
		$this->ci =& get_instance();
	}

	function user_login(){
		$this->ci->load->model('user_models');
		$id_admin = $this->ci->session->userdata('id_admin');
		$user_data = $this->ci->user_models->get($id_admin)->row();
		return $user_data;
	}

	function PdfGenerator($html, $filename, $rotasi){

		$dompdf = new Dompdf\Dompdf();
		$dompdf->loadHtml($html);
		$dompdf->setPaper('A4', $rotasi);
		$dompdf->render();
		$dompdf->stream($filename, array('Attachment'	=>	0));
	}
}