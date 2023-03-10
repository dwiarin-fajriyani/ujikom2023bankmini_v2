  <div class="px-4 py-3 container mt-3">
    <h3>Profil Nasabah</h3>
    <div class="row mt-3">
      <div class="col-2 fw-bold"> Nama </div>
      <div class="col-4"> <?php echo $member->nama; ?> </div>
      <div class="col-2 fw-bold"> Jumlah Setor </div>
      <div class="col-4"> <?php echo $setor->saldo; ?> </div>
    </div>
    <div class="row mt-3">
      <div class="col-2 fw-bold"> No. Rekening </div>
      <div class="col-4"> <?php echo $member->no_rek; ?></div>
      <div class="col-2 fw-bold"> Jumlah Tarik </div>
      <div class="col-4"> <?php echo $tarik->saldo; ?> </div>
    </div>
    <div class="row mt-3">
      <div class="col-2 fw-bold"> Alamat </div>
      <div class="col-4"> <?php echo $member->alamat; ?></div>
      <div class="col-2 fw-bold"> Saldo </div>
      <div class="col-4"> <?php echo $setor->saldo - $tarik->saldo; ?> </div>
    </div>
    <div class="row mt-3">
      <div class="col-2 fw-bold"> Kelas </div>
      <div class="col-10"> <?php echo $member->kd_kelas; ?></div>
    </div>
    <h3 class="mt-5">Mini Statement</h3>
    <table class="table table-hover mt-3">
					<tr>
						<th>No</th>
						<th>Kode Transaksi</th>
						<th>Tanggal</th>
						<th>Transaksi</th>
						<th>Petugas</th>
						<th>Nominal</th>
					</tr>
				<?php 
				$no = 1;
				foreach ($ministeatment as $row) {
					?>
					<tr>
						<td><?php echo $no++ ?></td>
						<td><?php echo $row->kd_transaksi ?></td>
						<td><?php echo $row->tanggal ?></td>
						<td><?php echo $row->jenis_transaksi ?></td>
						<td><?php echo $row->kd_petugas ?></td>
						<td><?php echo $row->nominal ?></td>
					</tr>
				<?php } ?>
			</table>
  </div>
</div>

