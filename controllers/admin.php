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
    
    public function getMatchOfDay(){
        
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
                    $msg = "تم حذف القناة بنجاح";
                    echo "<script>setTimeout(function(){window.location.href = '". ADMIN_PATH . "/new-chan'},1200)</script>";
                }else{
                    $msg = "لم يتم حذف القناة , err665";
                }
                
                $this->view->chanMsg = $msg;
                echo $msg;
            }
            if(isset($_POST['chan_edit']) && $_POST['chan_edit'] == 'chan_edit'){
                if(isset($_POST['chan_name']) &&
                   isset($_POST['chan_name_en']) &&
                   isset($_POST['chan_id']) &&
                   isset($_POST['chan_lang']) &&
                   isset($_POST['chan_logo'])){

                    $e_channel = [
                        "chan_id" => intval($this->protect($_POST['chan_id'])),
                        "chan_name" => $this->protect($_POST['chan_name']),
                        "chan_name_en" => $this->protect($_POST['chan_name_en']),
                        "chan_lang" => $this->protect($_POST['chan_lang']),
                        "chan_logo" => $this->protect($_POST['chan_logo']),
                    ];

                    $edit_channel = $this->model->editChannel($e_channel);

                    if($edit_channel != false){
                        $msg = "تم تعديل القناة بنجاح";
                        echo "<script>setTimeout(function(){window.location.href = ''},1200)</script>";
                    }else{
                        $msg = "لم يتم تعديل القناة , err262432";
                    }
                
                    $this->view->chanMsg = $msg;
                    echo $msg;
                }
            }
            
            if(isset($_POST['chan_name']) &&
               isset($_POST['chan_name_en']) &&
               isset($_POST['chan_lang']) &&
               !isset($_POST['chan_edit']) &&
               isset($_POST['chan_logo'])){

                $nc = [
                    "chan_name" => $this->protect($_POST['chan_name']),
                    "chan_name_en" => $this->protect($_POST['chan_name_en']),
                    "chan_lang" => $this->protect($_POST['chan_lang']),
                    "chan_logo" => $this->protect($_POST['chan_logo']),
                ];

                $create_new_channel = $this->model->newChan($nc);
                if($create_new_channel === true){
                    $msg = "تم انشاء القناة";
                    echo "<script>setTimeout(function(){window.location.href = '". ADMIN_PATH . "/new-chan'},1200)</script>";
                }else{
                    $msg = "لم يتم إنشاء القناة , 62432";
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
                    $msg = "تم حذف المعلق بنجاح";
                    echo "<script>setTimeout(function(){window.location.href = '". ADMIN_PATH . "/new-commentor'},1200)</script>";
                }else{
                    $msg = "لم يتم حذف المعلق , err62465";
                }
                
                $this->view->chanMsg = $msg;
                echo $msg;
            }
            // edit commentor
            if(isset($_POST['comm_edit']) && $_POST['comm_edit'] == 'comm_edit'){
                if(isset($_POST['comm_name']) &&
                   isset($_POST['comm_name)en']) &&
                   isset($_POST['comm_country']) &&
                   isset($_POST['comm_chan'])){
                
                    $ecomm = [
                        "comm_name" => $this->protect($_POST['comm_name']),
                        "comm_name_en" => $this->protect($_POST['comm_name_en']),
                        "comm_country" => $this->protect($_POST['comm_country']),
                        "comm_id" => intval($this->protect($_POST['comm_id'])),
                        "comm_chan" => intval($this->protect($_POST['comm_chan'])),
                    ];
                    
                    $edit_comm = $this->model->editComm($ecomm);
                    // echo var_dump($edit_comm);
                    if($edit_comm != false){
                        $msg = "تم تعدل المعلق بنجاح";
                        echo "<script>setTimeout(function(){window.location.href = ''},1200)</script>";
                    }else{
                        $msg = "لم يتم تعديل المعلق , Eroro26342";
                    }

                    echo $msg;
                    
                }
            }
            // new commentor
            if(isset($_POST['comm_name']) &&
               isset($_POST['comm_name_en']) &&
               !isset($_POST['comm_edit']) &&
               isset($_POST['comm_country']) &&
               isset($_POST['comm_chan'])){
                
                $ncomm = [
                    "comm_name" => $this->protect($_POST['comm_name']),
                    "comm_name_en" => $this->protect($_POST['comm_name_en']),
                    "comm_country" => $this->protect($_POST['comm_country']),
                    "comm_chan" => intval($this->protect($_POST['comm_chan'])),
                ];

                $create_new_commentor = $this->model->newComm($ncomm);
                if($create_new_commentor === true){
                    $msg = "تم انشاء معلق بنجاح";
                    echo "<script>setTimeout(function(){window.location.href = '". ADMIN_PATH . "/new-commentor'},1200)</script>";
                }else{
                    $msg = "لم يتم إنشاء معلق , 6243251";
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
                   isset($_POST['nft_name_en']) &&
                   isset($_POST['nft_logo']) &&
                   isset($_POST['nft_num'])){

                    $n_nft = [
                        "nft_name" => $this->protect($_POST['nft_name']),
                        "nft_name_en" => $this->protect($_POST['nft_name_en']),
                        "nft_num" => intval($this->protect($_POST['nft_num'])),
                        "nft_logo" => $this->protect($_POST['nft_logo']),
                    ];

                    $create_new_nft = $this->model->newNFT($n_nft);
                    if($create_new_nft === true){
                        $msg = "تم إنشاء المنتخب بنجاح";
                        echo "<script>setTimeout(function(){window.location.href = '". ADMIN_PATH . "/new-nft'},1200)</script>";
                    }else{
                        $msg = "لم يتم إنشاء المنتخب , 53364";
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
               isset($_POST['nft_name_en']) &&
               isset($_POST['nft_id']) &&
               isset($_POST['nft_logo']) &&
               isset($_POST['nft_num'])){

                $e_nft = [
                    "nft_name" => $this->protect($_POST['nft_name']),
                    "nft_name_en" => $this->protect($_POST['nft_name_en']),
                    "nft_id" => intval($this->protect($_POST['nft_id'])),
                    "nft_num" => intval($this->protect($_POST['nft_num'])),
                    "nft_logo" => $this->protect($_POST['nft_logo']),
                ];

                $edit_nft = $this->model->editNFT($e_nft);
                if($edit_nft != false){
                    $msg = "تم تعديل المنتخب بنجاح";
                    echo "<script>setTimeout(function(){window.location.href = ''},1200)</script>";
                }else{
                    $msg = "لم يتم تعديل المنتخب , trr2524";
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
            $msg = "تم حذف المنتخب بنجاح";
            echo "<script>setTimeout(function(){window.location.href = '". ADMIN_PATH . "/new-nft'},1200)</script>";
        }else{
            $msg = "لم يتم حذف المنتخب , trr25248252";
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
                    $this->redirect(ADMIN_PATH . '/new-club');
                }
            }else{
                if(isset($_POST['cl_name']) &&
                   isset($_POST['cl_name_en']) &&
                   isset($_POST['cl_logo']) &&
                   isset($_POST['cl_country'])){

                    $n_club = [
                        "cl_name" => $this->protect($_POST['cl_name']),
                        "cl_name_en" => $this->protect($_POST['cl_name_en']),
                        "cl_country" => $this->protect($_POST['cl_country']),
                        "cl_logo" => $this->protect($_POST['cl_logo']),
                    ];

                    $create_new_club = $this->model->newClub($n_club);
                    if($create_new_club === true){
                        $msg = "تم إنشاء النادي بنجاح";
                        echo "<script>setTimeout(function(){window.location.href = '". ADMIN_PATH . "/new-club'},1200)</script>";
                    }else{
                        $msg = "لم يتم إنشاء النادي , 763364";
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
               isset($_POST['cl_name_en']) &&
               isset($_POST['cl_id']) &&
               isset($_POST['cl_logo']) &&
               isset($_POST['cl_country'])){

                $e_cl = [
                    "cl_name" => $this->protect($_POST['cl_name']),
                    "cl_name_en" => $this->protect($_POST['cl_name_en']),
                    "cl_country" => $this->protect($_POST['cl_country']),
                    "cl_id" => intval($this->protect($_POST['cl_id'])),
                    "cl_logo" => $this->protect($_POST['cl_logo']),
                ];

                $edit_club = $this->model->editClub($e_cl);
                if($edit_club != false){
                    $msg = "تم تعديل النادي بنجاح";
                    echo "<script>setTimeout(function(){window.location.href = ''},1200)</script>";
                }else{
                    $msg = "لم يتم تعديل النادي , dhft27353";
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
            $msg = "تم حذف النادي بنجاح";
            echo "<script>setTimeout(function(){window.location.href = '". ADMIN_PATH . "/new-club'},1200)</script>";
        }else{
            $msg = "لم يتم حذف النادي , errn2342524";
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
                    $this->redirect(ADMIN_PATH . '/new-champ');
                }
            }else{
                if(isset($_POST['champ_name']) &&
                   isset($_POST['champ_name_en']) &&
                   isset($_POST['champ_logo']) &&
                   isset($_POST['champ_date']) &&
                   isset($_POST['champ_loc'])){

                    $n_champ = [
                        "champ_name" => $this->protect($_POST['champ_name']),
                        "champ_name_en" => $this->protect($_POST['champ_name_en']),
                        "champ_date" => $this->protect($_POST['champ_date']),
                        "champ_loc" => $this->protect($_POST['champ_loc']),
                        "champ_logo" => $this->protect($_POST['champ_logo']),
                    ];

                    $create_new_champ = $this->model->newChamp($n_champ);
                    if($create_new_champ === true){
                        $msg = "تم ان شاء بطولة بنجاح";
                        echo "<script>setTimeout(function(){window.location.href = '". ADMIN_PATH . "/new-champ'},1200)</script>";
                    }else{
                        $msg = "لم يتم انشاء البطولة, 765323";
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
               isset($_POST['champ_name_en']) &&
               isset($_POST['champ_logo']) &&
               isset($_POST['champ_date']) &&
               isset($_POST['champ_loc'])){

                $e_champ = [
                    "champ_id" => intval($this->protect($_POST['champ_id'])),
                    "champ_name" => $this->protect($_POST['champ_name']),
                    "champ_name_en" => $this->protect($_POST['champ_name_en']),
                    "champ_date" => $this->protect($_POST['champ_date']),
                    "champ_loc" => $this->protect($_POST['champ_loc']),
                    "champ_logo" => $this->protect($_POST['champ_logo']),
                ];

                $edit_champ = $this->model->editChamp($e_champ);
                if($edit_champ != false){
                    $msg = "تم تعديل البطولة";
                    echo "<script>setTimeout(function(){window.location.href = ''},1200)</script>";
                }else{
                    $msg = "لم يتم تعديل البطولة , 2724bh225";
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
            $msg = "تم حذف البطولة بنجاح";
            echo "<script>setTimeout(function(){window.location.href = '". ADMIN_PATH . "/new-champ'},1200)</script>";
        }else{
            $msg = "لم يتم حذف البطولة , errn23435324";
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
            $clubs = $this->model->getClubs();
            $nfts = $this->model->getNFTS();
            $teams = [];

            if($clubs != false){
                foreach($clubs as $cl){
                    $teams[] = [
                        'name' => $cl->cl_name,
                        'id' => $cl->cl_id . '_c',
                    ];
                }
            }
            if($nfts != false){
                foreach($nfts as $nft){
                    $teams[] = [
                        'name' => $nft->nft_name,
                        'id' => $nft->nft_id . '_n',
                    ];
                }
            }

            $this->view->teams = $teams;
            
            if(isset($_GET['do'])){
                
                if(isset($_GET['id'])){
                    $id = intval($_GET['id']);
                    if($_GET['do'] == 'delete'){
                        $this->delMatch($id);
                    }else if($_GET['do'] == 'edit'){
                        $this->editMatch($id);
                    }
                }else{
                    $this->redirect(ADMIN_PATH . '/new-match');
                }
            }else{
                if(isset($_POST['mat_team1'])   &&
                   isset($_POST['mat_team2'])   &&
                   isset($_POST['mat_time'])    &&
                   isset($_POST['mat_champ'])   &&
                   isset($_POST['mat_address']) &&
                   isset($_POST['mat_note'])    
                    ){

                    $n_mat = [
                        "mat_team1" => $this->protect($_POST['mat_team1']),
                        "mat_team2" => $this->protect($_POST['mat_team2']),
                        "mat_time" => $this->protect($_POST['mat_time']),
                        "mat_champ" => intval($this->protect($_POST['mat_champ'])),
                        "mat_address" => $this->protect($_POST['mat_address']),
                        "mat_note" => $this->protect($_POST['mat_note'])
                        
                        
                    ];

                    /* Starting generate url name */
                    $team_1_info = $this->getTeam($n_mat['mat_team1']);
                    $team_2_info = $this->getTeam($n_mat['mat_team2']);

                    $t1_name = $team_1_info['team'][$team_1_info['p'] . '_name'];
                    $t2_name = $team_2_info['team'][$team_1_info['p'] . '_name'];

                    $url_name = ucfirst($t1_name) . '-ضد-' . ucfirst($t2_name) . '-' . date('Y') . '-' . date('m') . '-' . date('d');
                    /* ending generate url name */
                    $n_mat['mat_url_name'] = str_ireplace(' ', '-', $url_name);
                    
                    $create_new_mat = $this->model->newMatch($n_mat);
                    if($create_new_mat === true){
                        $msg = "تم إنشاء المباراة بنجاح";
                        echo "<script>setTimeout(function(){window.location.href = '". ADMIN_PATH . "/new-match'},1200)</script>";
                    }else{
                        $msg = "لم يتم إنشاء المباراة , 729351173";
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
            if(isset($_POST['mat_id']) &&
               isset($_POST['mat_team1']) &&
               isset($_POST['mat_team2']) &&
               isset($_POST['mat_time']) &&
               isset($_POST['mat_address']) &&
               isset($_POST['mat_note']) &&
               isset($_POST['mat_team1_goal']) &&
               isset($_POST['mat_team2_goal']) &&
               isset($_POST['mat_summ']) &&
               isset($_POST['mat_goals']) &&
               isset($_POST['mat_champ'])){
                
                $e_mat = [
                    "mat_id" => intval($this->protect($_POST['mat_id'])),
                    "mat_team1" => $this->protect($_POST['mat_team1']),
                    "mat_team2" => $this->protect($_POST['mat_team2']),
                    "mat_time" => $this->protect($_POST['mat_time']),
                    "mat_address" => $this->protect($_POST['mat_address']),
                    "mat_note" => $this->protect($_POST['mat_note']),
                    "mat_team1_goal" => $this->protect($_POST['mat_team1_goal']),
                    "mat_team2_goal" => $this->protect($_POST['mat_team2_goal']),
                    "mat_summ" => $this->protect($_POST['mat_summ']),
                    "mat_goals" => $this->protect($_POST['mat_goals']),
                    "mat_champ" => intval($this->protect($_POST['mat_champ']))                    
                ];

                $edit_match = $this->model->editMatch($e_mat);
                if($edit_match != false){
                    $msg = "تم تعديل المباراة بنجاح";
                    echo "<script>setTimeout(function(){window.location.href = ''},1200)</script>";
                }else{
                    $msg = "لم يتم تعديل المباراة , 253h253";
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
            $msg = "تم حذف المباراة بنجاح";
            echo "<script>setTimeout(function(){window.location.href = '". ADMIN_PATH . "/new-match'},1200)</script>";
        }else{
            $msg = "لم يتم حذف المباراة , errn231324";
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
            $this->view->comm = $this->model->getCommentors();
            if(isset($_GET['do'])){
                if(isset($_GET['id'])){
                    $id = intval($_GET['id']);
                    if($_GET['do'] == 'delete'){
                        $this->delUrl($id);
                    }else if($_GET['do'] == 'edit'){
                        $this->editUrl($id);
                    }
                }else{
                    $this->redirect(ADMIN_PATH . '/new-url');
                }
            }else{
                if(isset($_POST['url_name']) &&
                    isset($_POST['url_href']) &&
                   isset($_POST['url_channel']) &&
                   isset($_POST['url_comm']) &&
                   isset($_POST['url_game'])
                   &&
                   isset($_POST['url_lang'])
                  ){
                    
                    $n_url = [
                        "url_name" => $this->protect($_POST['url_name']),
                        "url_href" => $this->protect($_POST['url_href']),
                        "url_channel" => intval($this->protect($_POST['url_channel'])),
                        "url_comm" => intval($this->protect($_POST['url_comm'])),
                        "url_game" => intval($this->protect($_POST['url_game'])),
                        "url_lang" => $this->protect($_POST['url_lang']),
                    ];

                    $create_new_url = $this->model->newUrl($n_url);
                    if($create_new_url === true){
                        $msg = "تم إنشاء الرابط بنجاح";
                        echo "<script>setTimeout(function(){window.location.href = '". ADMIN_PATH . "/new-url'},1200)</script>";
                    }else{
                        $msg = "لم يتم إنشاء الرابط , 7626373";
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
               isset($_POST['url_game'])
               &&
               isset($_POST['url_lang'])
              ){
                    
                $e_url = [
                    "url_href" => $this->protect($_POST['url_href']),
                    "url_id" => intval($this->protect($_POST['url_id'])),
                    "url_channel" => intval($this->protect($_POST['url_channel'])),
                    "url_game" => intval($this->protect($_POST['url_game'])),
                    "url_lang" => $this->protect($_POST['url_lang']),
                ];

                $edit_url = $this->model->editUrl($e_url);
                if($edit_url != false){
                    $msg = "تم تعديل الرابط بنجاح";
                    echo "<script>setTimeout(function(){window.location.href = ''},1200)</script>";
                }else{
                    $msg = "لم يتم تعديل الرابط , 2125";
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
            $msg = "تم حذف الرابط بنجاح";
            echo "<script>setTimeout(function(){window.location.href = '". ADMIN_PATH . "/new-url'},1200)</script>";
        }else{
            $msg = "لم يتم حذف الرابط , urlErr8262";
        }

        echo $msg;
    }
    
    // create new transfer
    public function newTransfer(){
        if($this->checkUSession() == false){  // if not logged in
            $this->redirect(ADMIN_PATH . '/login');
        }else{
            $this->view->clubs = $this->model->getClubs();
            $this->view->mov = $this->model->getTransfers();
            if(isset($_GET['do'])){
                if(isset($_GET['id'])){
                    $id = intval($_GET['id']);
                    if($_GET['do'] == 'delete'){
                        $this->delTransfer($id);
                    }else if($_GET['do'] == 'edit'){
                        $this->editTransfer($id);
                    }
                }else{
                    $this->redirect(ADMIN_PATH . '/new-transfer');
                }
            }else{                
                if(isset($_POST['mov_pl']) &&
                   isset($_POST['mov_sal']) &&
                   isset($_POST['mov_club']) &&
                   isset($_POST['mov_date'])){
                
                    $nc_transfer = [
                        "mov_pl" => $this->protect($_POST['mov_pl']),
                        "mov_sal" => intval($this->protect($_POST['mov_sal'])),
                        "mov_club" => intval($this->protect($_POST['mov_club'])),
                        "mov_date" => $this->protect($_POST['mov_date'])
                    ];

                    $create_new_transfer = $this->model->newTransfer($nc_transfer);
                    if($create_new_transfer === true){
                        $msg = "تم انشاء انتقال بنجاح";
                        echo "<script>setTimeout(function(){window.location.href = '". ADMIN_PATH . "/new-transfer'},1200)</script>";
                    }else{
                        $msg = "لم يتم انشاء انتقال , 25312";
                    }
                
                    $this->view->chanMsg = $msg;
                    echo $msg;
                }
            
                $this->view->view("admin/new-transfer");
            }
        }
    }


    // edit transfer
    public function editTransfer($id){
        $mov = $this->model->getTransferById($id);
        if($mov != false){
            if(isset($_POST['mov_pl']) &&
               isset($_POST['mov_id']) &&
               isset($_POST['mov_sal']) &&
               isset($_POST['mov_club']) &&
               isset($_POST['mov_date'])){
                
                $d = $this->protect($_POST['mov_date']);
                $d = explode('/', $d);
                $mov_date = $d[2] . '-' . $d[0] . '-' . $d[1] . " 00:00:00";
                
                $e_transfer = [
                    "mov_pl" => $this->protect($_POST['mov_pl']),
                    "mov_id" => intval($this->protect($_POST['mov_id'])),
                    "mov_sal" => intval($this->protect($_POST['mov_sal'])),
                    "mov_club" => intval($this->protect($_POST['mov_club'])),
                    "mov_date" => $mov_date,
                ];

                $edit_mov = $this->model->editTransfer($e_transfer);
                
                if($edit_mov != false){
                    $msg = "تم تعديل الانتقال بنجاح";
                    echo "<script>setTimeout(function(){window.location.href = ''},1200)</script>";
                }else{
                    $msg = "لم يتم تعديل الانتقال  , er22125";
                }

                echo $msg;
            }
            $this->view->mov = $mov[0];
            $this->view->view('admin/edit-transfer');
        }
        else $this->redirect(ADMIN_PATH . '/new-transfer');
        
    }
    
    // delete transfer
    public function delTransfer($id){
        $del_transfer = $this->model->delTransfer($id);
        // echo var_dump($del_transfer);
        if($del_transfer != false){
            $msg = "تم حذف الانتقال بنجاح";
            echo "<script>setTimeout(function(){window.location.href = '". ADMIN_PATH . "/new-transfer'},1200)</script>";
        }else{
            $msg = "لم يتم حذف الانتقال , transErr826219";
        }

        echo $msg;
    }

    
    // create new player
    public function newPlayer(){
        if($this->checkUSession() == false){  // if not logged in
            $this->redirect(ADMIN_PATH . '/login');
        }else{
            $this->view->clubs = $this->model->getClubs();
            $this->view->players = $this->model->getPlayers();
            if(isset($_GET['do'])){
                if(isset($_GET['id'])){
                    $id = intval($_GET['id']);
                    if($_GET['do'] == 'delete'){
                        $this->delPlayer($id);
                    }else if($_GET['do'] == 'edit'){
                        $this->editPlayer($id);
                    }
                }else{
                    $this->redirect(ADMIN_PATH . '/new-player');
                }
            }else{
                if(isset($_POST['pl_name']) &&
                   isset($_POST['pl_name_en']) &&
                   isset($_POST['pl_nat']) &&
                   isset($_POST['pl_leng']) &&
                   isset($_POST['pl_chanum']) &&
                   isset($_POST['pl_goals']) &&
                   isset($_POST['pl_curclub'])){

                
                    $nc_player = [
                        "pl_name" => $this->protect($_POST['pl_name']),
                        "pl_name_en" => $this->protect($_POST['pl_name_en']),
                        "pl_nat" => $this->protect($_POST['pl_nat']),
                        "pl_leng" => intval($this->protect($_POST['pl_leng'])),
                        "pl_chanum" => intval($this->protect($_POST['pl_chanum'])),
                        "pl_goals" => intval($this->protect($_POST['pl_goals'])),
                        "pl_curclub" => $this->protect($_POST['pl_curclub']),
                    ];

                    $create_new_player = $this->model->newPlayer($nc_player);
                    if($create_new_player === true){
                        $msg = "تم انشاء لاعب بنجاح";
                        echo "<script>setTimeout(function(){window.location.href = '". ADMIN_PATH . "/new-player'},1200)</script>";
                    }else{
                        $msg = "لم يتم إنشاء لاعبٍ , 252163p23";
                    }
                
                    $this->view->chanMsg = $msg;
                    echo $msg;
                }
            
                $this->view->view("admin/new-player");
            }
        }
    }


    // edit player
    public function editPlayer($id){
        $pl = $this->model->getPlayerById($id);
        if($pl != false){
            if(isset($_POST['pl_name']) &&
               isset($_POST['pl_name_en']) &&
               isset($_POST['pl_id']) &&
               isset($_POST['pl_nat']) &&
               isset($_POST['pl_leng']) &&
               isset($_POST['pl_chanum']) &&
               isset($_POST['pl_goals']) &&
               isset($_POST['pl_curclub'])){

                
                $e_player = [
                    "pl_name" => $this->protect($_POST['pl_name']),
                    "pl_name_en" => $this->protect($_POST['pl_name_en']),
                    "pl_nat" => $this->protect($_POST['pl_nat']),
                    "pl_id" => intval($this->protect($_POST['pl_id'])),
                    "pl_leng" => intval($this->protect($_POST['pl_leng'])),
                    "pl_chanum" => intval($this->protect($_POST['pl_chanum'])),
                    "pl_goals" => intval($this->protect($_POST['pl_goals'])),
                    "pl_curclub" => $this->protect($_POST['pl_curclub']),
                ];

                $edit_pl = $this->model->editPlayer($e_player);
                
                if($edit_pl != false){
                    $msg = "تم تعديل معلومات اللاعب بنجاح";
                    echo "<script>setTimeout(function(){window.location.href = ''},1200)</script>";
                }else{
                    $msg = "لم يتم تعديل معلومات اللاعب , plErr2753";
                }

                echo $msg;
            }
            $this->view->pl = $pl[0];
            $this->view->view('admin/edit-player');
        }
        else $this->redirect(ADMIN_PATH . '/new-player');
        
    }
    
    // delete player
    public function delPlayer($id){
        $del_player = $this->model->delPlayer($id);
        // echo var_dump($del_player);
        if($del_player != false){
            $msg = "تم حذف اللاعب بنجاح";
            echo "<script>setTimeout(function(){window.location.href = '". ADMIN_PATH . "/new-player'},1200)</script>";
        }else{
            $msg = "لم يتم حذف اللاعب , playerErr9301";
        }

        echo $msg;
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