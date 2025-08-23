<?php
class User extends Controller {
    public function __construct(){
        $this->userModel = $this->model('User');
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
            if($this->userModel->findUserByUsername($data['username'])){
                // User found
            } else {
                // User not found
                $data['username_err'] = 'No user found';
            }

            // Make sure errors are empty
            if(empty($data['username_err']) && empty($data['password_err'])){
                // Validated
                // Check and set logged in user
                $loggedInUser = $this->userModel->login($data['username'], $data['password']);

                if($loggedInUser){
                    // Create Session
                    $this->createUserSession($loggedInUser);
                } else {
                    $data['password_err'] = 'Password incorrect';

                    $this->view('user/login', $data);
                }
            } else {
                // Load view with errors
                $this->view('user/login', $data);
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
            $this->view('user/login', $data);
        }
    }

    public function createUserSession($user){
        $_SESSION['user_id'] = $user->user_id;
        $_SESSION['user_username'] = $user->username;
        redirect('pages/index');
    }

    public function logout(){
        unset($_SESSION['user_id']);
        unset($_SESSION['user_username']);
        session_destroy();
        redirect('user/login');
    }
}
