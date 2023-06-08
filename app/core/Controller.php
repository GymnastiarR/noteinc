<?php

class Controller{
    public function view($direct, $data = []){
        require_once '../app/views/'. $direct .'.php';
    }

    public function model($direct){
        require_once '../app/models/' .$direct.'.php';

        return new $direct;
    }
}