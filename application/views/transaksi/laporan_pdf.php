<div class="container mt-3">
	<div class="card">
		<div class="card-header"><h3>Data Transaksi</h3></div>
		<div class="card-body">			
			<table class="table table-hover mt-3" border="1">
					<tr>
						<th>No</th>
						<th>Kode Transaksi</th>
						<th>Tanggal</th>
						<th>Rekening</th>
						<th>Nama</th>
						<th>Transaksi</th>
						<th>Petugas</th>
						<th>Nominal</th>
					</tr>
				<?php 
				$no = 1;
				foreach ($transaksi as $row) {
					?>
					<tr>
						<td><?php echo $no++ ?></td>
						<td><?php echo $row->kd_transaksi ?></td>
						<td><?php echo substr($row->tanggal, 0, 10) ?></td>
						<td><?php echo $row->no_rek ?></td>
						<td><?php echo $row->nama_nasabah ?></td>
						<td><?php echo $row->jenis_transaksi ?></td>
						<td><?php echo $row->nama_petugas ?></td>
						<td><?php echo $row->nominal ?></td>
					</tr>
				<?php } ?>
			</table>
		</div>
	</div>
</div>

