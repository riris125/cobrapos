<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profil extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('status') != "login") {
			redirect(base_url("login"));
		}
		$this->load->helper('cookie');
		$this->load->library('session');

		$this->load->model("M_view");
		$this->load->model("M_edit");
		$this->load->model("M_add");
		$this->load->model("M_delete");
		$this->load->library('session');
	}
	public function index()
	{
		$username = $this->session->userdata('username');
		$data['user'] = $this->M_view->getUserLogin($username);
		$data['profil'] = $this->M_view->profil();
		
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view("profil", $data);
	}
	public function edit_simpan()
	{
		$id_login = $this->input->post('id_login');
		$user = $this->input->post('user');
		$pass = $this->input->post('pass');
		$pass_hash = password_hash($pass, PASSWORD_DEFAULT);


		$this->M_edit->profil($id_login,$user,$pass_hash);
		$this->session->set_flashdata('flash', 'Diubah');
		redirect('profil');
	}
	public function tambah_simpan()
	{
		$user = $this->input->post('user');
		$pass = $this->input->post('pass');
		$pass_hash = password_hash($pass, PASSWORD_DEFAULT);
		
		$this->M_add->add_profil($user,$pass_hash);
		$this->session->set_flashdata('flash', 'Disimpan');
		redirect('profil');
	}
	public function hapus($id_login)
	{
		$this->M_delete->hapus_profil($id_login);
		$this->session->set_flashdata('flash', 'Dihapus');
		redirect('profil');
	}
}
