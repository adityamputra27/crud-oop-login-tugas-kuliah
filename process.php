<?php
    // print_r($_POST);
    require 'Connection.php';
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
        $id = $_POST['id'];
        $type = $_POST['type'];
        $nama = $_POST['nama'];
        $nim = $_POST['nim'];
        $prodi = $_POST['prodi'];
        
        if ($type == 'insert') {
            $database = new Connection();
            $database->insertData($nama, $nim, $prodi);
        } else {
            $database = new Connection();
            $database->updateData($nama, $nim, $prodi, $id);
        }

        header('Location: mahasiswa.php');

    } else if (isset($_GET['id']) && ctype_digit($_GET['id'])) {
        
        $id = $_GET['id'];
        $database = new Connection();
        $database->deleteData('mahasiswa', $id);
        header('Location: mahasiswa.php');

    } else {
        header('Location: mahasiswa.php');
    }
?>