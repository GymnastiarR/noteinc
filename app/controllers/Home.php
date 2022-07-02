<?php

class Home extends Controller{
    public function __construct()
    {
        session_start();
        if(isset($_SESSION['user'])){
            header('Location: '.BASEURL.'/summary/');
            exit;
        }
    }
    public function index(){
        $data['judul'] = 'Home';
        $data['css'] = BASEURL.'/assets/css/home/index.css';
        $this->view('Home/template/header', $data);
        $this->view('Home/index');
        $this->view('Home/template/footer');
    }

    public function login(){
        $data['judul'] = 'Login';
        $data['css'] = BASEURL.'/assets/css/home/login.css';
        $this->view('Home/template/header', $data);
        $this->view('Home/login');
        $this->view('Home/template/footer');
    }

    public function register(){
        $data['judul'] = 'Register';
        $data['css'] = BASEURL . '/assets/css/home/register.css';
        $this->view('Home/template/header', $data);
        $this->view('Home/register');
        $this->view('Home/template/footer');
    }

    public function setAkun(){
        if($this->model('User')->setAkun($_POST) > 0){
            header('Location: '.BASEURL.'/home/login');
            exit;
        }
        $_SESSION['temp'] = $_POST;
        header('Location: '.BASEURL.'/home/');
        exit;
    }

    public function loginValidate(){
        if($data = $this->model('User')->getUser($_POST)){
            if(password_verify($_POST['password'], $data['password'])){
                session_start();
                $_SESSION['user'] = $data;
                header('Location: '.BASEURL.'/summary');
                exit;
            }
        }
        
        header('Location: '.BASEURL.'/home/login');
        exit;
    }
}