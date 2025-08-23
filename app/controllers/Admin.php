<?php
class Admin extends Controller {
    public function __construct(){
        $this->adminModel = $this->model('Admin');
    }

    public function login(){
        // Check for POST
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            // Process form
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'username' => trim($_POST['username']),
                'password' => trim($_POST['password']),
                'username_err' => '',
                'password_err' => '',
            ];

            // Validate username
            if(empty($data['username'])){
                $data['username_err'] = 'Please enter username';
            }

            // Validate password
            if(empty($data['password'])){
                $data['password_err'] = 'Please enter password';
            }

            // Check for user/username
            if($this->adminModel->findAdminByUsername($data['username'])){
                // User found
            } else {
                // User not found
                $data['username_err'] = 'No user found';
            }

            // Make sure errors are empty
            if(empty($data['username_err']) && empty($data['password_err'])){
                // Validated
                // Check and set logged in user
                $loggedInAdmin = $this->adminModel->login($data['username'], $data['password']);

                if($loggedInAdmin){
                    // Create Session
                    $this->createAdminSession($loggedInAdmin);
                } else {
                    $data['password_err'] = 'Password incorrect';

                    $this->view('admin/login', $data);
                }
            } else {
                // Load view with errors
                $this->view('admin/login', $data);
            }

        } else {
            // Init data
            $data = [
                'username' => '',
                'password' => '',
                'username_err' => '',
                'password_err' => '',
            ];

            // Load view
            $this->view('admin/login', $data);
        }
    }

    public function createAdminSession($admin){
        $_SESSION['admin_id'] = $admin->admin_id;
        $_SESSION['admin_username'] = $admin->admin_uname;
        redirect('admin/index');
    }

    public function logout(){
        unset($_SESSION['admin_id']);
        unset($_SESSION['admin_username']);
        session_destroy();
        redirect('admin/login');
    }

    public function index(){
        $this->view('admin/index');
    }
}
