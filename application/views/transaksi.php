<!-- Begin Page Content -->
<div class="container-fluid">


	<div class="card card-body">
		<div class="row">
			<div class="col-sm-4">
				<div class="card card-primary mb-3">
					<div class="card-header bg-primary text-white">
						<h5><i class="fa fa-search"></i> Cari Barang</h5>
					</div>
					<div class="card-body">
						<input type="text" id="cari" class="form-control" name="cari" placeholder="Kode / Nama Barang  [ENTER]">
					</div>
				</div>
			</div>
			<div class="col-sm-8">
				<div class="card card-primary mb-3">
					<div class="card-header bg-primary text-white">
						<h5><i class="fa fa-list"></i> Hasil Pencarian</h5>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<div id="hasil_cari"></div>
							<div id="tunggu"></div>
						</div>
					</div>
				</div>
			</div>

			<div class="col-sm-12">
				<div class="card card-primary">
					<div class="card-header bg-primary text-white">
						<h5><i class="fa fa-shopping-cart"></i> KASIR
							
						</h5>
					</div>
					<div class="card-body">
						<div id="keranjang" class="table-responsive">
							
							<table class="table table-bordered w-100" id="example1">
								<thead>
									<tr>
										<td> No</td>
										<td> Nama Barang</td>
										<td style="width:10%;"> Jumlah</td>
										<td style="width:20%;"> Total</td>
										
										<td> Aksi</td>
									</tr>
								</thead>
								<tbody>
									<?php $total_bayar = 0; ?>
									<?php
									$no = 1;
									foreach ($hasil_penjualan as $isi) :
									?>

										<tr>
											<td><?php echo $no; ?></td>
											<td><?php echo $isi->nama_barang ?></td>
											<td>
												<!-- aksi ke table penjualan -->
												<form method="POST" action="<?= base_url('transaksi/edit_keranjang_id') ?>">
													<input type="number" name="jumlah" value="<?php echo $isi->jumlah ?>" class="form-control">
													<input type="hidden" name="id_penjualan" value="<?php echo $isi->id_penjualan ?>" class="form-control">
													<input type="hidden" name="id_barang" value="<?php echo $isi->id_barang ?>" class="form-control">
											</td>
											<td><?php echo number_format($isi->total); ?></td>
											
											<td>
												<button type="submit" class="btn btn-warning">Update</button>
												</form>
												<!-- aksi ke table penjualan -->
												<a href="<?= base_url('transaksi/hapus_keranjang_id/') ?><?php echo $isi->id_penjualan ?>" class="btn btn-danger">Hapus
												</a>
											</td>
										</tr>
									<?php $no++;
										$total_bayar += $isi->total;
											
									endforeach; 
									//echo $total_bayar;
									?>
								</tbody>
							</table>
							<br />
							
							<div id="kasirnya">
							<table class="table table-stripped">			
							<!-- aksi ke table nota -->
							<form method="POST" action="<?= base_url('transaksi/bayar_nota') ?>">
									<tr>
										<td>Tanggal</td>
										<td><input type="text" readonly="readonly" class="form-control" value="<?php echo date("j F Y"); ?>" name="tgl"></td>
										<td>Member</td>
										<td>
											<select name="member" id="member" class="form-control" required>
												<option value="" selected>ID - Nama</option>	
												<?php foreach ($member as $row) : ?>
												<option value="<?= $row->id_member ?>"><?= $row->id_member ?> - <?= $row->nm_member ?></option>
												<?php endforeach; ?>
											</select>
										</td>
										<td>Faktur</td>
										<td> <input type="text" name="no_faktur" id="no_faktur" class="form-control" placeholder="Masukkan No Faktur" required> </td>
									</tr> 
		

								<?php foreach($hasil_penjualan as $isi):?>
									<input type="hidden" name="id_penjualan[]" value="<?php echo $isi->id_penjualan;?>">
									<input type="hidden" name="id_barang[]" value="<?php echo $isi->id_barang;?>">
									<!-- <input type="hidden" name="id_member[]" value="<?php echo $isi->id_member;?>"> -->
									<input type="hidden" name="jumlah[]" value="<?php echo $isi->jumlah;?>">
									<input type="hidden" name="total[]" value="<?php echo $isi->total;?>">
									<input type="hidden" name="tgl_input[]" value="<?php echo $isi->tanggal_input;?>">
									<input type="hidden" name="periode[]" value="<?php echo date('n-Y');?>">
								<?php $no++; 
							
								endforeach;?>
								<tr>
									<td>Total Semua  </td>
									<td>
										<input type="text" class="form-control" name="total_bayar" value="<?php echo number_format($total_bayar);?>">
										<input type="hidden" name="tot_bayar" value="<?= $total_bayar ?>">
									</td>
								
									<td>Bayar  </td>
									<td><input type="number" class="form-control" name="bayar" required></td>
									<td colspan="2" align="center">
									<?php if($total_bayar > 0) { ?>
									<button type="submit" value="submit" class="btn btn-success"><i class="fa fa-shopping-cart"></i> Bayar</button>
									<a class="btn btn-danger" onclick="javascript:return confirm('Apakah anda ingin reset / hapus seluruh keranjang kasir?');" href="<?= base_url('transaksi/hapus_keranjang') ?>">
									<b>RESET </b></a>
									<?php } else { ?>
									<button type="submit" value="submit" class="btn btn-success" disabled><i class="fa fa-shopping-cart"></i> Bayar</button>
									<a class="btn btn-danger disabled" onclick="javascript:return confirm('Apakah anda ingin reset / hapus seluruh keranjang ?');" href="<?= base_url('transaksi/hapus_keranjang') ?>">
									<b>RESET </b></a>
									<?php } ?>
									</td>
								</tr>
							
							</form>
							</table>
								<br/>
								<br/>
							</div>
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
<!-- Tambah Modal-->
<div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<form method="post" action="<?= base_url('kategori/tambah_simpan') ?>" enctype="multipart/form-data">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Tambah Kategori</h5>
					<button class="close" type="button" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="modal-body">
					<input type="text" class="form-control" name="nama_kategori" value="" placeholder="Nama Kategori">
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

<script>
	// AJAX call for autocomplete 
	$(document).ready(function() {
		$("#cari").change(function() {
			$.ajax({
				type: "POST",
				url: "<?= base_url('cari') ?>",
				data: 'keyword=' + $(this).val(),
				beforeSend: function() {
					$("#hasil_cari").hide();
					$("#tunggu").html('<p style="color:green"><blink>tunggu sebentar</blink></p>');
				},
				success: function(html) {
					$("#tunggu").html('');
					$("#hasil_cari").show();
					$("#hasil_cari").html(html);
				}
			});
		});
	});
	//To select country name
</script>


</body>

</html>