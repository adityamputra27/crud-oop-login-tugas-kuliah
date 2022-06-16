<?php 

    require 'Connection.php';
    require_once 'templates/header.php'; 

?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Data Mahasiswa</h1>
        <a href="form.php" class="btn btn-primary">+ Tambah Data</a>
    </div>

    <?php
        $database = new Connection();
        $mahasiswa = $database->selectData('mahasiswa', 'nama ASC');
    ?>

    <table class="table table-bordered table-striped table-hovered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>NIM</th>
                <th>Prodi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
                if ($mahasiswa->num_rows > 0) {
                    foreach ($mahasiswa as $key => $value) {
                        printf(
                            "<tr>
                                <td>%s</td>
                                <td>%s</td>
                                <td>%s</td>
                                <td>%s</td>
                                <td>
                                    <div class='btn-group'>
                                        <a class='btn btn-warning' href='form.php?id=%d'>Edit</a>
                                        <a class='btn btn-danger' href='process.php?id=%d'>Hapus</a>
                                    </div>
                                </td>
                            </tr>"
                        ,
                        htmlspecialchars($key+1, ENT_QUOTES),
                        htmlspecialchars($value['nama'], ENT_QUOTES),
                        htmlspecialchars($value['nim'], ENT_QUOTES),
                        htmlspecialchars($value['prodi'], ENT_QUOTES),
                        htmlspecialchars($value['id'], ENT_QUOTES),
                        htmlspecialchars($value['id'], ENT_QUOTES),
                        );
                    }
                } else {
            ?>
                <tr>
                    <td colspan='5' class='text-center'>
                        Tidak ada data!
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

</main>

<?php require_once 'templates/footer.php'; ?>
         