<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
	</div>

	<!-- Content Row -->
	<div class="row">

		<!-- Earnings (Monthly) Card Example -->
		<div class="col-xl-3 col-md-6 mb-4">
			<div class="card border-left-primary shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
								Penjualan (Bulan ini)
							</div>
							<?php foreach ($penjualan_bulan_ini as $row): ?>
							<div class="h5 mb-0 font-weight-bold text-gray-800">Rp <?=number_format($row->total) ?></div>
							<?php endforeach ?>
						</div>
						<div class="col-auto">
							<i class="fas fa-coins fa-2x text-gray-300"></i>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Earnings (Monthly) Card Example -->
		<div class="col-xl-3 col-md-6 mb-4">
			<div class="card border-left-success shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-success text-uppercase mb-1">
								Penjualan (Tahun ini)</div>
							<?php foreach ($penjualan_tahun_ini as $row): ?>
							<div class="h5 mb-0 font-weight-bold text-gray-800">Rp <?=number_format($row->total) ?></div>
							<?php endforeach ?>
						</div>
						<div class="col-auto">
							<i class="fas fa-coins fa-2x text-gray-300"></i>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Earnings (Monthly) Card Example -->
		<div class="col-xl-3 col-md-6 mb-4">
			<div class="card border-left-info shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-info text-uppercase mb-1">Penjualan (Bulan Lalu)
							</div>
							<?php foreach ($penjualan_bulan_lalu as $row): ?>
							<div class="h5 mb-0 font-weight-bold text-gray-800">Rp <?=number_format($row->total) ?></div>
							<?php endforeach ?>
						</div>
						<div class="col-auto">
						<i class="fas fa-coins fa-2x text-gray-300"></i>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Pending Requests Card Example -->
		<div class="col-xl-3 col-md-6 mb-4">
			<div class="card border-left-warning shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
							Penjualan (Tahun Lalu)</div>
							<?php foreach ($penjualan_tahun_lalu as $row): ?>
							<div class="h5 mb-0 font-weight-bold text-gray-800">Rp <?=number_format($row->total) ?></div>
							<?php endforeach ?>
						</div>
						<div class="col-auto">
							<i class="fas fa-coins fa-2x text-gray-300"></i>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Content Row -->

	<div class="row">

		<!-- Area Chart -->
		<div class="col-xl-12 col-lg-7">
			<div class="card shadow mb-4">
				<!-- Card Header - Dropdown -->
				<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
					<h6 class="m-0 font-weight-bold text-primary">Penjualan by Barang (Bulan Ini)</h6>
					
				</div>
				<!-- Card Body -->
				<div class="card-body">
				<div class="table-responsive">
					<table class="table table-bordered table-striped table-sm" id="example1">
						<thead>
						<tr style="background:#DFF0D8;color:#333;">
							<th>No.</th>
							<th>Nama Barang</th>
							<th>Sisa Stok</th>
							<th>Harga Jual</th>
							<th>Jumlah</th>
							<th>Total</th>
						</tr>
						</thead>
						<tbody>
							<?php
							$no = 1;
							foreach ($penjualan_by_barang as $row) :
							?>
								<tr>
									<td><?= $no++; ?></td>
									<td><?= $row->nama_barang?></td>
									<td><?= $row->stok?></td>
									<td><?= "Rp ".number_format($row->harga_jual)?></td>
									<td><?= $row->jumlah?></td>
									<td><?= "Rp ".number_format($row->total)?></td>
									
								</tr>
								
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>
				</div>
			</div>
		</div>

		
	</div>

	<div class="row">

<!-- Area Chart -->
<div class="col-xl-12 col-lg-7">
	<div class="card shadow mb-4">
		<!-- Card Header - Dropdown -->
		<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
			<h6 class="m-0 font-weight-bold text-primary">Penjualan by Customer (Bulan ini)</h6>
			
		</div>
		<!-- Card Body -->
		<div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered table-striped table-sm" id="example1">
				<thead>
				<tr style="background:#DFF0D8;color:#333;">
					<th>No.</th>
					<th>Nama Customer</th>
					<th>Jumlah Pembelian</th>
					<th>Total Pembelian</th>
					
				</tr>
				</thead>
				<tbody>
					<?php
					$no = 1;
					foreach ($penjualan_by_customer as $row) :
					?>
						<tr>
							<td><?= $no++; ?></td>
							<td><?= $row->nm_member?></td>
							<td><?= $row->jumlah?></td>
							<td><?= "Rp ".number_format($row->total)?></td>
						
						</tr>
						
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
		</div>
	</div>
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

<!-- Page level plugins -->
<script src="<?= base_url() ?>/sb-admin/vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="<?= base_url() ?>/sb-admin/js/demo/chart-area-demo.js"></script>
<script src="<?= base_url() ?>/sb-admin/js/demo/chart-pie-demo.js"></script>

</body>

</html>