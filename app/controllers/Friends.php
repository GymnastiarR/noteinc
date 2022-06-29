<?php 

class Friends extends Controller{

    public function __construct()
    {
        session_start();
        if(!isset($_SESSION['user'])){
            header('Location: '.BASEURL.'/home/login/');
            exit;
        }
    }

    public function sideBar(){
        $data['user'] = $this->model('User')->getUser($_SESSION['user']);
        $this->view('template/sidebar', $data);
    }

    public function index(){
        $data['friends'] = $this->model('Friend_model')->getFriend();
        $data['judul'] = 'Friends';
        $data['css'] = BASEURL.'/assets/css/summary/friends.css';
        $this->view('template/header', $data);
        $this->sideBar();
        $this->view('friends/index', $data);
        $this->view('template/footer');
    }

    public function addFriendsPage(){
        $data['send'] = $this->model('Friend_model')->send();
        $data['receive'] = $this->model('Friend_model')->receive();

        $this->view('friends/add-friends', $data);
    }

    public function addFriend($id){
        $this->model('Friend_model')->setFriend($id);
        $this->addFriendsPage();
    }

    public function friendList(){
        $data['friends'] = $this->model('Friend_model')->getFriend();
        $this->view('friends/listFriends', $data);
    }

    public function deleteFriend($id){
        $this->model('Friend_model')->deleteFriend($id);
        
        $this->friendList();
    }

}