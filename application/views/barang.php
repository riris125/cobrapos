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
	<a href="#" data-toggle="modal" data-target="#tambahModal" id="tombol-simpan" class="btn btn-primary"><i class="fa fa-plus"></i>
		Tambah
	</a>
	<br><br>
	<div class="card card-body">
		<div class="table-responsive">
			<table class="table table-bordered table-striped table-sm" id="example1">
				<thead>
					<tr style="background:#DFF0D8;color:#333;">
						<th>No.</th>
						<th>Kategori</th>
						<th>ID Barang</th>
						<th>Nama Barang</th>
						<th>Merk</th>
						<th>Stok</th>
						<th>Harga Beli</th>
						<th>Harga Jual</th>
						<th>Satuan</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$no = 1;
					foreach ($barang as $row) :
					?>
						<tr>
							<td><?= $no++; ?></td>
							<td><?= $row->nama_kategori ?></td>
							<td><?= $row->id_barang ?></td>
							<td><?= $row->nama_barang ?></td>
							<td><?= $row->merk ?></td>
							<td><?= $row->stok ?></td>
							<td><?= $row->harga_beli ?></td>
							<td><?= $row->harga_jual ?></td>
							<td><?= $row->satuan_barang ?></td>
							<td>
								<a href="<?= base_url('barang/edit/' . $row->id) ?>">
									<button class="btn btn-warning">Edit</button>
								</a>
								<a href="<?= base_url('barang/hapus/') ?><?= $row->id ?>" onclick="javascript:return confirm('Yakin Hapus Data Barang ?');"><button class="btn btn-danger">Hapus</button></a>
							</td>
						</tr>

					<?php endforeach; ?>
				</tbody>
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
<!-- Tambah Modal-->
<div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">

		<form method="post" action="<?= base_url('barang/tambah_simpan') ?>" enctype="multipart/form-data">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Tambah Barang</h5>
					<button class="close" type="button" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="modal-body">
					<table class="table table-striped bordered">
						<tr>
							<td>Kategori</td>
							<td>
								<select name="id_kategori" class="form-control" required>
									<option value="#">Pilih Kategori</option>
									<?php foreach ($kategori as $row) :	?>
										<option value="<?= $row->id_kategori ?>">
											<?= $row->nama_kategori ?></option>
									<?php endforeach ?>
								</select>
							</td>
						</tr>
						<tr>
							<td>ID Barang</td>
							<td><input type="text" placeholder="ID Barang" required class="form-control" name="id_barang"></td>
						</tr>
						<tr>
							<td>Nama Barang</td>
							<td><input type="text" placeholder="Nama Barang" required class="form-control" name="nama_barang"></td>
						</tr>
						<tr>
							<td>Merk Barang</td>
							<td><input type="text" placeholder="Merk Barang" required class="form-control" name="merk"></td>
						</tr>
						<tr>
							<td>Harga Beli</td>
							<td><input type="number" placeholder="Harga beli" required class="form-control" name="harga_beli"></td>
						</tr>
						<tr>
							<td>Harga Jual</td>
							<td><input type="number" placeholder="Harga Jual" required class="form-control" name="harga_jual"></td>
						</tr>
						<tr>
							<td>Satuan Barang</td>
							<td>
								<select name="satuan_barang" class="form-control" required>
									<option value="#">Pilih Satuan</option>
									<option value="PCS">PCS</option>
								</select>
							</td>
						</tr>
						<tr>
							<td>Stok</td>
							<td><input type="number" required Placeholder="Stok" class="form-control" name="stok"></td>
						</tr>
						<tr>
							<td>Tanggal Input</td>
							<td><input type="text" required readonly="readonly" class="form-control" value="<?php echo  date("j F Y, G:i"); ?>" name="tgl_input"></td>
						</tr>
					</table>
				</div>
				<div class="modal-footer">
					<button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
					<button type="submit" class="btn btn-success">Simpan</button>
				</div>
			</div>
		</form>
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