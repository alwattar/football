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
            if(isset($_POST['comm_name']) &&
               isset($_POST['comm_country']) &&
               isset($_POST['comm_chan'])){

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

            if(isset($_POST['nft_name']) &&
               isset($_POST['nft_logo']) &&
               isset($_POST['nft_num'])){

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

            if(isset($_POST['cl_name']) &&
               isset($_POST['cl_logo']) &&
               isset($_POST['cl_country'])){

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

    // new champ
    public function newChamp(){
        if($this->checkUSession() == false){  // if not logged in
            $this->redirect(ADMIN_PATH . '/login');
        }else{

            if(isset($_POST['champ_name']) &&
               isset($_POST['champ_logo']) &&
               isset($_POST['champ_date']) &&
               isset($_POST['champ_h']) &&
               isset($_POST['champ_m']) &&
               isset($_POST['champ_loc'])){

                $h = $this->protect($_POST['champ_h']);
                $m = $this->protect($_POST['champ_m']);
                $d = $this->protect($_POST['champ_date']);
                $d = explode('/', $d);
                
                $champ_date = $d[2] . '-' . $d[0] . '-' . $d[1] . " $h:$m:00";
                
                
                $n_champ = [
                    "champ_name" => $this->protect($_POST['champ_name']),
                    "champ_date" => $champ_date,
                    "champ_loc" => $this->protect($_POST['champ_loc']),
                    "champ_logo" => $this->protect($_POST['champ_logo']),
                ];

                $create_new_champ = $this->model->newChamp($n_champ);
                if($create_new_champ === true){
                    $msg = "Champ createed";
                }else{
                    $msg = "Champ Not created , 76531173";
                }
                
                $this->view->commMsg = $msg;
                echo $msg;
            }
            
            $this->view->view("admin/new-champ");
        }
    }


    // new Match
    public function newMatch(){
        if($this->checkUSession() == false){  // if not logged in
            $this->redirect(ADMIN_PATH . '/login');
        }else{
            $this->view->channels = $this->model->getChannels();
            $this->view->commentors = $this->model->getCommentors();
            $this->view->champs = $this->model->getChamps();
            
            if(isset($_POST['mat_team1']) &&
               isset($_POST['mat_team2']) &&
               isset($_POST['mat_time']) &&
               isset($_POST['mat_h']) &&
               isset($_POST['mat_m']) &&
               isset($_POST['mat_chan']) &&
               isset($_POST['mat_comm']) &&
               isset($_POST['mat_address']) &&
               isset($_POST['mat_note']) &&
               isset($_POST['mat_status']) &&
               isset($_POST['mat_lang']) &&
               isset($_POST['mat_champ'])){

                $h = $this->protect($_POST['mat_h']);
                $m = $this->protect($_POST['mat_m']);
                $d = $this->protect($_POST['mat_time']);
                $d = explode('/', $d);
                
                $mat_time = $d[2] . '-' . $d[0] . '-' . $d[1] . " $h:$m:00";
                
                
                $n_mat = [
                    "mat_team1" => $this->protect($_POST['mat_team1']),
                    "mat_team2" => $this->protect($_POST['mat_team2']),
                    "mat_time" => $mat_time,
                    "mat_chan" => intval($this->protect($_POST['mat_chan'])),
                    "mat_comm" => intval($this->protect($_POST['mat_comm'])),
                    "mat_champ" => intval($this->protect($_POST['mat_champ'])),
                    "mat_status" => intval($this->protect($_POST['mat_status'])),
                    "mat_address" => $this->protect($_POST['mat_address']),
                    "mat_note" => $this->protect($_POST['mat_note']),
                    "mat_lang" => $this->protect($_POST['mat_lang']),
                ];

                $create_new_mat = $this->model->newMatch($n_mat);
                if($create_new_mat === true){
                    $msg = "Match createed";
                }else{
                    $msg = "Match Not created , 729351173";
                }
                
                $this->view->commMsg = $msg;
                echo $msg;
            }
            
            $this->view->view("admin/new-match");
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