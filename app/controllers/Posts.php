<?php
    class Posts extends Controller {
        public function __construct() {
            $this->postsModel = $this->model('M_posts'); // Load the model
        }

        public function index() {
            $data = [];
            $this->view('posts/v_index', $data);
        }

        public function create() {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $data = [
                    'title' => trim($_POST['title']),
                    'body' => trim($_POST['body']),
                    'title_err'=> '',
                    'body_err'=> ''
                ];

                // Validate title
                if (empty($data['title'])) {
                    $data['title_err'] = 'Please enter title';
                }

                // Validate body
                if (empty($data['body'])) {
                    $data['body_err'] = 'Please enter body text';
                }

                // Make sure no errors
                if (empty($data['title_err']) && empty($data['body_err'])) {
                    if($this->postsModel->create($data)) {
                        flash('post_message', 'Post Created');
                        redirect('posts/index');
                    } else {
                        die('Something went wrong');
                    }
                }
                else {
                    // Load view with errors
                    $this->view('posts/v_create', $data);
                }
                    
                
            
                
            
            
            } else {
                $data = [
                    'title' => '',
                    'body' => '',
                    'title_err'=> '',
                    'body_err'=> ''
                ];
                $this->view('posts/v_create', $data);

            }
        }
    }
?>