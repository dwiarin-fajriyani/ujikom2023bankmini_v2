<div class="container mt-3">
	<?php if($this->session->flashdata('notif') ) : ?>
		<div class="row mt-3">
			<div class="col-md-12">
				<div class="alert alert-success alert-dismissible fade show" role="alert">
				  Data transaksi <strong> berhasil </strong> <?php echo $this->session->flashdata('notif'); ?>
				  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>
			</div>
		</div>
	<?php endif; ?>
	
	<div class="card">
		<div class="card-header">Data Transaksi</div>
		<div class="card-body">
			<div class="row mt-3">
				<div class="col-md-12 d-flex justify-content-between align-items-center">
				<span>
							<a href="<?php echo base_url('transaksi/tambah'); ?>" role="button" class="btn btn-primary">Tambah Transaksi</a>
							<a href="" target="_blank" role="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">Export Laporan</a>
							<!-- Modal -->
							<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalLabel">Laporan</h5>
									<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
								</div>
								<div class="modal-body">
								<form action="<?php echo base_url('transaksi/pdf');?>" method="post">
									<div class="input-group">
										<span class="input-group-text">Periode</span>
										<input type="date" aria-label="Awal" name="tglAwal" class="form-control">
										<input type="date" aria-label="Last name" name="tglAkhir" class="form-control">
										</div>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
										<button type="submit" class="btn btn-primary" target="_blank">Buat Laporan</button>
									</div>
								</form>
								</div>
							</div>
							</div>
						</span>
					<form action="" method="post">
						<div class="input-group">
						  <input type="text" class="form-control" placeholder="Cari Data Transaksi" name="keyword">
						  <button class="btn btn-primary" type="submit">Cari</button>
						</div>
					</form>
				</div>
			</div>
			
			<?php if (empty($transaksi)) : ?>
			<div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
						Data transaksi tidak ditemukan
				  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>
			<?php endif; ?>
			<table class="table table-hover mt-3">
					<tr>
						<th>No</th>
						<th>Kode Transaksi</th>
						<th>Tanggal</th>
						<th>Rekening</th>
						<th>Nama</th>
						<th>Transaksi</th>
						<th>Petugas</th>
						<th>Nominal</th>
						<th>Action</th>
					</tr>
				<?php 
				$no = 1;
				foreach ($transaksi as $row) {
					?>
					<tr>
						<td><?php echo $no++ ?></td>
						<td><?php echo $row->kd_transaksi ?></td>
						<td><?php echo $row->tanggal ?></td>
						<td><?php echo $row->no_rek ?></td>
						<td><?php echo $row->nama_nasabah ?></td>
						<td><?php echo $row->jenis_transaksi ?></td>
						<td><?php echo $row->nama_petugas ?></td>
						<td><?php echo $row->nominal ?></td>
						<td> 
							<a href="<?php echo base_url('transaksi/edit/').$row->kd_transaksi;?>" class="badge bg-success"> Edit</a>
							<a href="<?php echo base_url('transaksi/hapus/').$row->kd_transaksi;?>" class="badge bg-danger" onclick="return confirm('Yakin ingin menghapus data nilai ?');"> Hapus</a>
						</td>
					</tr>
				<?php } ?>
			</table>
		</div>
	</div>
</div>

