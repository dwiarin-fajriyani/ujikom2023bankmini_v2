<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Aplikasi Pengolah Nilai</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- <link href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css');?>" rel="stylesheet"> -->
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="#">SMKN 2 Sumedang</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav ">
          <?php if($this->session->userdata('role_id') == '1'){ ?>
           <a class="nav-link" aria-current="page" href="<?php echo base_url('home');?>">Home</a>
          <a class="nav-link" href="<?php echo base_url('nasabah');?>">Nasabah</a>
          <a class="nav-link" href="<?php echo base_url('kelas');?>">Kelas</a>
          <a class="nav-link" href="<?php echo base_url('petugas');?>">Petugas</a>
          <a class="nav-link" href="<?php echo base_url('transaksi');?>">Transaksi</a>
          <!-- <a class="nav-link" href="<?php echo base_url('user');?>">User</a> -->
          <a class="nav-link" href="<?php echo base_url('tentang');?>">Tentang</a>
          <?php } else { ?>
            <a class="nav-link" aria-current="page" href="<?php echo base_url('home');?>">Home</a>
          <a class="nav-link" href="<?php echo base_url('nasabah');?>">Nasabah</a>
          <a class="nav-link" href="<?php echo base_url('transaksi');?>">Transaksi</a>
          
            <?php 
          } ?>
          
          <a class="btn btn-outline-light position-absolute top-50 end-0 translate-middle mx-5" href="<?php echo base_url('auth/logout'); ?>">Logout</a>
        </div>
      </div>
    </div>
  </nav>

