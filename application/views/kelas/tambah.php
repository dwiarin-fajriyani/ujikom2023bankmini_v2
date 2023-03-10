<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Form Tambah Data Kelas
                </div>
                <div class="card-body">
                    <?php if(validation_errors()) : ?>
                        <div class="alert alert-danger" role="alert">
                            <?= validation_errors(); ?>
                        </div>
                    <?php endif; ?>
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="nama" class="form-label">Kelas</label>
                            <input type="text" name="kode_kelas" class="form-control" id="kd_kelas">
                        </div>
                        <div class="mb-3">
                            <label for="kelas"  class="form-label">Jurusan</label>
                            <select name="jurusan" class="form-select" aria-label="Pilih Kelas">
                                <option value="Akuntansi dan Keuangan Lembaga">Akuntansi dan Keuangan Lembaga</option>
                                <option value="Otomatisasi dan Tata Kelola Perkantoran">Otomatisasi dan Tata Kelola Perkantoran</option>
                                <option value="Bisnis Daring dan Pemasaran">Bisnis Daring dan Pemasaran</option>
                                <option value="Rekayasa Perangkat Lunak">Rekayasa Perangkat Lunak</option>
                            </select>                            
                        </div>
                        <div class="mb-3" class="form-label">
                            <label for="jumlah_siswa" class="form-label">Jumlah Siswa</label>
                            <input type="text" name="jumlah_siswa" class="form-control" id="jumlah_siswa">
                        </div>
                        <button type="submit" name="tambah" class="btn btn-primary float-right">Simpan Data</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

