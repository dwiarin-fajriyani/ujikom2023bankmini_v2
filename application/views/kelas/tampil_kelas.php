<div class="container mt-3">
	<?php if($this->session->flashdata('notif') ) : ?>
		<div class="row mt-3">
			<div class="col-md-12">
				<div class="alert alert-success alert-dismissible fade show" role="alert">
				  Data kelas <strong> berhasil </strong> <?php echo $this->session->flashdata('notif'); ?>
				  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>
			</div>
		</div>
	<?php endif; ?>
	
	<div class="card">
		<div class="card-header">Data Kelas</div>
		<div class="card-body">
			<div class="row mt-3">
				<div class="col-md-12 d-flex justify-content-between align-items-center">
					<a href="<?php echo base_url('siswa/tambah'); ?>" role="button" class="btn btn-primary">Tambah Data Kelas</a>
					<form action="" method="post">
						<div class="input-group">
						  <input type="text" class="form-control" placeholder="Cari Data Kelas" name="keyword">
						  <button class="btn btn-primary" type="submit">Cari</button>
						</div>
					</form>
				</div>
			</div>
			
			<?php if (empty($kelas)) : ?>
			<div class="alert alert-danger alert-dismissible fade show" role="alert">
						Data kelas tidak ditemukan
				  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>
			<?php endif; ?>
			<table class="table table-hover mt-3">
					<tr>
						<th>No</th>
						<th>Kelas</th>
						<th>Jurusan</th>
						<th>Jumlah Siswa</th>
						<th>Action</th>
					</tr>
				<?php 
				$no = 1;
				foreach ($kelas as $row) {
					?>
					<tr>
						<td><?php echo $no++ ?></td>
						<td><?php echo $row->kd_kelas ?></td>
						<td><?php echo $row->jurusan ?></td>
						<td><?php echo $row->jumlah_siswa ?></td>
						<td> 
							<a href="<?php echo base_url('kelas/edit/').$row->kd_kelas;?>" class="badge bg-success"> Edit</a>
							<a href="<?php echo base_url('kelas/hapus/').$row->kd_kelas;?>" class="badge bg-danger" onclick="return confirm('Yakin ingin menghapus data?');"> Hapus</a>
						</td>
					</tr>
				<?php } ?>
			</table>
		</div>
	</div>
</div>

