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



    // create new channel
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


    // new commentor
    public function newComm(){
        if($this->checkUSession() == false){  // if not logged in
            $this->redirect(ADMIN_PATH . '/login');
        }else{

            $this->view->channels = $this->model->getChannels();
            // echo var_dump($this->view->channels);
            if(isset($_POST['comm_name']) &&
               isset($_POST['comm_country']) &&
               isset($_POST['comm_chan'])){

                // new channel
                $ncomm = [
                    "comm_name" => $this->protect($_POST['comm_name']),
                    "comm_country" => $this->protect($_POST['comm_country']),
                    "comm_chan" => intval($this->protect($_POST['comm_chan'])),
                ];

                $create_new_commentor = $this->model->newComm($ncomm);
                if($create_new_commentor === true){
                    $msg = "Commentor createed";
                }else{
                    $msg = "Commentor Not created , 6243251";
                }
                
                $this->view->commMsg = $msg;
                echo $msg;
            }
            
            $this->view->view("admin/new-comm");
        }
    }

    // new NFT
    public function newNFT(){
        if($this->checkUSession() == false){  // if not logged in
            $this->redirect(ADMIN_PATH . '/login');
        }else{

            // echo var_dump($this->view->channels);
            if(isset($_POST['nft_name']) &&
               isset($_POST['nft_logo']) &&
               isset($_POST['nft_num'])){

                // new channel
                $n_nft = [
                    "nft_name" => $this->protect($_POST['nft_name']),
                    "nft_num" => intval($this->protect($_POST['nft_num'])),
                    "nft_logo" => $this->protect($_POST['nft_logo']),
                ];

                $create_new_nft = $this->model->newNFT($n_nft);
                if($create_new_nft === true){
                    $msg = "NFT createed";
                }else{
                    $msg = "NFT Not created , 53364";
                }
                
                $this->view->commMsg = $msg;
                echo $msg;
            }
            
            $this->view->view("admin/new-nft");
        }
    }

    // new CLUB
    public function newClub(){
        if($this->checkUSession() == false){  // if not logged in
            $this->redirect(ADMIN_PATH . '/login');
        }else{

            // echo var_dump($this->view->channels);
            if(isset($_POST['cl_name']) &&
               isset($_POST['cl_logo']) &&
               isset($_POST['cl_country'])){

                // new channel
                $n_club = [
                    "cl_name" => $this->protect($_POST['cl_name']),
                    "cl_country" => $this->protect($_POST['cl_country']),
                    "cl_logo" => $this->protect($_POST['cl_logo']),
                ];

                $create_new_club = $this->model->newClub($n_club);
                if($create_new_club === true){
                    $msg = "CLUB createed";
                }else{
                    $msg = "CLUB Not created , 763364";
                }
                
                $this->view->commMsg = $msg;
                echo $msg;
            }
            
            $this->view->view("admin/new-club");
        }
    }
    
    // login
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


    // logout
    public function logout(){
        session_destroy();
        $this->redirect(ADMIN_PATH);
    }
}
?>