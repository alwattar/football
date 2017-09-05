<?php

class Index_Model extends Model{
    
    public function __construct(){
        parent::__construct();
    }
    
    public function getMatchOfDay(){
        $matches = $this->db
                 ->table('urls INNER JOIN matches ON matches.mat_id = urls.url_game INNER JOIN channels ON channels.chan_id = urls.url_channel INNER JOIN commentor ON commentor.comm_id = urls.url_comm INNER JOIN champs ON champs.champ_id = matches.mat_champ group by matches.mat_id order by matches.mat_time asc')
                 ->select("channels.*, matches.*, commentor.*, champs.*, urls.*");
        return $matches;
    }

    // show match by id
    public function getMatchByUrlName($u){
        $match = $this->db
               ->table("matches")
               ->at("where mat_url_name = '{$u}'")
               ->select("*");
        return $match;
    }
    
    // show match by id
    public function getMatchById($id){
        $match = $this->db
               ->at(" ")
               ->table("urls INNER JOIN matches ON matches.mat_id = urls.url_game INNER JOIN channels ON channels.chan_id = urls.url_channel INNER JOIN commentor ON commentor.comm_id = urls.url_comm INNER JOIN champs ON champs.champ_id = matches.mat_champ where matches.mat_id = $id group by matches.mat_id order by matches.mat_time asc")
               ->select("channels.*, matches.*, commentor.*, champs.*");
        return $match;
    }

    // get urls of match
    public function getUrlsStreaming($match_id){
        $query = $this->db
               ->table('urls INNER JOIN channels ON channels.chan_id = urls.url_channel INNER JOIN commentor ON commentor.comm_id = urls.url_comm')
               ->at("where urls.url_game = $match_id")
               ->select("urls.*, commentor.*, channels.*");
        return $query;
    }

    
}
?>
