<?php

class Login extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->helper('cookie');
		$this->load->model("M_user"); //load model read

	}

	function index()
	{
		$this->load->view('login');
	}

	function proses_login()
	{

		$userpost = $this->input->post('username');
		$passwordpost = $this->input->post('password');

		if ($userpost == '' || $passwordpost == '') {
			$_SESSION["login_gagal"] = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
				<font size=2px>Login gagal, Username / Password tidak boleh kosong !</font>
				</div>";
			redirect(base_url("login"));
		}

		//CEK USER
		$cek['user']  = $this->M_user->getUserLogin($userpost);
		if (!$cek['user']) {
			// list is empty.
			$_SESSION["login_gagal"] = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
				<font size=2px>Login gagal, user tidak terdaftar !</font>
				</div>";
			redirect(base_url("login"));
		} else {
			$user = $cek['user'][0]['user'];
			$pass = $cek['user'][0]['pass'];

			//if ($passwordpost == '123456') {
			if (password_verify($passwordpost, $pass)) {
				// membuat session
				$data_session = array(
					'username' => $userpost,
					'status' => "login"
				);
				$this->session->set_userdata($data_session);
				// cek cookie...
				if ($this->input->post('remember')) {
					$cookie = array(
						'name'   => 'remember',
						'value'  => $user,
						'expire' => (60 * 60 * 24 * 92)  // 4 bulan
					);
					set_cookie($cookie);
				}
				redirect(base_url("dashboard"));
			} else {
				$_SESSION["login_gagal"] = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
				<font size=2px>Login gagal, password salah !</font>
				</div>";
				redirect(base_url("login"));
			}
		}
	}

	function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url('login'));
	}
}
