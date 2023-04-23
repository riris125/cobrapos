<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Profil</h1>

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
						<th>Username</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$no = 1;
					foreach ($profil as $row) :
					?>
						<tr>
							<td><?= $no++; ?></td>
							<td><?= $row->user?></td>
							<td>
								<a href="#" data-toggle="modal" data-target="#editModal<?= $row->id_login ?>">
									<button class="btn btn-warning">Edit</button>
								</a>
								<a href="<?= base_url('profil/hapus/') ?><?= $row->id_login ?>" onclick="javascript:return confirm('Yakin Hapus Data profil ?');"><button class="btn btn-danger">Hapus</button></a>
							</td>
						</tr>
						<!-- Edit Modal-->
						<div class="modal fade" id="editModal<?= $row->id_login ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
							<div class="modal-dialog" role="document">
								<form method="post" action="<?= base_url('profil/edit_simpan') ?>" enctype="multipart/form-data">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="exampleModalLabel">Edit profil</h5>
											<button class="close" type="button" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">×</span>
											</button>
										</div>
										<div class="modal-body">
											<input type="hidden" name="id_login" value="<?= $row->id_login?>">
											User
											<input type="text" placeholder="Username" required class="form-control" name="user" value="<?= $row->user ?>">
											<br>
											Reset Password
											<input type="text" placeholder="Password" required class="form-control" name="pass" >
												
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
		<form method="post" action="<?= base_url('profil/tambah_simpan') ?>" enctype="multipart/form-data">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Tambah Profil</h5>
					<button class="close" type="button" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="modal-body">
					<table class="table table-striped bordered">
						
						<tr>
							<td>Username</td>
							<td><input type="text" placeholder="Username" required class="form-control" name="user"></td>
						</tr>
						<tr>
							<td>Password</td>
							<td><input type="text" placeholder="Password" required class="form-control" name="pass"></td>
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