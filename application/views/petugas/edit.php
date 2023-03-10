<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Form Tambah Data Petugas
                </div>
                <div class="card-body">
                    <form action="" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="kd_petugas" value="<?php echo $petugas->kd_petugas; ?>">
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" name="nama" class="form-control" id="nama" value="<?php echo $petugas->nama; ?>">
                            <small class="text-danger"><?= form_error('nama')?></small>
                        </div>
                        <div class="mb-3" >
                            <label for="kelas" class="form-label">Kelas</label>
                            <select name="kelas" class="form-select" aria-label="Pilih Kelas">
                                <?php 
                                foreach ($kelas as $row) {
                                    $kelas_selected = $petugas->kd_kelas;
                                
                                ?>
                                <option value="<?php echo $row->kd_kelas; ?>" <?php echo $kelas_selected == $row->kd_kelas ? 'selected' : ''?>><?php echo $row->kd_kelas; ?></option>
                            <?php } ?>
                            </select> 
                        </div>
                        <div class="mb-3" class="form-label">
                            <label for="alamat" class="form-label">Alamat</label>
                            <textarea class="form-control" name="alamat" id="alamat" rows="4"><?php echo $petugas->alamat; ?></textarea>
                            <small class="text-danger"><?= form_error('alamat')?></small>
                        </div>
                        <div class="mb-3">
                            <label for="notelp" class="form-label">No. Telp</label>
                            <input type="text" name="notelp" class="form-control" id="notelp" value="<?php echo $petugas->no_telp; ?>">
                            <small class="text-danger"><?= form_error('notelp')?></small>
                        </div>
                        <button type="submit" name="tambah" class="btn btn-primary float-right">Simpan Data</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

