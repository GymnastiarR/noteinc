<?php 

class Settings extends Controller{
    public function __construct()
    {
        session_start();
        if(!isset($_SESSION['user'])){
            header('Location: '.BASEURL);
        }
    }
    public function sideBar(){
        $data['user'] = $this->model('User')->getUserById($_SESSION['user']['id']);
        $this->view('template/sidebar', $data);
    }
    public function index()
    {
        $data['css'] = BASEURL . '/assets/css/settings/index.css';
        $data['user'] = $this->model('User')->getUserById($_SESSION['user']['id']);
        $this->view('template/header', $data);
        $this->sideBar();
        $this->view('Settings/index', $data);
        $this->view('template/footer');
    }

    public function ubahProfile(){
        if($temp = $this->model('User')->getUserByEmail($_POST['email'])){
            if($temp['id'] != $_SESSION['user']['id']){
                $_SESSION['invalid']['email'] = true;
                header('Location: '.BASEURL.'/settings');
                return;
            }
        }

        if($temp = $this->model('User')->getUser($_POST)){
            if($temp['id'] != $_SESSION['user']['id']){
                $_SESSION['invalid']['username'] = true;
                header('Location: '.BASEURL.'/settings');
                return;
            }
        }

        $this->model('User')->updateUser($_POST);
        header('Location: '.BASEURL.'/settings');
    }

}