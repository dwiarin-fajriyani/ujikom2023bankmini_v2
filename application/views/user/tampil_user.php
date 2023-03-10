<div class="container mt-3">
	<?php if($this->session->flashdata('notif') ) : ?>
		<div class="row mt-3">
			<div class="col-md-12">
				<div class="alert alert-success alert-dismissible fade show" role="alert">
				  Data siswa <strong> berhasil </strong> <?php echo $this->session->flashdata('notif'); ?>
				  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>
			</div>
		</div>
	<?php endif; ?>
	
	<div class="card">
		<div class="card-header">Data Pengguna</div>
		<div class="card-body">
			<div class="row mt-3">
				<div class="col-md-12 d-flex justify-content-between align-items-center">
					<a href="<?php echo base_url('user/tambah'); ?>" role="button" class="btn btn-primary">Tambah Data User</a>
					<form action="" method="post">
						<div class="input-group">
						  <input type="text" class="form-control" placeholder="Cari Data Pengguna" name="keyword">
						  <button class="btn btn-primary" type="submit">Cari</button>
						</div>
					</form>
				</div>
			</div>
			
			<?php if (empty($user)) : ?>
			<div class="alert alert-danger alert-dismissible fade show" role="alert">
						Data pengguna tidak ditemukan
				  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>
			<?php endif; ?>
			<table class="table table-hover mt-3">
					<tr>
						<th>No</th>
						<th>Nama Lengkap</th>
						<th>Email</th>
						<th>Role ID</th>
						<th>Status</th>
						
					</tr>
				<?php 
				$no = 1;
				foreach ($user as $row) {
					?>
					<tr>
						<td><?php echo $no++ ?></td>
						<td><?php echo $row->nama_nasabah ?><?php if(empty($row->nama_nasabah)): echo $row->nama_petugas ?><?php endif; ?></td>
						<td><?php echo $row->email ?></td>
						<td><?php echo $row->role_id ?></td>
						<td><p class="badge <?php echo $row->is_active =='1'?"text-bg-success":"text-bg-secondary" ?>"><?php echo $row->is_active == "1"?"Aktif":"Tidak Aktif";?> </p></td>
						
					</tr>
				<?php } ?>
			</table>
		</div>
	</div>
</div>

