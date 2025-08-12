<?php
    class M_pages {
        private $db;

        public function __construct()
        {
            $this->db = new Database();
        }

        public function getUsers() {
            $this->db->query("SELECT * FROM Users");
            return $this->db->resultSet();
        }
    }
?>