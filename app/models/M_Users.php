<?php
    class M_Users {
        private $db;

        public function __construct()
        {
            $this->db = new Database();
        }


        //register user
        public function register($data) {
            $this->db->query("INSERT INTO Users (name, email, password) VALUES (:name, :email, :password)");
            // Bind values
            $this->db->bind(':name', $data['name']);
            $this->db->bind(':email', $data['email']);
            $this->db->bind(':password', $data['password']);    

            if ($this->db->execute()) {
                return true; // User registered successfully
            } else {
                return false; // Failed to register user
            }
        }
        //find user by email
        public function findUserByEmail($email) {
            $this->db->query("SELECT * FROM Users wHERE email = :email");
            $this->db->bind(":email", $email);
            $row = $this->db->single();
            
            if ($this->db->rowCount() > 0) {
                return true; // User with this email exists
            } else {
                return false; // No user found with this email
            }
        }

    }
?>