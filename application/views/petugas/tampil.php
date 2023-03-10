<div class="container mt-3">
	<?php if($this->session->flashdata('notif') ) : ?>
		<div class="row mt-3">
			<div class="col-md-12">
				<div class="alert alert-success alert-dismissible fade show" role="alert">
				  Data petugas <strong> berhasil </strong> <?php echo $this->session->flashdata('notif'); ?>
				  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>
			</div>
		</div>
	<?php endif; ?>
	
	<div class="card">
		<div class="card-header">Data Petugas</div>
		<div class="card-body">
			<div class="row mt-3">
				<div class="col-md-12 d-flex justify-content-between align-items-center">
					<a href="<?php echo base_url('petugas/tambah'); ?>" role="button" class="btn btn-primary">Tambah Data Petugas</a>
					<form action="" method="post">
						<div class="input-group">
						  <input type="text" class="form-control" placeholder="Cari Data Petugas" name="keyword">
						  <button class="btn btn-primary" type="submit">Cari</button>
						</div>
					</form>
				</div>
			</div>
			
			<?php if (empty($petugas)) : ?>
			<div class="alert alert-danger alert-dismissible fade show" role="alert">
						Data petugas tidak ditemukan
				  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>
			<?php endif; ?>
			<table class="table table-hover mt-3">
					<tr>
						<th>No</th>
						<th>Kode Petugas</th>
						<th>Nama</th>
						<th>Kelas</th>
						<th>Alamat</th>
                        <th>No. Telp</th>
						<th>Action</th>
					</tr>
				<?php 
				$no = 1;
				foreach ($petugas as $row) {
					?>
					<tr>
						<td><?php echo $no++ ?></td>
						<td><?php echo $row->kd_petugas ?></td>
						<td><?php echo $row->nama ?></td>
						<td><?php echo $row->kd_kelas ?></td>
						<td><?php echo $row->alamat ?></td>
                        <td><?php echo $row->no_telp ?></td>
						<td> 
							<a href="<?php echo base_url('petugas/edit/').$row->kd_petugas;?>" class="badge bg-success"> Edit</a>
							<a href="<?php echo base_url('petugas/hapus/').$row->kd_petugas;?>" class="badge bg-danger" onclick="return confirm('Yakin ingin menghapus data?');"> Hapus</a>
						</td>
					</tr>
				<?php } ?>
			</table>
		</div>
	</div>
</div>

