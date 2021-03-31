<?php
    class Review
    {
        private $id;
        private $ulasan;
        private $bintang;
        private $id_user;

        function __construct ($id = null, $ulasan, $bintang, $id_user)
        {
            $this->id = $id;
            $this->ulasas = $ulasan;
            $this->bintang = $bintang;
            $this->id_user = $id_user;
        }

        function getId()
        {
            return $this->id;
        }

        function setUlasan($new_ulasan)
        {
            $this->ulasan = $new_ulasan;
        }

        function getUlasan()
        {
            return $this->ulasan;
        }

        function setBintang($new_bintang)
        {
            $this->bintang = $new_bintang;
        }

        function getBintang()
        {
            return $this->bintang;
        }

        function setId_user($new_id_user)
        {
            $this->restaurant_id = $new_restaurant_id;
        }

        function getId_user()
        {
            return $this->id_user;
        }

        function save()
        {
            $GLOBALS['cookaja']->exec("INSERT INTO reviews (ulasan, bintang, id_user) VALUES ('{$this->getUlasan()}', '{$this->getBintang()}', {$this->getId_user()};");
            $this->id = $GLOBALS['cookaja']->lastInsertId();
        }

        static function getAll()
        {
            $returned_reviews = $GLOBALS['cookaja']->query("SELECT * FROM ulasan_resep ORDER BY id DESC;");

            $reviews = array();
            foreach($ulasan_resep as $ulasan) {
                $id = $ulasan['id'];
                $ulasan = $ulasan['ulasan'];
                $bintang = $ulasan['bintang'];
                $rating = $ulasan['rating'];
                $id_user = $ulasan['id_user'];
                $ulasan_resep = new Ulasan($id, $ulasan, $bintang, $id_user);
                array_push($ulasan_resep, $ulasan);
            }
            return $ulasan;
        }

        static function deleteAll()
        {
            $GLOBALS['DB']->exec("DELETE FROM ulasan_resep;");
        }


    }
?>