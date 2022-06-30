<?php 

class ShareNote extends Controller{
    public function __construct()
        {
        session_start();
        if(!isset($_SESSION['user'])){
            
        }
    }

    public function index(){
        $data['user'] = $this->model('User')->getUser($_SESSION['user']);
        $data['css'] = BASEURL.'/css/share-note/index.css';
        $this->view('template/header', $data);
        $this->view('template/sidebar', $data);
        $this->view('ShareNote/index');
        $this->view('template/footer');
    }

    public function receive(){

    }

}