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

}