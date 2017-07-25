<?php

class Admin_Model extends Model{
    
    public function __construct(){
        parent::__construct();
    }


    // login 
    public function login($u, $p){

        $user = $this->db
              ->table('users')
              ->at("where u_name = '{$u}' and u_pass = '{$p}'")
              ->select('*');

        return $user;
    }

    // craete new channel
    public function newChan($d){
        $cnc = $this->db->table('channels')
             ->insert("(chan_name, chan_lang, chan_logo) values(:chan_name, :chan_lang, :chan_logo)", $d);

        return $cnc;
    }

    // edit channel
    public function editChannel($d){
        $ec = $this->db->table('channels')
            ->at('where chan_id = :chan_id')
            ->update('chan_name = :chan_name, chan_lang = :chan_lang, chan_logo = :chan_logo', $d);
        return $ec;
    }

    // delete channel
    public function delChannel($d){
        $dc = $this->db->table('channels')
            ->at('where chan_id = ' . $d)
            ->delete();
        return $dc;
    }

    // get all channel
    public function getChannels(){
        $chans = $this->db->table('channels')->select('*');
        return $chans;
    }

    // get all Url
    public function getUrls(){
        $urls = $this->db
              ->table('urls INNER JOIN channels ON urls.url_channel = channels.chan_id INNER JOIN matches ON matches.mat_id = urls.url_game')
              ->select('urls.*, channels.*, matches.*');
        return $urls;
    }

    // get all nfts
    public function getNFTS(){
        $nfts = $this->db->table('nft')->select('*');
        return $nfts;
    }


    // get nft by id
    public function getNFTById($id){
        $nft = $this->db->table('nft')->at("where nft_id = $id")->select('*');
        return $nft;
    }

    // get Url by id
    public function getUrlById($id){
        $nft = $this->db
             ->table('urls INNER JOIN channels ON urls.url_channel = channels.chan_id INNER JOIN matches ON matches.mat_id = urls.url_game')
             ->at("where url_id = $id")
             ->select('urls.*, channels.*, matches.*');
        return $nft;
    }

    // get match by id
    public function getMatchById($id){
        $nft = $this->db
             ->table('matches INNER JOIN champs ON champs.champ_id = matches.mat_champ')
             ->at("where mat_id = $id")
             ->select('matches.*, champs.*');
        return $nft;
    }

    // get all commentors
    public function getCommentors(){
        $comms = $this->db->table('commentor INNER JOIN channels ON channels.chan_id = commentor.comm_chan')->select('commentor.*, channels.*');
        return $comms;

    }

    // get all champs
    public function getChamps(){
        $champs = $this->db->table('champs')->select('*');
        return $champs;
    }

    // get champ by id
    public function getChampById($id){
        $champs = $this->db->table('champs')->at("where champ_id = $id")->select('*');
        return $champs;
    }

    // get all Matches
    public function getMatches(){
        $matchs = $this->db
                ->table('matches')
                ->select('*');
        return $matchs;
    }
    //public function getMatches(){
    //    $matchs = $this->db
    //            ->table('matches INNER JOIN channels ON channels.chan_id = matches.mat_chan')
    //            ->select('channels.*, matches.*');
    //    return $matchs;
   // }

    // get all Clubs
    public function getClubs(){
        $clubs = $this->db->table('clubs')->select('*');
        return $clubs;
    }

    // get Club by id
    public function getClubById($id){
        $club = $this->db->table('clubs')->at('where cl_id = ' . $id)->select('*');
        return $club;
    }
    
    // new commentor
    public function newComm($d){
        $cncomm = $this->db->table('commentor')
             ->insert("(comm_name, comm_country, comm_chan) values(:comm_name, :comm_country, :comm_chan)", $d);

        return $cncomm;
    }

    // edit commentor
    public function editComm($d){
        $ecomm = $this->db
               ->table('commentor')
               ->at("where comm_id = :comm_id")
               ->update("comm_name = :comm_name, comm_chan = :comm_chan, comm_country = :comm_country", $d);

        return $ecomm;
    }

    // delete commentor
    public function delComm($d){
        $dc = $this->db->table('commentor')
            ->at('where comm_id = ' . $d)
            ->delete();
        return $dc;
    }

    // new NTF
    public function newNFT($d){
        $cn_nft = $this->db->table('nft')
             ->insert("(nft_name, nft_logo, nft_num) values(:nft_name, :nft_logo, :nft_num)", $d);

        return $cn_nft;
    }

    // edit NTF
    public function editNFT($d){
        $edit_nft = $this->db
                ->table('nft')
                ->at("where nft_id = :nft_id")
                ->update("nft_name = :nft_name, nft_logo = :nft_logo, nft_num = :nft_num", $d);
        
        return $edit_nft;
    }

    // delete nft
    public function delNFT($d){
        $dnft = $this->db->table('nft')
            ->at('where nft_id = ' . $d)
            ->delete();
        return $dnft;
    }

    // new club
    public function newClub($d){
        $cn_club = $this->db->table('clubs')
             ->insert("(cl_name, cl_logo, cl_country) values(:cl_name, :cl_logo, :cl_country)", $d);

        return $cn_club;
    }


    // delete club
    public function delClub($d){
        $dclub = $this->db->table('clubs')
            ->at('where cl_id = ' . $d)
            ->delete();
        return $dclub;
    }

