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
        $data['user'] = $this->model('User')->getUserById($_SESSION['user']['id']);
        $this->view('template/sidebar', $data);
    }

    public function index(){
        $data['friends'] = $this->model('Friend_model')->getAllFriend();
        $data['judul'] = 'Friends';
        $data['css'] = BASEURL.'/assets/css/summary/friends.css';
        $this->view('template/header', $data);
        $this->sideBar();
        $this->view('Friends/index', $data);
        $this->view('template/footer');
    }

    public function addFriendsPage(){
        $data['send'] = $this->model('Friend_model')->send();
        $data['receive'] = $this->model('Friend_model')->receive();

        $this->view('Friends/add-friends', $data);
    }

    public function friendList(){
        $data['friends'] = $this->model('Friend_model')->getAllFriend();
        $this->view('Friends/listFriends', $data);
    }

    public function deleteFriend(){
        $data = json_decode($_POST['value'], true);
        $this->model('Friend_model')->deleteFriend($data['id_teman'], $data['id_user']);
        $this->model('Friend_model')->deleteFriend($data['id_user'], $data['id_teman']);
        $this->friendList();
    }

    public function getFriend(){
        $data = $this->model('Friend_model')->getFriend($_POST['id']);
        echo(json_encode($data));
    }

    public function searchFriends(){
        $data['result'] = $this->model('Friend_model')->searchFriends($_POST['keyword']);
        $this->view('Friends/searchResult', $data);
    }

    public function addFriend($id){
        $data = $this->model('Friend_model')->getFriendRequest($id);
        $this->model('Friend_model')->setFriend($data['id_receiver'], $data['id_sender']);
        $this->model('Friend_model')->setFriend($data['id_sender'], $data['id_receiver']);
    }

    public function deleteFriendRequest($id){
        $this->model('Friend_model')->deleteFriendRequest($id);
        $this->addFriendsPage();
    }

    public function request($id){
        $data = $this->model('Friend_model')->request($id);
        $data['send'] = $this->model('Friend_model')->send();
        $data['receive'] = $this->model('Friend_model')->receive();
        $this->view('Friends/add-friends', $data);
    }

}