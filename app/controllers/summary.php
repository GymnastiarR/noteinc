<?php

class Summary extends Controller
{

    private $conn;

    public function __construct()
    {
        session_start();
        if (!isset($_SESSION['user'])) {
            header('Location: ' . BASEURL . '/home/login/');
            exit;
        }
    }

    public function sideBar()
    {
        $data['user'] = $this->model('User')->getUserById($_SESSION['user']['id']);
        $this->view('template/sidebar', $data);
    }

    public function index()
    {
        $data['notes'] = $this->model('Note_model')->getAllNote($_SESSION['user']);
        $this->conn = $this->model('List_model');
        $data['lists'] = $this->conn->getAllList();
        $data['items'] = $this->conn->getAllItem();

        $data['judul'] = 'Summary';
        $data['css'] = BASEURL . '/assets/css/summary/index.css';

        $this->view('template/header', $data);
        $this->sideBar();
        $this->view('Summary/index', $data);
        $this->view('template/footer');
    }

    public function edit($id)
    {
        $args['id_note'] = $id;
        $args['id_user'] = $_SESSION['user']['id'];
        $data = $this->model('Note_model')->getNote($args);
        if ($data['id_user'] == $args['id_user']) {
            $data['css'] = BASEURL . '/assets/css/summary/edit.css';

            $this->view('template/header', $data);
            $this->sideBar();
            $this->view('Summary/edit', $data);
            $this->view('template/footer');
        } else {
            $_SESSION['invalid']['note'] = true;
            $this->index();
        }
    }

    public function save()
    {
        $this->model('Note_model')->updateNote($_POST);
        $this->edit($_POST['simpan']);
    }

    public function deleteNote()
    {
        if ($_POST == null) {
            header("Location: " . BASEURL . "/summary/");
            exit;
        }
        if ($this->model('Note_model')->deleteNote($_POST) > 0) {
            header("Location: " . BASEURL . "/summary/");
        }
    }

    public function newNote()
    {
        $this->model('Note_model')->setNote($_POST);
        header("Location: " . BASEURL . "/summary/");
        exit;
    }

    public function searchNote($arg = null)
    {
        $data['notes'] = $this->model('Note_model')->getAllNote($_SESSION['user']);
        if ($arg != null) {
            $query['id_user'] = $_SESSION['user']['id'];
            $query['content_note'] = $arg;
            $query['title_note'] = $arg;

            $data['notes'] = $this->model('Note_model')->getNoteByQuery($query);
        }

        $this->view('Summary/notes', $data);
    }

    public function checklist($id, $value)
    {
        $this->model('List_model')->checkItem($id, $value);
        $this->renderList();
    }

    public function updateItem()
    {
        $id = $_POST['id'];
        $value = $_POST['isi'];

        $this->model('List_model')->updateItem($id, $value);
        $this->renderList();
    }

    public function deleteList($id)
    {
        if ($this->model('List_model')->deleteList($id) > 0) {
            $this->renderList();
        } else {
            $this->index();
        }
    }

    public function newList()
    {
        $this->model('List_model')->newList($_POST);
        $this->renderList();
    }

    public function newItem()
    {
        $idList = $_POST['id_list'];
        $judul = $_POST['content'];
        $this->model('List_model')->setItem($idList, $judul);
        $this->renderList();
    }

    public function deleteItem()
    {
        $idItem = $_POST['id_item'];
        $this->model('List_model')->deleteItem($idItem);
        $this->renderList();
    }

    public function renderList()
    {
        $data['lists'] = $this->model('List_model')->getAllList();
        $data['items'] = $this->model('List_model')->getAllItem();

        $this->view('Summary/lists', $data);
    }

    public function exit()
    {
        unset($_SESSION['user']);
        header('Location: ' . BASEURL);
        exit;
    }
}
