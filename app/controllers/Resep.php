<?php

    class Resep extends Controller{
        
        public function __construct(){
            if($_SESSION[''] != ''){
                exit;
            }
        }

        public function index(){
            $data[''] = $this->model('ResepModel')->getAllResep();
            $this->view('viewlistresep');
        }

        public function viewResep(){

        }

        public function tambahResep(){
            $data[''] = $this->model('')->getAllResep();		
            $this->view('viewlistresep', $data);
        }

        public function cari(){
            $data['resep'] = $this->model('ResepModel')->cariResep();
            $data['id'] = $_POST['id'];
            $this->view('viewlistresep', $data);
        }

    }

?>
