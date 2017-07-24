<?php include_once('header.php') ?>
<!-- ++++++++++++++++++++++++++++    m * s       m * s -->
<?php if(($this->match->mat_time +  intval((60 * 60) + (15 * 60))) <= time()){ ?>
    Matche Finished !!
<?php }else{ ?>
    CHAN_ID : <?php echo $this->match->mat_id ?> <br/>
    chan_NAME : <?php echo $this->match->chan_name ?> <br/>
    CHAN_LOGO : <?php echo $this->match->chan_logo ?> <br/>
    CHAN_LANG : <?php echo $this->match->chan_lang ?> <br/>
    MAT_ID : <?php echo $this->match->mat_id ?> <br/>
    MAT_TEAM1 : <?php echo $this->match->mat_team1 ?> <br/>
    MAT_TEAM2 : <?php echo $this->match->mat_team2 ?> <br/>
    MAT_TIME : <?php echo $this->match->mat_time ?> <br/>
    MAT_CHAMP : <?php echo $this->match->mat_champ ?> <br/>
    MAT_ADDRESS : <?php echo $this->match->mat_address ?> <br/>
    MAT_NOTE : <?php echo $this->match->mat_note ?> <br/>
    MAT_STATUS : <?php echo $this->match->mat_status ?> <br/>
    MAT_LANG : <?php echo $this->match->mat_lang ?> <br/>
    COMM_ID : <?php echo $this->match->comm_id ?> <br/>
    COMM_NAME : <?php echo $this->match->comm_name ?> <br/>
    COMM_COUNTRY : <?php echo $this->match->comm_country ?> <br/>
    COMM_CHAN : <?php echo $this->match->comm_chan ?> <br/>
    CHAMP_ID : <?php echo $this->match->champ_id ?> <br/>
    CHAMP_NAME : <?php echo $this->match->champ_name ?> <br/>
    CHAMP_LOC : <?php echo $this->match->champ_loc ?> <br/>
    CHAMP_LOGO : <?php echo $this->match->champ_logo ?> <br/>
    CHAMP_DATE : <?php echo $this->match->champ_date ?> <br/>
    TEAM1_NAME : <?php echo $this->match->team1_name ?> <br/>
    TEAM1_LOGO : <?php echo $this->match->team1_logo ?> <br/>
    TEAM2_NAME : <?php echo $this->match->team2_name ?> <br/>
    TEAM2_LOGO  : <?php echo $this->match->team2_logo  ?> <br/>

    <p><h1>URLS Of MATCH: </h1></p>

    <?php foreach($this->match->urls_streaming as $m_url){ ?>
	URL_ID : <?php echo $m_url->url_id ?> <br/>
	URL_HREF : <span data-surl="<?php echo $m_url->url_href ?>" class="change-s-url"><?php echo $m_url->url_href ?></span> <br/>
	URL_CHANNEL_ID : <?php echo $m_url->url_channel ?> <br/>
	URL_COMM_ID : <?php echo $m_url->url_comm ?> <br/>
	URL_GAME_ID : <?php echo $m_url->url_game ?> <br/>
	URL_CHANNEL_NAME : <?php echo $m_url->chan_name ?> <br/>
	URL_COMM_NAME : <?php echo $m_url->comm_name ?> <br/>
	URL_CHANNEL_LANG : <?php echo $m_url->chan_lang ?> <br/>
	------------
	<br/>
    <?php } ?>
<?php } ?>
<div id="ref-player"></div>
<?php include_once('footer.php') ?>
