<?php

class Admin extends Controller{
    
    public function __construct(){
        parent::__construct();
        $this->view->dlang = $this->dlang;
    }

    public function index(){
        if($this->checkUSession() == false){  // if not logged in
            $this->redirect(ADMIN_PATH . '/login');
        }else{
            $this->view->view("admin/admin_index");
        }
    }


    public function newChan(){
        if($this->checkUSession() == false){  // if not logged in
            $this->redirect(ADMIN_PATH . '/login');
        }else{
            if(isset($_POST['chan_name']) &&
               isset($_POST['chan_lang']) &&
               isset($_POST['chan_logo'])){

                // new channel
                $nc = [
                    "chan_name" => $this->protect($_POST['chan_name']),
                    "chan_lang" => $this->protect($_POST['chan_lang']),
                    "chan_logo" => $this->protect($_POST['chan_logo']),
                ];

                $create_new_channel = $this->model->newChan($nc);
                if($create_new_channel === true){
                    $msg = "Channel createed";
                }else{
                    $msg = "Channel Not created , 62432";
                }
                
                $this->view->chanMsg = $msg;
                echo $msg;
            }
            
            $this->view->view("admin/new-chan");
        }
    }


    public function login(){
        if($this->checkUSession() == true){  // if logged in
            $this->redirect(ADMIN_PATH);
        }else{
            if(isset($_POST['username']) && isset($_POST['password'])){

                $username = $this->protect($_POST['username']);
                $password = sha1($_POST['password']);
                
                $user = $this->model->login($username, $password);
                if($user !== false){
                    $user = $user[0];
                    $_SESSION['username'] = $user->u_name;
                    $_SESSION['password'] = $user->u_pass;
                    $this->redirect(ADMIN_PATH);
                }else{
                    $msg = "invalid login";
                    $this->view->errMsg = $msg;
                    echo $msg;
                }
            }
            $this->view->view("admin/login");
        }
    }


    public function logout(){
        session_destroy();
        $this->redirect(ADMIN_PATH);
    }
}
?>