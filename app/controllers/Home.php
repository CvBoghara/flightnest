<?php
class Home extends Controller {
    public function __construct(){

    }

    public function index(){
        $data = [
            'title' => 'Home'
        ];

        $this->view('user/index', $data);
    }
}
