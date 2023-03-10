<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Form Edit Transaksi
                </div>
                <div class="card-body">
                    <?php if(validation_errors()) : ?>
                        <div class="alert alert-danger" role="alert">
                            <?= validation_errors(); ?>
                        </div>
                    <?php endif; ?>
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="kd_transaksi"  class="form-label">Kode Transaksi</label>
                            <input type="text" name="kd_transaksi" class="form-control" id="kd_transaksi" value="<?php echo $transaksi->kd_transaksi ;?>"  readonly>                
                        </div>
                        <div class="mb-3">
                            <label for="nama_siswa" class="form-label">Pilih Nasabah</label>     
                                <select name="no_rek" id="no_rek" class="form-select" aria-label="Pilih Nasabah">
                                    <?php 
                                        foreach ($nasabah as $row) {
                                            $nasabah_selected = $transaksi->no_rek;
                                        ?>
                                        <option value="<?php echo $row->no_rek; ?>" <?php echo $nasabah_selected == $row->no_rek ? 'selected' : ''?>><?php echo $row->no_rek." - ".$row->nama; ?></option>
                            <?php } ?>
                                </select> 
                        </div>
                        <div class="mb-3" >
                            <label for="jenistransaksi" class="form-label">Jenis Transaksi</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="jenis_transaksi" value="ST" id="jenis_transaksi" <?php echo $transaksi->jenis_transaksi == 'ST' ? 'checked' : ''?>>
                                <label class="form-check-label" for="jenis2">
                                    Setor
                                </label>
                                </div>
                                <div class="form-check">
                                <input class="form-check-input" type="radio" value="TR" name="jenis_transaksi" id="jenis_transaksi" <?php echo $transaksi->jenis_transaksi == 'TR' ? 'checked' : ''?>>
                                <label class="form-check-label" for="jenis2">
                                    Tarik
                                </label>
                                </div>
                        <div class="mb-3">
                            <label for="kd_petugas" class="form-label">Nama Petugas</label>     
                                <select name="kd_petugas" id="kd_petugas" class="form-select" aria-label="Pilih Petugas">
                                    <?php 
                                        foreach ($petugas as $row) {
                                            $petugas_selected = $transaksi->kd_petugas;
                                        ?>
                                        <option value="<?php echo $row->kd_petugas; ?>" <?php echo $petugas_selected == $row->kd_petugas ? 'selected' : ''?>><?php echo $row->kd_petugas." - ".$row->nama; ?></option>
                                    <?php 
                                    } 
                                ?>
                                </select> 
                        </div>
                        <div class="mb-3">
                            <label for="nominal"  class="form-label">Nominal</label>
                            <input type="number" name="nominal" class="form-control" id="nominal" value="<?php echo $transaksi->nominal ;?>">                
                        </div>
                        <button type="submit" name="tambah" class="btn btn-primary float-right">Simpan Data</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

