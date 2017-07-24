<?php

class Index extends Controller{
    
    public function __construct(){
        parent::__construct();
        $this->view->dlang = $this->dlang;
    }

    public function index(){
        
        $this->view->view("index");
    }

    public function getMatchOfDay(){
        if(isset($_GET['day'])){
            $day = $this->protect($_GET['day']);
            if($day == 'today'){
                $m_time = time();
            }else if($day == 'yesterday'){
                $m_time = time() - 24 * 60 * 60;
            }else if($day == 'tomorrow'){
                $m_time = time() + 24 * 60 * 60;
            }else{
                $m_time = false;
            }

            $matches = $this->model->getMatchOfDay();
            if($matches != false){
                $final_matches = $this->getMatchesByDay($matches, $m_time);
                $final_matches = $this->procMatches($final_matches);
                // echo var_dump($final_matches);
                $this->view->matches = $final_matches;
                $this->view->view('match-block');
            }
            else
                $final_matches = [];

            // echo json_encode($final_matches);
        }

    }


    // proxess matches
    public function procMatches($matches){
        $final_matches = [];
        foreach($matches as $m){
            $team1 = $this->getTeam($m->mat_team1);
            $team2 = $this->getTeam($m->mat_team2);
            $team1_name = $team1['team'][$team1['p'] . '_name'];
            $team1_logo = $team1['team'][$team1['p'] . '_logo'];
            $team2_name = $team2['team'][$team2['p'] . '_name'];
            $team2_logo = $team2['team'][$team2['p'] . '_logo'];
            $m->team1_name = $team1_name;
            $m->team1_logo = $team1_logo;
            $m->team2_name = $team2_name;
            $m->team2_logo = $team2_logo;

            $final_matches[] = $m;
        }

        return $final_matches;
    }

    // get matchs by day
    public function getMatchesByDay($matches, $m_time = false){
        $final_matches = [];
        $m_date = date('Y-m-d', $m_time);
        if($m_time != false){
            foreach($matches as $m){
                $game_date_in_seconds = strtotime($m->mat_time);
                $game_date = date('Y-m-d', $game_date_in_seconds);
                if($game_date == $m_date){
                    $final_matches[] = $m;
                }else continue;
            }
            // echo var_dump($final_matches);
            return $final_matches;
        }else{
            // echo var_dump($matches);
            return $matches;
        }
    }


    // get match by id
    public function showMatch(){
        if(isset($_GET['id'])){
            $id = intval($_GET['id']);
            $match = $this->model->getMatchById($id);
            if($match != false){
                // to get teams info 
                $match = $this->procMatches($match);
                $match = $match[0];
                $match = $this->getStreamingUrlsOfMatch($match);
                $this->view->match = $match;
                $this->view->view('show-match');
            }else{
                echo "Match not found Template<br/>";
                $this->view->view('404');
            }
        }
    }


    // get all streaming urls
    public function getStreamingUrlsOfMatch($match_object){
        $urls = $this->model->getUrlsStreaming($match_object->mat_id);
        $match_object->urls_streaming = (object) [];
        foreach($urls as $k => $v){
            $match_object->urls_streaming->$k = $v;
        }
        // echo '<pre>';
        // // echo var_dump($match_object);
        // print_r($match_object);
        // echo "<br/>";
        // echo "<br/>";
        // echo "<br/>";

        return $match_object;
    }

}
?>
