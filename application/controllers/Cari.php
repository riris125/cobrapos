<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cari extends CI_Controller
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
		$cari = trim(strip_tags($_POST['keyword']));
		if ($cari == '') {
        } else {

			//$data['barang'] = $this->M_view->barangbykey($cari);
			$barang = $this->M_view->barangbykey($cari);
			//print_r($barang);

			
			?>
			<table class="table table-stripped" width="100%" id="example2">
                <tr>
                    <th>ID Barang</th>
                    <th>Nama Barang</th>
                    <th>Merk</th>
                    <th>Harga Jual</th>
                    <th>Aksi</th>
                </tr>
                <?php foreach ($barang as $hasil) : ?>
                    <tr>
                        <td><?php echo $hasil->id_barang; ?></td>
                        <td><?php echo $hasil->nama_barang; ?></td>
                        <td><?php echo $hasil->merk; ?></td>
                        <td><?php echo $hasil->harga_jual; ?></td>
                        <td>
                            <a href="<?= base_url('transaksi/tambah_keranjang/') ?><?= $hasil->id_barang; ?>" class="btn btn-success">
                                <i class="fa fa-shopping-cart"></i></a>
                        </td>
                    </tr>
				<?php endforeach; ?>
            </table>
		<?php 
		}
	}
}
