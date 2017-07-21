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

    // get all channel
    public function getChannels(){
        $chans = $this->db->table('channels')->select('*');
        return $chans;
    }

    // get all commentors
    public function getCommentors(){
        $chans = $this->db->table('commentor')->select('*');
        return $chans;
    }

    // get all champs
    public function getChamps(){
        $chans = $this->db->table('champs')->select('*');
        return $chans;
    }

    // get all Matches
    public function getMatches(){
        $chans = $this->db->table('matches')->select('*');
        return $chans;
    }

    // get all Clubs
    public function getClubs(){
        $chans = $this->db->table('clubs')->select('*');
        return $chans;
    }

    // new commentor
    public function newComm($d){
        $cncomm = $this->db->table('commentor')
             ->insert("(comm_name, comm_country, comm_chan) values(:comm_name, :comm_country, :comm_chan)", $d);

        return $cncomm;
    }

    // new NTF
    public function newNFT($d){
        $cn_nft = $this->db->table('nft')
             ->insert("(nft_name, nft_logo, nft_num) values(:nft_name, :nft_logo, :nft_num)", $d);

        return $cn_nft;
    }

    // new club
    public function newClub($d){
        $cn_club = $this->db->table('clubs')
             ->insert("(cl_name, cl_logo, cl_country) values(:cl_name, :cl_logo, :cl_country)", $d);

        return $cn_club;
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
             ->insert("(mat_name, mat_team1, mat_team2, mat_time, mat_chan, mat_comm, mat_champ, mat_address, mat_status, mat_note, mat_lang) VALUES(:mat_name, :mat_team1, :mat_team2, :mat_time, :mat_chan, :mat_comm, :mat_champ, :mat_address, :mat_status, :mat_note, :mat_lang)", $d);

        return $cn_mat;
    }


    // new URL
    public function newUrl($d){
        $cn_url = $this->db->table('urls')
             ->insert("(url_href, url_channel, url_game) values(:url_href, :url_channel, :url_game)", $d);

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
}
?>
