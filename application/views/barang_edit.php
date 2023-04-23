<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Barang</h1>

	</div>

	<?php if ($this->session->flashdata('flash') == "Diubah") : ?>
		<div class='alert alert-warning'>
			<p>Edit Data Sukses !</p>
		</div>
	<?php endif; ?>
	<?php if ($this->session->flashdata('flash') == "Disimpan") : ?>
		<div class='alert alert-success'>
			<p>Simpan Data Sukses !</p>
		</div>
	<?php endif; ?>
	<?php if ($this->session->flashdata('flash') == "Dihapus") : ?>
		<div class='alert alert-danger'>
			<p>Hapus Data Sukses !</p>
		</div>
	<?php endif; ?>
	<a href="<?= base_url('barang') ?>" id="tombol-kembali" class="btn btn-primary"><i class="fa fa-angle-left"></i>
		Kembali
	</a>
	<br><br>
	<div class="card card-body">
		<div class="table-responsive">
			<table class="table table-striped">
				<?php foreach ($barang as $row) : ?>
					<form action="<?= base_url('barang/edit_simpan') ?>" method="POST">
						<input type="hidden" name="id" value="<?= $row->id ?>">
						<tr>
							<td>ID Barang</td>
							<td><input type="text" readonly="readonly" class="form-control" value="<?= $row->id_barang ?>" name="id_barang"></td>
						</tr>
						<tr>
							<td>Kategori</td>
							<td>
								<select name="id_kategori" class="form-control">
									<option value="<?= $row->id_kategori ?>"><?= $row->nama_kategori ?></option>
									<?php foreach ($kategori as $list) : ?>
										<option value="<?= $list->id_kategori ?>"><?= $list->nama_kategori ?></option>
									<?php endforeach; ?>
								</select>
							</td>
						</tr>
						<tr>
							<td>Nama Barang</td>
							<td><input type="text" class="form-control" value="<?= $row->nama_barang ?>" name="nama_barang"></td>
						</tr>
						<tr>
							<td>Merk Barang</td>
							<td><input type="text" class="form-control" value="<?= $row->merk ?>" name="merk"></td>
						</tr>
						<tr>
							<td>Harga Beli</td>
							<td><input type="number" class="form-control" value="<?= $row->harga_beli ?>" name="harga_beli"></td>
						</tr>
						<tr>
							<td>Harga Jual</td>
							<td><input type="number" class="form-control" value="<?= $row->harga_jual ?>" name="harga_jual"></td>
						</tr>
						<tr>
							<td>Satuan Barang</td>
							<td>
								<select name="satuan_barang" class="form-control">
									<option value="<?= $row->satuan_barang ?>"><?= $row->satuan_barang ?>
									</option>
									<option value="#">Pilih Satuan</option>
									<option value="PCS">PCS</option>
								</select>
							</td>
						</tr>
						<tr>
							<td>Stok</td>
							<td><input type="number" class="form-control" value="<?= $row->stok ?>" name="stok"></td>
						</tr>
						<tr>
							<td>Tanggal Update</td>
							<td><input type="text" readonly="readonly" class="form-control" value="<?php echo  date("j F Y, G:i"); ?>" name="tgl_update"></td>
						</tr>
						<tr>
							<td></td>
							<td><button class="btn btn-primary"><i class="fa fa-edit"></i> Update Data</button></td>
						</tr>
					</form>
				<?php endforeach; ?>
			</table>
		</div>
	</div>



</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Footer -->
<footer class="sticky-footer bg-white">
	<div class="container my-auto">
		<div class="copyright text-center my-auto">
			<span>Copyright &copy; Cobra Dental 2023</span>
		</div>
	</div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
	<i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
			<div class="modal-footer">
				<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
				<a class="btn btn-primary" href="<?= base_url('login/logout') ?>">Logout</a>
			</div>
		</div>
	</div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="<?= base_url() ?>/sb-admin/vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url() ?>/sb-admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url() ?>/sb-admin/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url() ?>/sb-admin/js/sb-admin-2.min.js"></script>


</body>

</html>