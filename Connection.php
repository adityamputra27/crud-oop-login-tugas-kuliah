<?php

class Connection
{
    protected $dbHost;
    protected $dbUsername;
    protected $dbPassword;
    protected $dbName;
    protected $dbPort;
    protected $dbSocket;
    protected $mysqli;

    public function __construct()
    {   
        $this->dbHost = 'localhost';
        $this->dbUsername = 'root';
        $this->dbPassword = '';
        $this->dbName = 'latihan_php';
        $this->dbPort = '';
        $this->dbSocket = '';
    }

    public function dbConnect()
    {
        $this->mysqli = new mysqli($this->dbHost, $this->dbUsername, $this->dbPassword, $this->dbName);
        if ($this->mysqli->connect_error) {
            die('Connection Faield : '.$this->mysqli->connect_error);
        }
    }

    public function selectData($table, $orderBy)
    {
        $this->dbConnect();
        $query = "SELECT * FROM ".$table." ORDER BY ".$orderBy;
        $query = $this->mysqli->query($query);

        return $query;
    }

    public function selectWhereData($table, $id)
    {
        $this->dbConnect();
        $query = "SELECT * FROM ".$table." WHERE id = ".$id;

        $query = $this->mysqli->query($query);

        return $query;
    }

    public function updateData($nama, $nim, $prodi, $id)
    {
        $this->dbConnect();
        $query = sprintf("UPDATE mahasiswa SET nama = '%s', nim = '%s', prodi = '%s' WHERE id = %d",
                    $this->mysqli->real_escape_string($nama),
                    $this->mysqli->real_escape_string($nim),
                    $this->mysqli->real_escape_string($prodi),
                    $id
                );
        $query = $this->mysqli->query($query);

        if (isset($query)) {
            return 'Data Updated Successfully!';
        } else {
            return 'FAILED to execute UPDATE query!';
        }
    }

    public function insertData($nama, $nim, $prodi)
    {
        $this->dbConnect();
        $query = sprintf("INSERT INTO mahasiswa (nama, nim, prodi) VALUES ('%s', '%s', '%s')",
                    $this->mysqli->real_escape_string($nama),
                    $this->mysqli->real_escape_string($nim),
                    $this->mysqli->real_escape_string($prodi),
                );

        $query = $this->mysqli->query($query);

        if (isset($query)) {
            return 'Data Inserted Successfully';
        } else {
            return 'FAILED to execute INSERT query!';
        }
    }

    public function deleteData($table, $id)
    {
        $this->dbConnect();
        $query = "DELETE FROM ".$table." WHERE id = ".$id;

        $query = $this->mysqli->query($query);

        if (isset($query)) {
            return 'Data Deleted Successfully';
        } else {
            return 'FAILED to execute DELETE query!';
        }
    }

    public function validateLogin($username, $password)
    {
        $this->dbConnect();
        $query = sprintf("SELECT * FROM users WHERE username = '%s' AND password = '%s'",
                    $this->mysqli->real_escape_string($username),
                    $this->mysqli->real_escape_string($password),
                );

        $query = $this->mysqli->query($query);

        return $query;
    }
}


?>