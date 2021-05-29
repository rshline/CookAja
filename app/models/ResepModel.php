<?php

/**
 * Class Description
 * Menerapkan kelas Resep berdasarkan class diagram
 * 
 * @author Rizkyta Shainy A.
 */
    class ResepModel{

        private $id;
        private $nama;
        private $namaResep;
        private $kategori;
        private $bahan;
        private $tutorial;
        private $tgl;
        private $berbayar;

        /**
         * Constructor
         * Membuat object dari class Database baru 
         */
        public function __construct(){
            $this->db = new Database;
        }

        /**
         * Mendapatkan array berisi data resep yang ada di database
         * @return $this->db->resultSet() berisi data semua resep, may be null
         */
        public function getAllResep(){
            $this->db->query("SELECT * FROM " . $this->table);
		    return $this->db->resultSet();
        }

        /**
         * Menambahkan data input ke table resep di database
         * @param data input
         * @return $this->db->rowCount() yaitu jumlah data setelah dilakukan INSERT, not null
         */
        public function tambahResep($data){
            $query = "INSERT INTO resep (nama, namaresep, bahan, tutorial, tgl, berbayar) VALUES(:namaresep, :bahan, :tutorial, :tgl, :berbayar)";
            $this->db->query($query);
            $this->db->bind('nama', $data['nama']);
            $this->db->bind('namaresep', $data['namaresep']);
            $this->db->bind('bahan', $data['bahan']);
            $this->db->bind('tutorial', $data['tutorial']);
            $this->db->bind('tgl', $data['tgl']);
            $this->db->bind('berbayar', $data['berbayar']);

            return $this->db->rowCount();
        }

        /**
         * Memperbarui data resep pada database berdasarkan input
         * @param data yang diinput
         * @return $this->db->rowCount() yaitu jumlah data setelah dilakukan UPDATE, not null
         */
        public function updateResep($data){
            $query = "UPDATE resep SET namaresep=:namaresep, bahan=:bahan, tutorial=:tutorial, tgl=:tgl, berbayar=:berbayar WHERE id=:id";
            $this->db->bind('namaresep', $data['namaresep']);
            $this->db->bind('bahan', $data['bahan']);
            $this->db->bind('tutorial', $data['tutorial']);
            $this->db->bind('tgl', $data['tgl']);
            $this->db->bind('berbayar', $data['berbayar']);
            $this->db->execute();

            return $this->db->rowCount();
        }

        /**
         * Menghapus resep dengan id tertentu dari database
         * @param id resep
         * @return $this->db->rowCount() yaitu jumlah data setelah dilakukan DELETE, not null
         */
        public function deleteResep($id){
            $this->db->query('DELETE FROM ' . $this->table . ' WHERE id=:id');
		    $this->db->bind('id',$id);
		    $this->db->execute();

		    return $this->db->rowCount();
        }
            
        /**
         * Mencari resep 
         * @return  $this->db->resultSet() data yang memiliki key sesuai, may be null
         */
        public function cariResep(){
            $key = $_POST['key'];
		    $this->db->query("SELECT * FROM " . $this->table . " WHERE namaresep LIKE :key");
		    $this->db->bind('key',"%$key%");
		    return $this->db->resultSet();
        }
    }

    

?>
