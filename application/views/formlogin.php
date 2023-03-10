<div class="container col-md-4 position-absolute top-50 start-50 translate-middle">
  <div class="card">
    <div class="card-body p-5">
      <h1 class="text-center text-primary fw-bold mb-3">Form Login</h1>
      <h4 class="text-center fw-bold mb-3">Bank Mini SMKN 2 Sumedang</h4>
      <?php if($this->session->flashdata('notif') ) : ?>
      <div class="row mt-3">
        <div class="col-md-12">
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
           <?php echo $this->session->flashdata('notif'); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        </div>
      </div>
      <?php endif; ?>
      <form action="<?php echo base_url('auth'); ?>" method="post">
        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input type="text" class="form-control" name="email" id="email" value="<?php echo set_value('email');?>" placeholder="Masukan email">
          <small class="text-danger"><?= form_error('email')?></small>
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Kata sandi</label>
          <input type="password" name="password" id="password" class="form-control" placeholder="Masukkan kata sandi">
          <small class="text-danger"><?= form_error('password')?></small>
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Kata sandi</label>
          <select name="roleId" class="form-select" aria-label="Pilih Role ID">
            <option> --- Pilih role --- </option>
            <?php 
                foreach ($role as $row) {
                ?>
                <option value="<?php echo $row->id; ?>"><?php echo $row->role; ?></option>
            <?php 
            } 
            ?>
          </select>
          <small class="text-danger"><?= form_error('password')?></small>
        </div>
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <button type="submit" name="login" class="btn btn-primary btn-block">Login</button>    
        </div>
      </form>
    </div>
  </div>
</div>

