<?php

class List_model{
    private $db;
    public function __construct()
    {
        $this->db = new Database();
    }
    
    public function getAllList(){
        $this->db->query("SELECT * FROM list WHERE id_user = :id_user");
        $this->db->bind('id_user', $_SESSION['user']['id']);
        return $this->db->resultSet();
    }

    public function getAllItem(){
        $this->db->query("SELECT * FROM item WHERE id_user = :id_user");
        $this->db->bind('id_user', $_SESSION['user']['id']);
        return $this->db->resultSet();
    }

    public function checkItem($id, $value){

        if($value == 'y'){
            $value = 'n';
        }

        else{
            $value = 'y';
        }

        $this->db->query("UPDATE item SET info = :info WHERE id_item = :id_item");
        $this->db->bind('info', $value);
        $this->db->bind('id_item', $id);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function updateItem($id, $value){

        $this->db->query("UPDATE item SET content = :content WHERE id_item = :id_item");
        $this->db->bind('content', $value);
        $this->db->bind('id_item', $id);
        
        $this->db->execute();
        return $this->db->rowCount();

    }

    public function deleteList($id){
        $this->db->query("DELETE FROM list WHERE id_list = :id_list AND id_user = :id_user");
        $this->db->bind('id_list', $id);
        $this->db->bind('id_user', $_SESSION['user']['id']);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function newList($value){
        $this->db->query("INSERT INTO list VALUES ('', :id_user, :judul_list)");
        $this->db->bind('id_user', $_SESSION['user']['id']);
        $this->db->bind('judul_list', $value['content']);
        $this->db->execute();
    }

    public function setItem($id, $judul){
        $this->db->query("INSERT INTO item VALUES ('', :id_list, :id_user, :content, 'n')");
        $this->db->bind('id_list', $id);
        $this->db->bind('id_user', $_SESSION['user']['id']);
        $this->db->bind('content', $judul);
        $this->db->execute();
    }

    public function deleteItem($id){
        $this->db->query("DELETE FROM item WHERE id_item = :id_item");
        $this->db->bind('id_item', $id);
        $this->db->execute();
        $this->db->rowCount();
    }


}