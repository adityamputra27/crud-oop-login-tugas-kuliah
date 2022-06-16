<?php

    require 'Connection.php';

    session_start();

    if (isset($_SESSION['nama'])) {
        header('Location: index.php');
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $username = $_POST['username'];
        $password = md5($_POST['password']);

        $database = new Connection();
        $results = $database->validateLogin($username, $password);

        if ($results->num_rows > 0) {
            $user = $results->fetch_assoc();

            $_SESSION['nama'] = $user['nama'];
            $_SESSION['username'] = $user['username'];

            header('Location: index.php');

        } else {
            header('Location: login.php');
        }
    } else {
        session_destroy();
        header('Location: index.php');
    }

?>