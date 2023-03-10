<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Form Tambah Transaksi
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
                            <?php 
                                $kode = $kd_transaksi->kode; ?>
                            <input type="text" name="kd_transaksi" class="form-control" id="kd_transaksi" value="BM-<?php echo date("ymd")."-".sprintf('%04d',$kode + 1) ;?>"  readonly>                
                        </div>
                        <div class="mb-3">
                            <label for="nama_siswa" class="form-label">Pilih Nasabah</label>     
                                <select name="no_rek" id="no_rek" class="form-select" aria-label="Pilih Nasabah">
                                    <?php 
                                        foreach ($nasabah as $row) {
                                        ?>
                                        <option value="<?php echo $row->no_rek; ?>"><?php echo $row->no_rek." - ".$row->nama; ?></option>
                                    <?php 
                                    } 
                                ?>
                                </select> 
                        </div>
                        <div class="mb-3">
                            <label for="tanggal"  class="form-label">Tanggal</label>
                            <input type="date" name="tanggal" class="form-control" id="tanggal">                
                        </div>
                        <div class="mb-3" >
                            <label for="jenistransaksi" class="form-label">Jenis Transaksi</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="jenis_transaksi" value="ST" id="jenis_transaksi" checked>
                                <label class="form-check-label" for="jenis2">
                                    Setor
                                </label>
                                </div>
                                <div class="form-check">
                                <input class="form-check-input" type="radio" value="TR" name="jenis_transaksi" id="jenis_transaksi">
                                <label class="form-check-label" for="jenis2">
                                    Tarik
                                </label>
                                </div>
                        <div class="mb-3">
                            <label for="kd_petugas" class="form-label">Nama Petugas</label>     
                                <select name="kd_petugas" id="kd_petugas" class="form-select" aria-label="Pilih Petugas">
                                    <?php 
                                        foreach ($petugas as $row) {
                                        ?>
                                        <option value="<?php echo $row->kd_petugas; ?>"><?php echo $row->kd_petugas." - ".$row->nama; ?></option>
                                    <?php 
                                    } 
                                ?>
                                </select> 
                        </div>
                        <div class="mb-3">
                            <label for="nominal"  class="form-label">Nominal</label>
                            <input type="number" name="nominal" class="form-control" id="nominal">                
                        </div>
                        <button type="submit" name="tambah" class="btn btn-primary float-right">Simpan Data</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

