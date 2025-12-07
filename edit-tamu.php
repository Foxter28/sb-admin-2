<?php
include_once('template/header.php');
include_once('function.php');
include_once('koneksi.php');

ini_set('display_errors', 1);
error_reporting(E_ALL);

// ambil id dari URL
if (!isset($_GET['id'])) {
  echo "<div class='alert alert-danger m-3'>ID tidak ditemukan</div>";
  include_once('template/footer.php');
  exit;
}
$id_tamu = $_GET['id'];

// ambil data tamu untuk ditampilkan di form
$data = query("SELECT * FROM tamu WHERE id_tamu = '$id_tamu'")[0];

// jika tombol simpan ditekan
if (isset($_POST['simpan'])) {
  if (ubah_tamu($_POST) > 0) {
    echo '<div class="alert alert-success" role="alert">Data berhasil diubah!</div>';
    // refresh data setelah update
    $data = query("SELECT * FROM tamu WHERE id_tamu = '$id_tamu'")[0];
  } else {
    echo '<div class="alert alert-danger" role="alert">Data gagal diubah!</div>';
  }
}
?>

<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800">Ubah Data Tamu</h1>

  <!-- Konten Edit Data Tamu -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6>Data Tamu</h6>
    </div>
    <div class="card-body">

      <form method="post" action="" enctype="multipart/form-data">
        <input type="hidden" name="id_tamu" id="id_tamu" value="<?= $id_tamu ?>" />
        <input type="hidden" name="gambarLama" value="<?= $data['gambar']; ?>" />

        <div class="form-group row">
          <label for="nama_tamu" class="col-sm-3 col-form-label">Nama Tamu</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="nama_tamu" name="nama_tamu"
              value="<?= $data['nama_tamu'] ?>" />
          </div>
        </div>

        <div class="form-group row">
          <label for="alamat" class="col-sm-3 col-form-label">Alamat</label>
          <div class="col-sm-8">
            <textarea class="form-control" id="alamat" name="alamat"><?= $data['alamat'] ?></textarea>
          </div>
        </div>

        <div class="form-group row">
          <label for="no_hp" class="col-sm-3 col-form-label">No. Telepon</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="no_hp" name="no_hp"
              value="<?= $data['no_hp'] ?>" />
          </div>
        </div>

        <div class="form-group row">
          <label for="bertemu" class="col-sm-3 col-form-label">Bertemu dg.</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="bertemu" name="bertemu"
              value="<?= $data['bertemu'] ?>" />
          </div>
        </div>

        <div class="form-group row">
          <label for="kepentingan" class="col-sm-3 col-form-label">Kepentingan</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="kepentingan" name="kepentingan"
              value="<?= $data['kepentingan'] ?>" />
          </div>
        </div>

        <div class="form-group row">
          <label for="gambar" class="col-sm-3 col-form-label">Gambar Foto</label>
          <div class="col-sm-8">
            <img src="assets/upload_gambar/<?= $data['gambar']; ?>" alt="-" width="30%">
            <input type="file" class="form-control-file" id="gambar" name="gambar">
          </div>
        </div>


        <div class="form-group row">
          <label class="col-sm-3 col-form-label"></label>
          <div class="col-sm-8 d-flex justify-content-end">
            <a class="btn btn-danger btn-icon-split mr-2" href="buku-tamu.php">
              <span class="icon text-white-50"><i class="fas fa-chevron-left"></i></span>
              <span class="text">Kembali</span>
            </a>
            <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
          </div>
        </div>
      </form>

    </div>
  </div>
</div>
<!-- /.container-fluid -->

<?php include_once('template/footer.php'); ?>