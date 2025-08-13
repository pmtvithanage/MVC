<?php
    class Users extends Controller {
        public function __construct() {
            $this->userModel = $this->model('M_Users'); // Load the user model
        }
        public function register(){
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Process the registration form submission
                // Validate and save user data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                //input data
                $data = [
                    'name' => trim($_POST['name'] ?? ''),
                    'email' => trim($_POST['email'] ?? ''),
                    'password' =>  trim($_POST['password'] ?? ''),
                    'confirm_password' => trim($_POST['confirm_password'] ?? ''),
                    
                    'name_err' => '',
                    'email_err' => '',
                    'password_err' => '',
                    'confirm_password_err'
                ];

                    // Validate inputs  

                    //validate name
                    if(empty($data['name'])) {
                        $data['name_err'] = 'Please enter your name';
                    }

                    //validate email
                    if(empty($data['email'])) {
                        $data['email_err'] = 'Please enter your email';
                    }else {
                        // Check if email is already taken
                        if($this->userModel->findUserByEmail($data['email'])) {
                            $data['email_err'] = 'Email is already taken';
                        }
                    }

                    //validate password
                    if(empty($data['password'])) {
                        $data['password_err'] = 'Please enter a password';
                    } elseif(strlen($data['password']) < 6) {
                        $data['password_err'] = 'Password must be at least 6 characters';
                    }else {
                        // Check if confirm password matches
                        if($data['password'] !== $data['confirm_password']) {
                            $data['confirm_password_err'] = 'Passwords do not match';
                        }
                    }
                    // Validation is completed and no errors then register user
                    if(empty($data['name_err']) && empty($data['email_err']) && empty($data['password_err']) && empty($data['confirm_password_err'])) {
                        // Hash the password
                        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                        // Register user
                        if($this->userModel->register($data)) {
                            //create a flash message
                            flash('reg_flash', 'You are registered and can log in now', 'msg-flash');
                            // Redirect to login page or success page
                            redirect('users/login');
                        } else {
                            die('Something went wrong');
                        }
                    } else {
                        // Load the registration view with errors
                        $this->view('users/v_register', $data);
                    }
            }else {
                // Show the registration form
                $data = [
                    'name' => '',
                    'email' => '',
                    'password' =>  '',
                    'confirm_password' => '',
                    
                    'name_err' => '',
                    'email_err' => '',
                    'password_err' => '',
                    'confirm_password_err'
                ];
                // Load the registration view with the data
                $this->view('users/v_register', $data);
            }
        }
        public function login(){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                //form submission
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                $data = [
                    'email' => trim($_POST['email'] ?? ''),
                    'password' => trim($_POST['password'] ?? ''),
                    'email_err' => '',
                    'password_err' => ''
                ];

                //Validate email
                if(empty($data['email'])){
                    $data['email_err'] = 'Please enter email';
                }else {
                    //Check if email exists
                    if($this->userModel->findUserByEmail($data['email'])){
                        //User found
                    }else {
                        $data['email_err'] = 'No user found';
                    }
                }

                //Validate password
                if(empty($data['password'])){
                    $data['password_err'] = 'Please enter password';
                }
                //Check if no errors log in the user
                if(empty($data['email_err']) && empty($data['password_err'])) {
                    $loggedInUser = $this->userModel->login($data['email'], $data['password']);

                    if($loggedInUser){
                        //Redirect to home page or dashboard
                        $this->createUserSession($loggedInUser);
                        
                    } else {
                        $data['password_err'] = 'Password incorrect';

                        // Load the login view with errors
                        $this->view('users/v_login', $data);
                    }
                }else {
                    // Load the login view with errors
                    $this->view('users/v_login', $data);
                }

                

            }else {
                //Initially show the login form
                $data = [
                    'email' => '',
                    'password' => '',
                    'email_err' => '',
                    'password_err' => ''
                ];
                // Load the login view with the data
                $this->view('users/v_login', $data);
                
            }
        }  

        public function createUserSession($user){
            $_SESSION['user_id'] = $user->id;
            $_SESSION['user_email'] = $user->email;
            $_SESSION['user_name'] = $user->name;

            redirect('pages/index');
        }

        public function logout(){
            unset($_SESSION['user_id']);
            unset($_SESSION['user_email']);
            unset($_SESSION['user_name']);
            session_destroy();
            redirect('users/login');
        }

        public function isLoggedIn(){
            if(isset($_SESSION['user_id'])){
                return true;
            }else {
                return false;
            }
        }
    }
?>