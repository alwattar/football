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
            $this->view->channels = $this->model->getChannels();

            if(isset($_GET['del'])){
                $channel_id = intval($_GET['del']);
                $del_channel = $this->model->delChannel($channel_id);
                if($del_channel != false){
                    $msg = "Channel Deleted";
                    echo "<script>setTimeout(function(){window.location.href = '". ADMIN_PATH . "/new-chan'},1200)</script>";
                }else{
                    $msg = "Channel Not Deleted , err665";
                }
                
                $this->view->chanMsg = $msg;
                echo $msg;
            }
            if(isset($_POST['chan_edit']) && $_POST['chan_edit'] == 'chan_edit'){
                if(isset($_POST['chan_name']) &&
                   isset($_POST['chan_id']) &&
                   isset($_POST['chan_lang']) &&
                   isset($_POST['chan_logo'])){

                    $e_channel = [
                        "chan_id" => intval($this->protect($_POST['chan_id'])),
                        "chan_name" => $this->protect($_POST['chan_name']),
                        "chan_lang" => $this->protect($_POST['chan_lang']),
                        "chan_logo" => $this->protect($_POST['chan_logo']),
                    ];

                    $edit_channel = $this->model->editChannel($e_channel);

                    if($edit_channel != false){
                        $msg = "Channel Updated";
                        echo "<script>setTimeout(function(){window.location.href = ''},1200)</script>";
                    }else{
                        $msg = "Channel Not Updated , err262432";
                    }
                
                    $this->view->chanMsg = $msg;
                    echo $msg;
                }
            }
            
            if(isset($_POST['chan_name']) &&
               isset($_POST['chan_lang']) &&
               !isset($_POST['chan_edit']) &&
               isset($_POST['chan_logo'])){

                $nc = [
                    "chan_name" => $this->protect($_POST['chan_name']),
                    "chan_lang" => $this->protect($_POST['chan_lang']),
                    "chan_logo" => $this->protect($_POST['chan_logo']),
                ];

                $create_new_channel = $this->model->newChan($nc);
                if($create_new_channel === true){
                    $msg = "Channel createed";
                    echo "<script>setTimeout(function(){window.location.href = '". ADMIN_PATH . "/new-chan'},1200)</script>";
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
            $this->view->commentors = $this->model->getCommentors();
            // delete commentor
            if(isset($_GET['del'])){
                $comm_id = intval($_GET['del']);
                $del_comm = $this->model->delComm($comm_id);
                if($del_comm != false){
                    $msg = "Commentor Deleted";
                    echo "<script>setTimeout(function(){window.location.href = '". ADMIN_PATH . "/new-commentor'},1200)</script>";
                }else{
                    $msg = "Commentor Not Deleted , err62465";
                }
                
                $this->view->chanMsg = $msg;
                echo $msg;
            }
            // edit commentor
            if(isset($_POST['comm_edit']) && $_POST['comm_edit'] == 'comm_edit'){
                if(isset($_POST['comm_name']) &&
                   isset($_POST['comm_country']) &&
                   isset($_POST['comm_chan'])){
                
                    $ecomm = [
                        "comm_name" => $this->protect($_POST['comm_name']),
                        "comm_country" => $this->protect($_POST['comm_country']),
                        "comm_id" => intval($this->protect($_POST['comm_id'])),
                        "comm_chan" => intval($this->protect($_POST['comm_chan'])),
                    ];
                    
                    $edit_comm = $this->model->editComm($ecomm);
                    // echo var_dump($edit_comm);
                    if($edit_comm != false){
                        $msg = "Commentor Updated";
                        echo "<script>setTimeout(function(){window.location.href = ''},1200)</script>";
                    }else{
                        $msg = "commentor Not Updated , Eroro26342";
                    }

                    echo $msg;
                    
                }
            }
            // new commentor
            if(isset($_POST['comm_name']) &&
               !isset($_POST['comm_edit']) &&
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
                    echo "<script>setTimeout(function(){window.location.href = '". ADMIN_PATH . "/new-commentor'},1200)</script>";
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
            $this->view->nfts = $this->model->getNFTS();
            if(isset($_GET['do'])){

                if(isset($_GET['id'])){
                    $id = intval($_GET['id']);
                    if($_GET['do'] == 'delete'){
                        $this->delNFT($id);
                    }else if($_GET['do'] == 'edit'){
                        $this->editNFT($id);
                    }
                }else{
                    $this->redirect(ADMIN_PATH . '/new-nft');
                }
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
                        echo "<script>setTimeout(function(){window.location.href = '". ADMIN_PATH . "/new-nft'},1200)</script>";
                    }else{
                        $msg = "NFT Not created , 53364";
                    }
                
                    $this->view->commMsg = $msg;
                    echo $msg;
                }
            
                $this->view->view("admin/new-nft");
            }
        }
    }

    // edit nft
    public function editNFT($id){
        $nft = $this->model->getNFTById($id);
        if($nft !== false){
            if(isset($_POST['nft_name']) &&
               isset($_POST['nft_id']) &&
               isset($_POST['nft_logo']) &&
               isset($_POST['nft_num'])){

                $e_nft = [
                    "nft_name" => $this->protect($_POST['nft_name']),
                    "nft_id" => intval($this->protect($_POST['nft_id'])),
                    "nft_num" => intval($this->protect($_POST['nft_num'])),
                    "nft_logo" => $this->protect($_POST['nft_logo']),
                ];

                $edit_nft = $this->model->editNFT($e_nft);
                if($edit_nft != false){
                    $msg = "NFT UPDATED";
                    echo "<script>setTimeout(function(){window.location.href = ''},1200)</script>";
                }else{
                    $msg = "NFT Not UPDATED , trr2524";
                }

                echo $msg;
            }
            $this->view->nft = $nft[0];
            $this->view->view('admin/edit-nft');
        }
        else $this->redirect(ADMIN_PATH . '/new-nft');        
        
    }
    
    // delete nft
    public function delNFT($id){
        $del_nft = $this->model->delNFT($id);
        // echo var_dump($del_nft);
        if($del_nft != false){
            $msg = "NFT DELETED";
            echo "<script>setTimeout(function(){window.location.href = '". ADMIN_PATH . "/new-nft'},1200)</script>";
        }else{
            $msg = "NFT Not DELETED , trr25248252";
        }

        echo $msg;
    }
    
    // new CLUB
    public function newClub(){
        if($this->checkUSession() == false){  // if not logged in
            $this->redirect(ADMIN_PATH . '/login');
        }else{

            $this->view->clubs = $this->model->getClubs();
            if(isset($_GET['do'])){

                if(isset($_GET['id'])){
                    $id = intval($_GET['id']);
                    if($_GET['do'] == 'delete'){
                        $this->delClub($id);
                    }else if($_GET['do'] == 'edit'){
                        $this->editClub($id);
                    }
                }else{
                    $this->redirect(ADMIN_PATH . '/new-nft');
                }
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
                        echo "<script>setTimeout(function(){window.location.href = '". ADMIN_PATH . "/new-club'},1200)</script>";
                    }else{
                        $msg = "CLUB Not created , 763364";
                    }
                
                    $this->view->commMsg = $msg;
                    echo $msg;
                }
            
                $this->view->view("admin/new-club");
            }
        }
    }

    
    // edit club
    public function editClub($id){
        $cl = $this->model->getClubById($id);
        if($cl !== false){
            if(isset($_POST['cl_name']) &&
               isset($_POST['cl_id']) &&
               isset($_POST['cl_logo']) &&
               isset($_POST['cl_country'])){

                $e_cl = [
                    "cl_name" => $this->protect($_POST['cl_name']),
                    "cl_country" => $this->protect($_POST['cl_country']),
                    "cl_id" => intval($this->protect($_POST['cl_id'])),
                    "cl_logo" => $this->protect($_POST['cl_logo']),
                ];

                $edit_club = $this->model->editClub($e_cl);
                if($edit_club != false){
                    $msg = "CLUB UPDATED";
                    echo "<script>setTimeout(function(){window.location.href = ''},1200)</script>";
                }else{
                    $msg = "CLUB Not UPDATED , dhft27353";
                }

                echo $msg;
            }
            $this->view->cl = $cl[0];
            $this->view->view('admin/edit-club');
        }
        else $this->redirect(ADMIN_PATH . '/new-club');
        
    }
    
    // delete club
    public function delClub($id){
        $del_club = $this->model->delClub($id);
        // echo var_dump($del_club);
        if($del_club != false){
            $msg = "CLUB DELETED";
            echo "<script>setTimeout(function(){window.location.href = '". ADMIN_PATH . "/new-club'},1200)</script>";
        }else{
            $msg = "CLUB Not DELETED , errn2342524";
        }

        echo $msg;
    }


    
    // new champ
    public function newChamp(){
        if($this->checkUSession() == false){  // if not logged in
            $this->redirect(ADMIN_PATH . '/login');
        }else{

            $this->view->champs = $this->model->getChamps();
            if(isset($_GET['do'])){

                if(isset($_GET['id'])){
                    $id = intval($_GET['id']);
                    if($_GET['do'] == 'delete'){
                        $this->delChamp($id);
                    }else if($_GET['do'] == 'edit'){
                        $this->editChamp($id);
                    }
                }else{
                    $this->redirect(ADMIN_PATH . '/new-nft');
                }
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
                        echo "<script>setTimeout(function(){window.location.href = '". ADMIN_PATH . "/new-champ'},1200)</script>";
                    }else{
                        $msg = "Champ Not created , 765323";
                    }
                
                    $this->view->commMsg = $msg;
                    echo $msg;
                }
            
                $this->view->view("admin/new-champ");
            }
        }
    }

    // edit champ
    public function editChamp($id){
        $champ = $this->model->getChampById($id);
        if($champ !== false){
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

                $e_champ = [
                    "champ_id" => intval($this->protect($_POST['champ_id'])),
                    "champ_name" => $this->protect($_POST['champ_name']),
                    "champ_date" => $champ_date,
                    "champ_loc" => $this->protect($_POST['champ_loc']),
                    "champ_logo" => $this->protect($_POST['champ_logo']),
                ];

                $edit_champ = $this->model->editChamp($e_champ);
                if($edit_champ != false){
                    $msg = "CHAMP UPDATED";
                    echo "<script>setTimeout(function(){window.location.href = ''},1200)</script>";
                }else{
                    $msg = "CHAMP Not UPDATED , 2724bh225";
                }

                echo $msg;
            }
            $this->view->champ = $champ[0];
            $this->view->view('admin/edit-champ');
        }
        else $this->redirect(ADMIN_PATH . '/new-champ');
        
    }
    
    // delete champ
    public function delChamp($id){
        $del_champ = $this->model->delChamp($id);
        // echo var_dump($del_champ);
        if($del_champ != false){
            $msg = "CHAMP DELETED";
            echo "<script>setTimeout(function(){window.location.href = '". ADMIN_PATH . "/new-champ'},1200)</script>";
        }else{
            $msg = "CHAMP Not DELETED , errn23435324";
        }

        echo $msg;
    }
    
    // new Match
    public function newMatch(){
        if($this->checkUSession() == false){  // if not logged in
            $this->redirect(ADMIN_PATH . '/login');
        }else{
            $this->view->channels = $this->model->getChannels();
            $this->view->commentors = $this->model->getCommentors();
            $this->view->champs = $this->model->getChamps();
            $this->view->matches = $this->model->getMatches();
            
            if(isset($_GET['do'])){
                
                if(isset($_GET['id'])){
                    $id = intval($_GET['id']);
                    if($_GET['do'] == 'delete'){
                        $this->delMatch($id);
                    }else if($_GET['do'] == 'edit'){
                        $this->editMatch($id);
                    }
                }else{
                    $this->redirect(ADMIN_PATH . '/new-nft');
                }
            }else{
                if(isset($_POST['mat_name']) &&
                   isset($_POST['mat_team2']) &&
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
                        "mat_name" => $this->protect($_POST['mat_name']),
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
                        echo "<script>setTimeout(function(){window.location.href = '". ADMIN_PATH . "/new-match'},1200)</script>";
                    }else{
                        $msg = "Match Not created , 729351173";
                    }
                
                    $this->view->commMsg = $msg;
                    echo $msg;
                }
            
                $this->view->view("admin/new-match");
            }
        }
    }

    // edit match
    public function editMatch($id){
        $mat = $this->model->getMatchById($id);
        if($mat !== false){
            if(isset($_POST['mat_name']) &&
               isset($_POST['mat_team2']) &&
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
                
                
                $e_mat = [
                    "mat_name" => $this->protect($_POST['mat_name']),
                    "mat_team1" => $this->protect($_POST['mat_team1']),
                    "mat_team2" => $this->protect($_POST['mat_team2']),
                    "mat_time" => $mat_time,
                    "mat_chan" => intval($this->protect($_POST['mat_chan'])),
                    "mat_id" => intval($this->protect($_POST['mat_id'])),
                    "mat_comm" => intval($this->protect($_POST['mat_comm'])),
                    "mat_champ" => intval($this->protect($_POST['mat_champ'])),
                    "mat_status" => intval($this->protect($_POST['mat_status'])),
                    "mat_address" => $this->protect($_POST['mat_address']),
                    "mat_note" => $this->protect($_POST['mat_note']),
                    "mat_lang" => $this->protect($_POST['mat_lang']),
                ];

                $edit_match = $this->model->editMatch($e_mat);
                if($edit_match != false){
                    $msg = "Match updates";
                    echo "<script>setTimeout(function(){window.location.href = ''},1200)</script>";
                }else{
                    $msg = "Match Not updates , 253h253";
                }
                
                $this->view->commMsg = $msg;
                echo $msg;
            }
            $this->view->mat = $mat[0];
            $this->view->view('admin/edit-match');
        }
        else $this->redirect(ADMIN_PATH . '/new-match');
        
    }
    
    // delete match
    public function delMatch($id){
        $del_match = $this->model->delMatch($id);
        // echo var_dump($del_match);
        if($del_match != false){
            $msg = "MATCH DELETED";
            echo "<script>setTimeout(function(){window.location.href = '". ADMIN_PATH . "/new-match'},1200)</script>";
        }else{
            $msg = "MATCH Not DELETED , errn231324";
        }

        echo $msg;
    }
    
    // new url
    public function newUrl(){
        if($this->checkUSession() == false){  // if not logged in
            $this->redirect(ADMIN_PATH . '/login');
        }else{

            $this->view->channels = $this->model->getChannels();
            $this->view->matches = $this->model->getMatches();
            $this->view->urls = $this->model->getUrls();
            if(isset($_GET['do'])){
                
                if(isset($_GET['id'])){
                    $id = intval($_GET['id']);
                    if($_GET['do'] == 'delete'){
                        $this->delUrl($id);
                    }else if($_GET['do'] == 'edit'){
                        $this->editUrl($id);
                    }
                }else{
                    $this->redirect(ADMIN_PATH . '/new-nft');
                }
            }else{
                if(isset($_POST['url_href']) &&
                   isset($_POST['url_channel']) &&
                   isset($_POST['url_game'])){
                    
                    $n_url = [
                        "url_href" => $this->protect($_POST['url_href']),
                        "url_channel" => intval($this->protect($_POST['url_channel'])),
                        "url_game" => intval($this->protect($_POST['url_game'])),
                    ];

                    $create_new_url = $this->model->newUrl($n_url);
                    if($create_new_url === true){
                        $msg = "URL createed";
                        echo "<script>setTimeout(function(){window.location.href = '". ADMIN_PATH . "/new-url'},1200)</script>";
                    }else{
                        $msg = "URL Not created , 7626373";
                    }
                
                    $this->view->commMsg = $msg;
                    echo $msg;
                }
            
                $this->view->view("admin/new-url");
            }
        }
    }

    // edit url
    public function editUrl($id){
        $url = $this->model->getUrlById($id);
        if($url != false){
            if(isset($_POST['url_href']) &&
               isset($_POST['url_id']) &&
               isset($_POST['url_channel']) &&
               isset($_POST['url_game'])){
                    
                $e_url = [
                    "url_href" => $this->protect($_POST['url_href']),
                    "url_id" => intval($this->protect($_POST['url_id'])),
                    "url_channel" => intval($this->protect($_POST['url_channel'])),
                    "url_game" => intval($this->protect($_POST['url_game'])),
                ];

                $edit_url = $this->model->editUrl($e_url);
                if($edit_url != false){
                    $msg = "URL UPDATED";
                    echo "<script>setTimeout(function(){window.location.href = ''},1200)</script>";
                }else{
                    $msg = "URL Not UPDATED , 2125";
                }

                echo $msg;
            }
            $this->view->url = $url[0];
            $this->view->view('admin/edit-url');
        }
        else $this->redirect(ADMIN_PATH . '/new-url');
        
    }
    
    // delete url
    public function delUrl($id){
        $del_url = $this->model->delUrl($id);
        // echo var_dump($del_url);
        if($del_url != false){
            $msg = "URL DELETED";
            echo "<script>setTimeout(function(){window.location.href = '". ADMIN_PATH . "/new-url'},1200)</script>";
        }else{
            $msg = "URL Not DELETED , urlErr8262";
        }

        echo $msg;
    }
    
    // create new transfer
    public function newTransfer(){
        if($this->checkUSession() == false){  // if not logged in
            $this->redirect(ADMIN_PATH . '/login');
        }else{
            $this->view->clubs = $this->model->getClubs();

            if(isset($_POST['mov_pl']) &&
               isset($_POST['mov_sal']) &&
               isset($_POST['mov_club']) &&
               isset($_POST['mov_date'])){
                
                $d = $this->protect($_POST['mov_date']);
                $d = explode('/', $d);
                $mov_date = $d[2] . '-' . $d[0] . '-' . $d[1] . " 00:00:00";
                
                $nc_transfer = [
                    "mov_pl" => $this->protect($_POST['mov_pl']),
                    "mov_sal" => intval($this->protect($_POST['mov_sal'])),
                    "mov_club" => intval($this->protect($_POST['mov_club'])),
                    "mov_date" => $mov_date,
                ];

                $create_new_transfer = $this->model->newTransfer($nc_transfer);
                if($create_new_transfer === true){
                    $msg = "Transfer createed";
                    echo "<script>setTimeout(function(){window.location.href = '". ADMIN_PATH . "/new-transfer'},1200)</script>";
                }else{
                    $msg = "Transfer Not created , 253";
                }
                
                $this->view->chanMsg = $msg;
                echo $msg;
            }
            
            $this->view->view("admin/new-transfer");
        }
    }

    // create new player
    public function newPlayer(){
        if($this->checkUSession() == false){  // if not logged in
            $this->redirect(ADMIN_PATH . '/login');
        }else{
            $this->view->clubs = $this->model->getClubs();

            if(isset($_POST['pl_name']) &&
               isset($_POST['pl_nat']) &&
               isset($_POST['pl_leng']) &&
               isset($_POST['pl_chanum']) &&
               isset($_POST['pl_goals']) &&
               isset($_POST['pl_curclub'])){

                
                $nc_player = [
                    "pl_name" => $this->protect($_POST['pl_name']),
                    "pl_nat" => $this->protect($_POST['pl_nat']),
                    "pl_leng" => intval($this->protect($_POST['pl_leng'])),
                    "pl_chanum" => intval($this->protect($_POST['pl_chanum'])),
                    "pl_goals" => intval($this->protect($_POST['pl_goals'])),
                    "pl_curclub" => $this->protect($_POST['pl_curclub']),
                ];

                $create_new_player = $this->model->newPlayer($nc_player);
                if($create_new_player === true){
                    $msg = "Player createed";
                    echo "<script>setTimeout(function(){window.location.href = '". ADMIN_PATH . "/new-player'},1200)</script>";
                }else{
                    $msg = "Player Not created , 252633";
                }
                
                $this->view->chanMsg = $msg;
                echo $msg;
            }
            
            $this->view->view("admin/new-player");
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