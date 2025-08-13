<?php
    class Pages extends Controller {
        public function __construct() {
            // Constructor logic if needed
            $this -> pagesModel = $this->model('M_pages'); // Load the model

            
        } 
        //comment

        public function index() {
            
        }

        public function about() {
            $users = $this->pagesModel->getUsers();

            $data = [
                'users' => $users
            ];
            $this->view('v_about', $data);
        }
    }
?>