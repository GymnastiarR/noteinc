<?php

class Friend_model{
    private $db;
    public function __construct()
    {
        $this->db = new Database();
    }

    public function getFriend(){
        $this->db->query("SELECT friends.id, first_name, last_name, sex, username, img, date FROM friends JOIN user on friends.id_teman = user.id WHERE id_user = :id");
        $this->db->bind('id', $_SESSION['user']['id']);
        return $this->db->resultSet();
    }

    public function send(){
        $this->db->query("SELECT friends_request.id, first_name, last_name, sex, username, img, date FROM friends_request JOIN user ON friends_request.id_receiver = user.id WHERE id_sender = :id");
        $this->db->bind('id', $_SESSION['user']['id']);
        return $this->db->resultSet();
    }

    public function receive(){
        $this->db->query("SELECT friends_request.id, first_name, last_name, sex, username, img, date FROM friends_request JOIN user ON friends_request.id_sender = user.id WHERE id_receiver = :id");
        $this->db->bind('id', $_SESSION['user']['id']);
        return $this->db->resultSet();
    }

    public function setFriend($id){
        $this->db->query("SELECT * FROM friends_request WHERE id = $id");
        $data = $this->db->single();

        $this->db->query("INSERT INTO friends VALUES ('', :id_user, :id_teman, now())");
        $this->db->bind('id_user', $data['id_receiver']);
        $this->db->bind('id_teman', $data['id_sender']);
        $this->db->execute();

        $this->db->query("INSERT INTO friends VALUES ('', :id_user, :id_teman, now())");
        $this->db->bind('id_user', $data['id_sender']);
        $this->db->bind('id_teman', $data['id_receiver']);
        $this->db->execute();

        $this->deleteFriendRequest($id);

        return $this->db->rowCount();
    }

    public function deleteFriendRequest($id){
        $this->db->query("DELETE FROM friends_request WHERE id = $id");
        $this->db->execute();
    }

    public function deleteFriend($id){
        $this->db->query("SELECT * FROM friends WHERE id = $id");
        $data = $this->db->single();

        $id_user = $data['id_teman'];
        $id_teman = $data['id_user'];

        $this->db->query("DELETE FROM friends WHERE id = $id");
        $this->db->execute();

        $this->db->query("DELETE FROM friends WHERE id_teman = $id_teman AND id_user = $id_user");
        $this->db->execute();
    }

}