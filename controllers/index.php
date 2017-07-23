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
            $final_matches = $this->getMatchesByDay($matches, $m_time);
            echo json_encode($final_matches);
        }

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

}
?>
