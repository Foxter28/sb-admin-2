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
$id_user = $_GET['id'];

// ambil data user untuk ditampilkan di form
$data = query("SELECT * FROM users WHERE id_user = '$id_user'")[0];

// jika tombol simpan ditekan
if (isset($_POST['simpan'])) {
  if (ubah_user($_POST) > 0) {
    echo '<div class="alert alert-success" role="alert">Data berhasil diubah!</div>';
    // refresh data setelah update
    $data = query("SELECT * FROM users WHERE id_user = '$id_user'")[0];
  } else {
    echo '<div class="alert alert-danger" role="alert">Data gagal diubah!</div>';
  }
}
?>

<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800">Ubah Data User</h1>

  <!-- Konten Edit Data User -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6>Data User</h6>
    </div>
    <div class="card-body">
      <form method="post" action="">
        <input type="hidden" name="id_user" id="id_user" value="<?= $id_user ?>">
        <div class="form-group row">
          <label for="username" class="col-sm-3 col-form-label">Username</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="username" name="username" value="<?= $data['username'] ?>">
          </div>
        </div>
        <div class="form-group row">
          <label for="user_role" class="col-sm-3 col-form-label">User Role</label>
          <div class="col-sm-8">
            <select class="form-control" id="user_role" name="user_role">
              <option value="admin" <?= $data['user_role'] == 'admin' ? 'selected' : ''; ?>>Administrator</option>
              <option value="operator" <?= $data['user_role'] == 'operator' ? 'selected' : ''; ?>>Operator</option>
            </select>
          </div>
        </div>
        <div class="form-group row">
          <label for="" class="col-sm-3 col-form-label"></label>
          <div class="col-sm-8 d-flex justify-content-end">
            <a type="button" class="btn btn-danger btn-icon-split" href="users.php">
              <span class="icon text-white-50">
                <i class="fas fa-chevron-left"></i>
              </span>
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