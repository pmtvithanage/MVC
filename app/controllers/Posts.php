<?php
    class Posts extends Controller {
        public function __construct() {
            
        }

        public function create() {
            $data = [];
            $this->view('posts/v_create', $data);
        }
    }
?>