<?php

<<<<<<< HEAD
class Note_model
{
=======
class Note_model{
>>>>>>> 8cc2ec5a25b3dd018acfdede28f1fd70b909961d
    private $db;
    public function __construct()
    {
        $this->db = new Database();
    }
<<<<<<< HEAD
    public function getAllNote($data)
    {
=======
    public function getAllNote($data){
>>>>>>> 8cc2ec5a25b3dd018acfdede28f1fd70b909961d
        $this->db->query('SELECT * FROM note WHERE id_user = :id_user');
        $this->db->bind('id_user', $data['id']);
        return $this->db->resultSet();
    }

<<<<<<< HEAD
    public function getNote($data = [])
    {
=======
    public function getNote($data = []){
>>>>>>> 8cc2ec5a25b3dd018acfdede28f1fd70b909961d
        $this->db->query("SELECT * FROM note WHERE id_note = :id_note");
        $this->db->bind('id_note', $data['id_note']);
        return $this->db->single();
    }
<<<<<<< HEAD

    public function getNoteByQuery($data)
    {
        $this->db->query("SELECT * FROM note WHERE id_user = :id_user AND ( title LIKE CONCAT('%', :title_note, '%') OR content LIKE CONCAT('%', :content_note, '%'))");
        $this->db->bind('id_user', $data['id_user']);
        $this->db->bind('title_note', $data['title_note']);
        $this->db->bind('content_note', $data['content_note']);
        return $this->db->resultSet();
    }

    public function updateNote($data = [])
    {
=======
    
    public function updateNote($data = []){
>>>>>>> 8cc2ec5a25b3dd018acfdede28f1fd70b909961d
        $this->db->query("UPDATE note SET title = :judul, content = :content WHERE id_note = :id_note");

        $this->db->bind('judul', $data['judul']);
        $this->db->bind('content', $data['isi']);
        $this->db->bind('id_note', $data['simpan']);

        $this->db->execute();

        return $this->db->rowCount();
    }

<<<<<<< HEAD
    public function deleteNote($notes)
    {
        foreach ($notes as $note) {
=======
    public function deleteNote($notes){
        foreach($notes as $note){
>>>>>>> 8cc2ec5a25b3dd018acfdede28f1fd70b909961d
            $this->db->query("DELETE FROM note WHERE id_note = :id_note");
            $this->db->bind('id_note', $note);
            $this->db->execute();
        }
        return $this->db->rowCount();
    }

<<<<<<< HEAD
    public function setNote($data)
    {
=======
    public function setNote($data){
>>>>>>> 8cc2ec5a25b3dd018acfdede28f1fd70b909961d

        $this->db->query("INSERT INTO note VALUES ('', :id_user, :title, :content, now(), now());");

        $this->db->bind('id_user', $_SESSION['user']['id']);
        $this->db->bind('title', $data['judul']);
        $this->db->bind('content', $data['isi']);

        $this->db->execute();
        return $this->db->rowCount();
<<<<<<< HEAD
    }

    public function getNoteRequestByIdReceiver()
    {
=======

    }

    public function getNoteRequestByIdReceiver(){
>>>>>>> 8cc2ec5a25b3dd018acfdede28f1fd70b909961d
        $this->db->query("SELECT note_request.id, content, title, note_request.id_note, username FROM note_request JOIN note ON note_request.id_note = note.id_note JOIN user ON note_request.id_sender = user.id WHERE id_receiver = :id_user");
        $this->db->bind('id_user', $_SESSION['user']['id']);
        return $this->db->resultSet();
    }

<<<<<<< HEAD
    public function getNoteRequestByid($id)
    {
=======
    public function getNoteRequestByid($id){
>>>>>>> 8cc2ec5a25b3dd018acfdede28f1fd70b909961d
        $this->db->query("SELECT * FROM note_request WHERE id = :id");
        $this->db->bind('id', $id);
        return $this->db->resultSet();
    }

<<<<<<< HEAD
    public function getNoteRequestByidSender()
    {
=======
    public function getNoteRequestByidSender(){
>>>>>>> 8cc2ec5a25b3dd018acfdede28f1fd70b909961d
        $this->db->query("SELECT * FROM note_request JOIN note ON note_request.id_note = note.id_note JOIN user ON note_request.id_receiver = user.id WHERE id_sender = :id_user");
        $this->db->bind('id_user', $_SESSION['user']['id']);
        return $this->db->resultSet();
    }

<<<<<<< HEAD
    public function insertRequestNote($id_note, $id_friend)
    {
=======
    public function insertRequestNote($id_note, $id_friend){
>>>>>>> 8cc2ec5a25b3dd018acfdede28f1fd70b909961d
        $this->db->query("INSERT INTO note_request VALUES ('', :id_note, :id_sender, :id_receiver, now())");
        $this->db->bind('id_note', $id_note);
        $this->db->bind('id_receiver', $id_friend);
        $this->db->bind('id_sender', $_SESSION['user']['id']);
        $this->db->execute();
        return $this->db->rowCount();
    }

<<<<<<< HEAD
    public function deleteRequestNoteById($id)
    {
=======
    public function deleteRequestNoteById($id){
>>>>>>> 8cc2ec5a25b3dd018acfdede28f1fd70b909961d
        $this->db->query("DELETE FROM note_request WHERE id = :id");
        $this->db->bind('id', $id);
        $this->db->execute();
    }
<<<<<<< HEAD
}
=======
}
>>>>>>> 8cc2ec5a25b3dd018acfdede28f1fd70b909961d
