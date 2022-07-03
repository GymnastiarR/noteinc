<?php 

class ShareNote extends Controller{
    public function __construct()
        {
        session_start();
        if(!isset($_SESSION['user'])){
            
        }
    }

    public function sideBar(){
        $data['user'] = $this->model('User')->getUser($_SESSION['user']);
        $this->view('template/sidebar', $data);
    }

    public function index(){
        // $data['user'] = $this->model('User')->getUser($_SESSION['user']);
        $data['css'] = BASEURL.'/assets/css/share-note/index.css';
        $data['notes'] = $this->model('Note_model')->getNoteRequestByIdReceiver();

        $this->view('template/header', $data);
        $this->sideBar();
        $this->view('ShareNote/index', $data);
        $this->view('template/footer');
    }

    public function send(){
        $data['friends'] = $this->model('Friend_model')->getAllFriend();
        $data['notes'] = $this->model('Note_model')->getNoteRequestByidSender();
        $this->view('ShareNote/send-note', $data);
    }

    public function listNote(){
        $id = json_decode($_POST['id']);
        $data['friends'] = [];
        foreach($id as $e){
            $temp = ($this->model('Friend_model')->getFriend($e));
            $data['friends'][] = $this->model('User')->getUserById($temp['id_teman']);
        }
        $data['notes'] = $this->model('Note_model')->getAllNote($_SESSION['user']);
        $this->view('shareNote/listNote', $data);
    }

    public function sendNote(){

        foreach(json_decode($_POST['notes']) as $id_note){
            foreach(json_decode($_POST['friends']) as $id_friend){
                $this->model('Note_model')->insertRequestNote($id_note, $id_friend);
            }
        }
        $this->send();
    }

    public function pendingNote(){
        $data['notes'] = $this->model('Note_model')->getNoteRequestByIdReceiver();
        $this->view('ShareNote/pendingNote', $data);
    }

    public function saveNote(){
        $temp = $this->model('Note_model')->getNote($_POST);
        $data['judul'] = $temp['title'];
        $data['isi'] = $temp['content'];
        $this->model('Note_model')->setNote($data);
        $this->model('Note_model')->deleteRequestNoteById($_POST['id']);
        $this->pendingNote();
    }

}