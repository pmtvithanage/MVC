<?php
    class Posts {
        public function __construct() {
            // Constructor logic if needed
            $this->postsModel = $this->model('M_posts'); // Load the model
        }
    }
?>