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

    // new commentor
    public function newComm($d){
        $cncomm = $this->db->table('commentor')
             ->insert("(comm_name, comm_country, comm_chan) values(:comm_name, :comm_country, :comm_chan)", $d);

        return $cncomm;
    }
}
?>
