<?php

class Note_model{
    private $db;
    public function __construct()
    {
        $this->db = new Database();
    }
    public function getAllNote($data){
        $this->db->query('SELECT * FROM note WHERE id_user = :id_user');
        $this->db->bind('id_user', $data['id']);
        return $this->db->resultSet();
    }

    public function getNote($data = []){
        $this->db->query("SELECT * FROM note WHERE id_note = :id_note");
        $this->db->bind('id_note', $data['id_note']);
        return $this->db->single();
    }
    
    public function updateNote($data = []){
        $this->db->query("UPDATE note SET title = :judul, content = :content WHERE id_note = :id_note");

        $this->db->bind('judul', $data['judul']);
        $this->db->bind('content', $data['isi']);
        $this->db->bind('id_note', $data['simpan']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function deleteNote($notes){
        foreach($notes as $note){
            $this->db->query("DELETE FROM note WHERE id_note = :id_note");
            $this->db->bind('id_note', $note);
            $this->db->execute();
        }
        return $this->db->rowCount();
    }

    public function setNote($data){

        $this->db->query("INSERT INTO note VALUES ('', :id_user, :title, :content, now(), now());");

        $this->db->bind('id_user', $_SESSION['user']['id']);
        $this->db->bind('title', $data['judul']);
        $this->db->bind('content', $data['isi']);

        $this->db->execute();
        return $this->db->rowCount();

    }

    public function getNoteRequestByIdReceiver(){
        $this->db->query("SELECT note_request.id, content, title, note_request.id_note, username FROM note_request JOIN note ON note_request.id_note = note.id_note JOIN user ON note_request.id_sender = user.id WHERE id_receiver = :id_user");
        $this->db->bind('id_user', $_SESSION['user']['id']);
        return $this->db->resultSet();
    }

    public function getNoteRequestByid($id){
        $this->db->query("SELECT * FROM note_request WHERE id = :id");
        $this->db->bind('id', $id);
        return $this->db->resultSet();
    }

    public function getNoteRequestByidSender(){
        $this->db->query("SELECT * FROM note_request JOIN note ON note_request.id_note = note.id_note JOIN user ON note_request.id_receiver = user.id WHERE id_sender = :id_user");
        $this->db->bind('id_user', $_SESSION['user']['id']);
        return $this->db->resultSet();
    }

    public function insertRequestNote($id_note, $id_friend){
        $this->db->query("INSERT INTO note_request VALUES ('', :id_note, :id_sender, :id_receiver, now())");
        $this->db->bind('id_note', $id_note);
        $this->db->bind('id_receiver', $id_friend);
        $this->db->bind('id_sender', $_SESSION['user']['id']);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function deleteRequestNoteById($id){
        $this->db->query("DELETE FROM note_request WHERE id = :id");
        $this->db->bind('id', $id);
        $this->db->execute();
    }
}