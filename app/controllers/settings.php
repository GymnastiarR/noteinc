<?php

class Settings extends Controller
{
    public function __construct()
    {
        session_start();
        if (!isset($_SESSION['user'])) {
            header('Location: ' . BASEURL);
        }
    }

    public function sideBar()
    {
        $data['user'] = $this->model('User')->getUserById($_SESSION['user']['id']);
        $this->view('template/sidebar', $data);
    }

    public function index()
    {
        $data['css'] = BASEURL . '/assets/css/settings/index.css';
        $data['user'] = $this->model('User')->getUserById($_SESSION['user']['id']);
        $this->view('template/header', $data);
        $this->sideBar();
        $this->view('Settings/index', $data);
        $this->view('template/footer');
    }

    public function ubahProfile()
    {
        if ($temp = $this->model('User')->getUserByEmail($_POST['email'])) {
            if ($temp['id'] != $_SESSION['user']['id']) {
                $_SESSION['invalid']['email'] = true;
                header('Location: ' . BASEURL . '/settings');
                return;
            }
        }

        if ($temp = $this->model('User')->getUser($_POST)) {
            if ($temp['id'] != $_SESSION['user']['id']) {
                $_SESSION['invalid']['username'] = true;
                header('Location: ' . BASEURL . '/settings');
                return;
            }
        }

        var_dump(($_FILES));

        // $this->model('User')->updateUser($_POST);
        // $_SESSION['user']['username'] = $_POST['username']; 
        // header('Location: '.BASEURL.'/settings');
    }

    public function uploadImg()
    {
        $str = rand();
        $result = md5($str);
        $target_dir = 'C:\\xampp\\htdocs\\note\\public\\assets\\img\\user\\';
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo(basename($_FILES["img"]["name"]), PATHINFO_EXTENSION));
        $target_file = $target_dir . $result . '.' . $imageFileType;
        // Check if image file is a actual image or fake image
        if (isset($_POST["submit"])) {
            $check = getimagesize($_FILES["img"]["tmp_name"]);
            if ($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
        }

        // Check file size
        if ($_FILES["img"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }

        // Allow certain file formats
        if (
            $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif"
        ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        } else {
            if (move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)) {
                $data['img'] = "/assets/img/user/$result.$imageFileType";
                $this->model('User')->updateImage($data);
                header('Location: ' . BASEURL . '/settings');
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    }
}
