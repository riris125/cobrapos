<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Customer</h1>

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
						<th>NIK</th>
						<th>Nama Customer</th>
						<th>Alamat</th>
						<th>Telepon</th>
						<th>Email</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$no = 1;
					foreach ($customer as $row) :
					?>
						<tr>
							<td><?= $no++; ?></td>
							<td><?= $row->NIK?></td>
							<td><?= $row->nm_member?></td>
							<td><?= $row->alamat_member?></td>
							<td><?= $row->telepon?></td>
							<td><?= $row->email?></td>
							<td>
								<a href="#" data-toggle="modal" data-target="#editModal<?= $row->id_member ?>">
									<button class="btn btn-warning">Edit</button>
								</a>
								<a href="<?= base_url('customer/hapus/') ?><?= $row->id_member ?>" onclick="javascript:return confirm('Yakin Hapus Data customer ?');"><button class="btn btn-danger">Hapus</button></a>
							</td>
						</tr>
						<!-- Edit Modal-->
						<div class="modal fade" id="editModal<?= $row->id_member ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
							<div class="modal-dialog" role="document">
								<form method="post" action="<?= base_url('customer/edit_simpan') ?>" enctype="multipart/form-data">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="exampleModalLabel">Edit customer</h5>
											<button class="close" type="button" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">×</span>
											</button>
										</div>
										<div class="modal-body">
											<input type="hidden" name="id_member" value="<?= $row->id_member?>">
											NIK
											<input type="text" placeholder="NIK" required class="form-control" name="NIK" value="<?= $row->NIK ?>">
											<br>
											Nama Customer
											<input type="text" placeholder="NIK" required class="form-control" name="nm_member" value="<?= $row->nm_member ?>">
											<br>
											Alamat Customer
											<input type="text" placeholder="Alamat Member" required class="form-control" name="alamat_member" value="<?= $row->alamat_member ?>">
											<br>
											Telepon
											<input type="text" placeholder="Telepon" required class="form-control" name="telepon" value="<?= $row->telepon ?>">
											<br>
											Email
											<input type="text" placeholder="Email" required class="form-control" name="email" value="<?= $row->email ?>">
											
										</div>
										<div class="modal-footer">
											<button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
											<button type="submit" class="btn btn-success">Simpan</button>
										</div>
									</div>
								</form>
							</div>
						</div>
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
		<form method="post" action="<?= base_url('customer/tambah_simpan') ?>" enctype="multipart/form-data">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Tambah customer</h5>
					<button class="close" type="button" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="modal-body">
					<table class="table table-striped bordered">
						<tr>
							<td>NIK</td>
							<td><input type="text" placeholder="NIK" required class="form-control" name="NIK"></td>
						</tr>
						<tr>
							<td>Nama Customer</td>
							<td><input type="text" placeholder="Nama Customer" required class="form-control" name="nm_member"></td>
						</tr>
						<tr>
							<td>Alamat</td>
							<td><input type="text" placeholder="Alamat" required class="form-control" name="alamat_member"></td>
						</tr>
						<tr>
							<td>Telepon</td>
							<td><input type="number" placeholder="Telepon" required class="form-control" name="telepon"></td>
						</tr>
						<tr>
							<td>Email</td>
							<td><input type="email" placeholder="Email" required class="form-control" name="email"></td>
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