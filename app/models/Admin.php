<?php
class Admin {
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    // Login Admin
    public function login($username, $password){
        $this->db->query('SELECT * FROM admin WHERE admin_uname = :username');
        $this->db->bind(':username', $username);

        $row = $this->db->single();

        $hashed_password = $row->admin_pwd;
        if(password_verify($password, $hashed_password)){
            return $row;
        } else {
            return false;
        }
    }

    // Find admin by username
    public function findAdminByUsername($username){
        $this->db->query('SELECT * FROM admin WHERE admin_uname = :username');
        $this->db->bind(':username', $username);

        $row = $this->db->single();

        // Check row
        if($this->db->rowCount() > 0){
            return true;
        } else {
            return false;
        }
    }
}
