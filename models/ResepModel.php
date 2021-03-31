<?php

    class ResepModel{
        private $id;
        private $username;
        private $namaResep;
        private $kategori;
        private $bahan;
        private $tutorial;
        private $tgl;
        private $berbayar;
    
        public function __construct(){
            $this->db = new Database;
        }

        public function getAllResep(){
            $this->db->query("SELECT * FROM " . $this->table);
		    return $this->db->resultSet();
        }

        public function tambahResep($data){
            $query = "INSERT INTO resep (username, namaresep, bahan, tutorial, tgl, berbayar) VALUES(:namaresep, :bahan, :tutorial, :tgl, :berbayar)";
            $this->db->query($query);
            $this->db->bind('username', $data['username']);
            $this->db->bind('namaresep', $data['namaresep']);
            $this->db->bind('bahan', $data['bahan']);
            $this->db->bind('tutorial', $data['tutorial']);
            $this->db->bind('tgl', $data['tgl']);
            $this->db->bind('berbayar', $data['berbayar']);

            return $this->db->rowCount();
        }

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
        
        public function deleteResep($id){
            $this->db->query('DELETE FROM ' . $this->table . ' WHERE id=:id');
		    $this->db->bind('id',$id);
		    $this->db->execute();

		    return $this->db->rowCount();
        }

        public function cariResep(){
            $key = $_POST['key'];
		    $this->db->query("SELECT * FROM " . $this->table . " WHERE namaresep LIKE :key");
		    $this->db->bind('key',"%$key%");
		    return $this->db->resultSet();
        }
    }

    

?>
