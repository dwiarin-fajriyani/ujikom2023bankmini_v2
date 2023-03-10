<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Form Tambah Data Nasabah
                </div>
                <div class="card-body">
                    <?php if(validation_errors()) : ?>
                        <div class="alert alert-danger" role="alert">
                            <?= validation_errors(); ?>
                        </div>
                    <?php endif; ?>
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="nisn_nik" class="form-label">NISN / NIK</label>
                            <input type="text" name="nisn_nik" class="form-control" id="nisn_nik">
                        </div>
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" name="nama" class="form-control" id="nama">
                        </div>
                        <div class="mb-3" >
                            <label for="kelas" class="form-label">Kelas</label>
                            <select name="kelas" class="form-select" aria-label="Pilih Kelas">
                                <?php 
                                foreach ($kelas as $row) {
                                ?>
                                <option value="<?php echo $row->kd_kelas; ?>"><?php echo $row->kd_kelas; ?></option>
                            <?php } ?>
                            </select>   
                        </div>
                        <div class="mb-3" class="form-label">
                            <label for="alamat" class="form-label">Alamat</label>
                            <textarea class="form-control" name="alamat" id="alamat" rows="4"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="notelp" class="form-label">No. Telp</label>
                            <input type="text" name="notelp" class="form-control" id="notelp">
                        </div>
                        <button type="submit" name="tambah" class="btn btn-primary float-right">Simpan Data</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