    // new Champ
    public function newChamp($d){
        $cn_champ = $this->db->table('champs')
             ->insert("(champ_name, champ_logo, champ_date, champ_loc) values(:champ_name, :champ_logo, :champ_date, :champ_loc)", $d);

        return $cn_champ;
    }

    // new Match
    public function newMatch($d){
        $cn_mat = $this->db->table('matches')
             ->insert("(mat_team1, mat_team2, mat_time, mat_champ, mat_address, mat_note) VALUES(:mat_team1, :mat_team2, :mat_time, :mat_champ, :mat_address, :mat_note)", $d);

        return $cn_mat;
    }


    // new URL
    public function newUrl($d){
        $cn_url = $this->db->table('urls')
             ->insert("(url_name, url_href, url_channel, url_comm, url_game) values(:url_name, :url_href, :url_channel, :url_comm, :url_game)", $d);

        return $cn_url;
    }


    // new transfer
    public function newTransfer($d){
        $cn_transfer = $this->db->table('transfer')
             ->insert("(mov_pl, mov_club, mov_sal, mov_date) values(:mov_pl, :mov_club, :mov_sal, :mov_date)", $d);

        return $cn_transfer;
    }


    // new transfer
    public function newPlayer($d){
        $cn_player = $this->db->table('players')
             ->insert("(pl_name, pl_nat, pl_leng, pl_chanum, pl_goals, pl_curclub) VALUES(:pl_name, :pl_nat, :pl_leng, :pl_chanum, :pl_goals, :pl_curclub)", $d);

        return $cn_player;
    }

    // edit club
    public function editClub($d){
        $ec = $this->db
            ->table('clubs')
            ->at("where cl_id = :cl_id")
            ->update("cl_name = :cl_name, cl_country = :cl_country, cl_logo = :cl_logo", $d);
        return $ec;
    }
    // del champ
    public function delChamp($d){
        $dc = $this->db->table('champs')
            ->at('where champ_id = ' . $d)
            ->delete();
        return $dc;
    }

    // del match
    public function delMatch($d){
        $dc = $this->db->table('matches')
            ->at('where mat_id = ' . $d)
            ->delete();
        return $dc;
    }

    // del Url
    public function delUrl($d){
        $dc = $this->db->table('urls')
            ->at('where url_id = ' . $d)
            ->delete();
        return $dc;
    }

    // del transfer
    public function delTransfer($d){
        $dt = $this->db->table('transfer')
            ->at('where mov_id = ' . $d)
            ->delete();
        return $dt;
    }


    // del player
    public function delPlayer($d){
        $dt = $this->db->table('players')
            ->at('where pl_id = ' . $d)
            ->delete();
        return $dt;
    }

    // edit champ
    public function editChamp($d){
        $ec = $this->db
            ->table('champs')
            ->at("where champ_id = :champ_id")
            ->update("champ_name = :champ_name, champ_date = :champ_date, champ_logo = :champ_logo, champ_loc = :champ_loc", $d);
        return $ec;
    }

    // edit match
    public function editMatch($d){
        $ematch = $this->db
                ->table('matches')
                ->at("where mat_id = :mat_id")
                ->update(" mat_team1 = :mat_team1, mat_team2 = :mat_team2, mat_time = :mat_time, mat_champ = :mat_champ, mat_team1_goal = :mat_team1_goal, mat_team2_goal = :mat_team2_goal,
                mat_summ = :mat_summ, mat_goals = :mat_goals , mat_address = :mat_address, mat_note = :mat_note, mat_lang = :mat_lang", $d);

        return $ematch;
    }

    // edit url

    public function editUrl($d){
        $eurl = $this->db
               ->table('urls')
               ->at("where url_id = :url_id")
               ->update("url_href = :url_href, url_id = :url_id, url_channel = :url_channel, url_game = :url_game", $d);

        return $eurl;
    }

    // get all transfers
    public function getTransfers(){
        $tr = $this->db
            ->table('transfer INNER JOIN clubs ON clubs.cl_id = transfer.mov_club')
            ->select('clubs.*, transfer.*');

        return $tr;
    }

    // get transfer by id
    public function getTransferById($id){
        $transfer = $this->db
              ->table('transfer INNER JOIN clubs ON clubs.cl_id = transfer.mov_club')
              ->at('where mov_id = ' . $id)
              ->select('clubs.*, transfer.*');
        return $transfer;
    }

    // edit transfer

    public function editTransfer($d){
        $et = $this->db
            ->table('transfer')
            ->at("where mov_id = :mov_id")
            ->update("mov_pl = :mov_pl, mov_sal = :mov_sal, mov_club = :mov_club, mov_date = :mov_date", $d);

        return $et;
    }

    // get all players
    public function getPlayers(){
        $p = $this->db
           ->table('players INNER JOIN clubs ON clubs.cl_id = players.pl_curclub')
           ->select('clubs.*, players.*');
        return $p;
    }

    // get player by id
    public function getPlayerById($id){
        $p = $this->db
           ->table('players INNER JOIN clubs ON clubs.cl_id = players.pl_curclub')
           ->at("WHERE players.pl_id = $id")
           ->select('clubs.*, players.*');
        return $p;
    }

    // edit player

    public function editPlayer($d){
        $ep = $this->db
            ->table('players')
            ->at("where pl_id = :pl_id")
            ->update("pl_name = :pl_name, pl_nat = :pl_nat, pl_leng = :pl_leng, pl_chanum = :pl_chanum, pl_goals = :pl_goals, pl_curclub = :pl_curclub" ,$d);
        
        return $ep;
        
    }
}
?>
