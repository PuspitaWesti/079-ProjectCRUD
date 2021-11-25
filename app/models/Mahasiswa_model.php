<?php

class Mahasiswa_model {
    // private $mhs = [
    //     [
    //         "nama"    => "Puspita Westi Erlitiya Ningrum",
    //         "nim"     => "20051214079",
    //         "email"   => "puspitawesti.20079@mhs.unesa.ac.id",
    //         "jurusan" => "Teknik Informatika"
    //     ],
    //     [
    //         "nama"    => "Muhammad Dino Rahman Hakim ",
    //         "nim"     => "20051214025",
    //         "email"   => "muhammad.20025@mhs.unesa.ac.id",
    //         "jurusan" => "Teknik Informatika"
    //     ],
    //     [
    //         "nama"    => "Mutmainah",
    //         "nim"     => "20051214026",
    //         "email"   => "mutmainah.20026@mhs.unesa.ac.id",
    //         "jurusan" => "Teknik Informatika"
    //     ],
    // ];
    private $table = 'mahasiswa';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }
  
    public function getAllMahasiswa()
    {
        // $this->stmt = $this->dbh->prepare('SELECT * FROM mahasiswa');
        // $this->stmt->execute();
        // return $this->stmt->fetchAll(PDO::FETCH_ASSOC);   

        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();  // isi data banyak
    }

    public function getMahasiswaById($id) 
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id', $id);
        return $this->db->single(); // isi cuman satu
    }

    public function tambahDataMahasiswa($data)
    {
        $query = " INSERT INTO mahasiswa 
                     VALUES 
                     ('', :nama, :nim, :email, :jurusan)"; // id kosong(auto increment)

        $this->db->query($query);
        $this->db->bind('nama' , $data['nama']);
        $this->db->bind('nim' , $data['nim']);
        $this->db->bind('email' , $data['email']);
        $this->db->bind('jurusan' , $data['jurusan']);

        $this->db->execute(); // eksekusi database

        return $this->db->rowCount();       
    }


    public function hapusDataMahasiswa($id)
    {
        $query = "DELETE FROM mahasiswa WHERE id=:id";
        $this->db->query($query);
        $this->db->bind('id' , $id);

        $this->db->execute();
 
        return $this->db->rowCount();
    }

}