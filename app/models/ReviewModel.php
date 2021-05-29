<?php
    class Ulasan
    {
        private $id;
        private $ulasan;
        private $bintang;
        private $id_user;

        private $table = 'ulasan_resep';
        private $db;

        function __construct ()
        {
            $this->db = Database::getInstance();
        }


        function getAllUlasan()
        {
            $this->db->query("SELECT * FROM " . $this->table);
		    return $this->db->resultSet();
        }

        public function tambahUlasan($data){
            $query = "INSERT INTO ulasan_resep VALUES(:ulasan, :bintang, :id_user)";
            $this->db->query($query);
            $this->db->bind('ulasan', $data['ulasan']);
            $this->db->bind('bintang', $data['bintang']);
            $this->db->bind('id_user', $data['id_user']);

            return $this->db->rowCount();
        }


    }