<?php 

    require 'Connection.php';
    require_once 'templates/header.php'; 

?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Form <?= isset($_GET['id']) ? 'Ubah' : 'Tambah' ?> Data Mahasiswa</h1>
    </div>

    <?php

        if (isset($_GET['id']) && ctype_digit($_GET['id'])) {
            $id = $_GET['id'];

            $database = new Connection();
            $mahasiswa = $database->selectWhereData('mahasiswa', $id);

            foreach ($mahasiswa as $key => $value) {
                $nama = $value['nama'];
                $nim = $value['nim'];
                $prodi = $value['prodi'];
            }

            $type = 'update';
        } else {
            $id = '';
            $type = 'insert';
            $nama = '';
            $nim = '';
            $prodi = '';
        }

    ?>

    <div class="card">
        <div class="card-header">
            <a href="mahasiswa.php" class="btn btn-primary btn-sm">< Kembali</a>
        </div>
        <div class="card-body">
            <form action="process.php" method="POST">
                <input type="hidden" name="id" value="<?= $id; ?>">
                <input type="hidden" name="type" value="<?= $type; ?>">
                <div class="form-group mb-3">
                    <label for="" class="mb-2">Nama Lengkap : </label>
                    <input type="text" name="nama" class="form-control" value="<?= !empty($nama) ? $nama : '' ?>">
                </div>
                <div class="form-group my-3">
                    <label for="" class="mb-2">Nomor Induk Mahasiswa (NIM) : </label>
                    <input type="text" name="nim" class="form-control" value="<?= !empty($nim) ? $nim : '' ?>">
                </div>
                <div class="form-group my-3">
                    <label for="" class="mb-2">Prodi atau Jurusan : </label>
                    <input type="text" name="prodi" class="form-control" value="<?= !empty($prodi) ? $prodi : '' ?>">
                </div>
                <div class="form-group mt-3">
                    <button class="btn btn-primary" name="submit" type="submit"><?= isset($_GET['id']) ? 'Update' : 'Simpan' ?></button>
                </div>
            </form>
        </div>
    </div>
    
</main>

<?php require_once 'templates/footer.php'; ?>
         