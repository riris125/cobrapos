<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
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
		$data['hasil_penjualan'] = $this->M_view->hasil_penjualan();
		$data['member'] = $this->M_view->member();
		$data['jumlah'] = $this->M_view->jumlah();

		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view("transaksi", $data);
	}

	public function tambah_keranjang($id_barang)
	{	
		$username = $this->session->userdata('username');
		$user = $this->M_view->getUserLogin($username);

		$barang = $this->M_view->barang_id($id_barang);
		$stok = $barang[0]->stok;
		$harga_jual = $barang[0]->harga_jual;
	
		if ($stok > 0) {
			$kasir =  $user[0]['id_login'];
            $jumlah = 1;
            $total = $harga_jual;
            $tgl = date("j F Y, G:i");

 			$this->M_add->add_keranjang($id_barang, $kasir, $jumlah, $total, $tgl);
			
			echo '<script>window.location="'.base_url('transaksi').'"</script>';

		} else {
            echo '<script>alert("Stok Barang Anda Telah Habis !");
					window.location="'.base_url('transaksi').'"</script>';
        }
	}

	public function hapus_keranjang()
	{
		$this->M_delete->hapus_keranjang();
		echo '<script>window.location="'.base_url('transaksi').'"</script>';
	}

	public function hapus_keranjang_id($id_penjualan)
	{
		$this->M_delete->hapus_keranjang_id($id_penjualan);
		echo '<script>window.location="'.base_url('transaksi').'"</script>';
	}

	public function edit_keranjang_id()
	{
		$jumlah = $this->input->post('jumlah');
		$id_penjualan = $this->input->post('id_penjualan');
		$id_barang = $this->input->post('id_barang');
		$barang = $this->M_view->barang_id($id_barang);
		$stok = $barang[0]->stok;
		$harga_jual = $barang[0]->harga_jual;

		if ($stok > $jumlah) {
			$jual = $harga_jual;
			$total = $jual * $jumlah;
			$this->M_edit->keranjang_id($id_penjualan, $jumlah, $total);
			
			echo '<script>window.location="'.base_url('transaksi').'"</script>';

		} else {
            echo '<script>alert("Keranjang Melebihi Stok Barang Anda !");
					window.location="'.base_url('transaksi').'"</script>';
        }
	}
 	
	function bayar_nota()
	{
		$no_faktur = $this->input->post('no_faktur');
		$jumlah = $this->input->post('jumlah');
		$total = $this->input->post('total');
		$tgl_input = $this->input->post('tgl_input');
		$periode = $this->input->post('periode');
		$id_penjualan = $this->input->post('id_penjualan');
		$member = $this->input->post('member');
		$id_barang = $this->input->post('id_barang');
		$jumlah_dipilih = count($id_barang);

		//$total_bayar = $this->input->post('total_bayar');
		$tot_bayar = $this->input->post('tot_bayar');
		$bayar = $this->input->post('bayar');
		$hitung = $bayar - $tot_bayar	;

		if($bayar >= $tot_bayar)
		{
			for($x=0;$x<$jumlah_dipilih;$x++){

				$data = array(
					'id_barang' => $id_barang[$x],
					'id_member' => $member,
					'jumlah' => $jumlah[$x],
					'total' => $total[$x],
					'tanggal_input' => $tgl_input[$x],
					'periode' => $periode[$x],
					'no_faktur' => $no_faktur,
					'id_penjualan' => $id_penjualan[$x]
				);
				//insert nota
				$this->db->insert('nota', $data);
				//update stok barang
				$barang = $this->M_view->barang_id($id_barang[$x]);
				$stok = $barang[0]->stok;
				$idb  = $barang[0]->id;
				$total_stok = $stok - $jumlah[$x];
				//update stok
				$this->M_edit->stok_id($id_barang[$x], $total_stok);
				//print_r($idb.$stok.$total_stok);
								
			}
			echo '<script>alert("Belanjaan Berhasil Di Bayar !\nUang Kembali = Rp '.$hitung.'");</script>';
			$this->hapus_keranjang();
			echo '<script>window.location="'.base_url('transaksi').'"</script>';
		} else {
			echo '<script>alert("Uang Bayar Kurang ! ( Rp '.$hitung.' )");</script>';
			echo '<script>window.location="'.base_url('transaksi').'"</script>';
		}
		

		
	}

}
