<?php

function check_already_login(){
	$ci =& get_instance();
	$user_session = $ci->session->userdata('id_admin');
	if ($user_session) {
		redirect('home');
	}
}
function check_not_login(){
	$ci =& get_instance();
	$user_session = $ci->session->userdata('id_admin');
	if (!$user_session) {
		redirect('auth');
	}
}