<?php

class Index_Model extends Model{
    
    public function __construct(){
        parent::__construct();
    }
    
    public function getMatchOfDay(){
        $matches = $this->db
                 ->table('urls INNER JOIN matches on matches.mat_id = urls.url_game inner join channels on channels.chan_id = urls.url_channel inner join commentor on commentor.comm_id = urls.url_comm inner join champs on champs.champ_id = matches.mat_champ group by matches.mat_id order by matches.mat_time asc')
                 ->select("channels.*, matches.*, commentor.*, champs.*, urls.*");
        return $matches;
    }

    
}
?>
