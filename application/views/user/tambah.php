<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Form Tambah User
                </div>
                <div class="card-body">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="nama" class="form-label">No Rekening / Kode Petugas</label>
                            <input type="text" name="no_rek_kd_petugas" class="form-control" id="no_rek_kd_petugas" value="<?php echo set_value('no_rek_kd_petugas'); ?>">
                            <small class="text-danger"><?= form_error('no_rek_kd_petugas')?></small>
                        </div>
                        <div class="mb-3" class="form-label">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" name="email" class="form-control" id="email" value="<?php echo set_value('email'); ?>">
                            <small class="text-danger"><?= form_error('email')?></small>
                        </div>
                        <div class="mb-3" class="form-label">
                            <label for="password1" class="form-label">Password</label>
                            <input type="password1" name="password1" class="form-control" id="password1">
                            <small class="text-danger"><?= form_error('password1')?></small>
                        </div>
                        <div class="mb-3" class="form-label">
                            <label for="password2" class="form-label">Ketik Ulang Password</label>
                            <input type="password2" name="password2" class="form-control" id="password2">
                        </div>
                        <div class="mb-3">
                            <label for="roleId"  class="form-label">Role ID</label>
                            <select name="roleId" class="form-select" aria-label="Pilih Kelas">
                                <?php 
                                foreach ($user_role as $row) {
                                ?>
                                <option value="<?php echo $row->id; ?>"><?php echo $row->role; ?></option>
                            <?php } ?>
                            </select>                           
                        </div>
                        <button type="submit" name="tambah" class="btn btn-primary float-right">Simpan Data</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


