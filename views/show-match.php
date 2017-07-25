<?php include_once('header.php') ?>
<?php if(time() > strtotime($this->match->mat_time) + (110 * 60)){ ?>
    Matche Finished !!
<?php }else if(time() < strtotime($this->match->mat_time)){ ?>
    Not started yet
<?php }else{ ?>
    <div class="whole-site">
    <!--<div class="bg-team">        
	 </div>-->
    <div>
	<!-- <div class="bg-team"></div>-->
	<div class="row line">
	    <div class="col-sm-8"></div>
	    <div class="col-sm-4"></div>
	</div>
	<div class="row lang">
	    <div class="col-sm-3">
	        <ul>
	            <a><li>EN</li></a>
	            <a><li>AR</li></a>
	        </ul>
	    </div>
	    
	</div>
	
	<div class="row logoz">
            <div class="col-sm-6">
		<div class="row">
		    <div class="col-sm-2">
			الأخبار
		    </div>
		    <div class="col-sm-10">
			انتقال نيمار إلى باريس سانجرما ليس مؤكداً
		    </div>
		    
		</div>
		
            </div>
            <div class="col-sm-2"></div>
            <div class="col-sm-4">
		<img src=" <?php echo IMG_PATH ?>marma.png">
            </div>
	</div>
	<div class="row navbaro hidden-xs">
            <div class="col-sm-4">
                <ul>
		    <li>Home</li>
		    <li>Matches <i class="fa fa-sort-desc" aria-hidden="true"></i></li>
		    <li>About</li>
		    <li>Contact</li>
		    
                </ul>
            </div>
            <div class="col-sm-1">
		<img src="<?php echo IMG_PATH ?>arrow.png">
            </div>
            <div class="col-sm-3">
		
            </div>
            <div class="col-sm-4">
		<ul>
                    <li><i class="fa fa-facebook" aria-hidden="true"></i></li>
                    <li><i class="fa fa-twitter" aria-hidden="true"></i></li>
                    <li><i class="fa fa-youtube-play" aria-hidden="true"></i></li>
                    <li><i class="fa fa-instagram" aria-hidden="true"></i></li>
		</ul>
            </div>
            
	</div>
	<div class="cont-show">
	    <div class="row text-center" >
	        <div class="col-xs-3">جودة ضعيفة</div>
	        <div class="col-xs-3">جودة متوسطة</div>
	        <div class="col-xs-3">جودة عالية</div>
	        <div class="col-xs-3">جودة عالية جداً</div>
	    </div>
	    <div class="row">
	           <div class="col-xs-4">
	               <img src="<?php echo $this->match->team1_logo ?>">
	               <h4>VS</h4>
	               <img src="<?php echo $this->match->team2_logo ?>">
	           </div>
	           <div class="col-xs-8">
	               <h4>مشاهدة مباراة</h4>
	               <h4>
	               <span>
	               <?php echo $this->match->mat_team1 ?>
	                </span>
	               و 
	               <span>
	                   <?php echo $this->match->mat_team2 ?>
	               </span> بث مباشر</h4>
	           </div>
	           <div class="col-xs-12">
	                بث المباراة
	            </div>
	    </div>
	    
	</div>
	
    </div>
</div>


    <h1>URLS Of MATCH: </h1>

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
<div id="ref-player">
    <div class="row">
     <?php if($errMsg == ""){ ?>
     <div id="player"></div>
     <?php }else{ ?>
     <div id="the-error-msg">
     <?php echo $errMsg ?>
     </div>
     <?php } ?>
     
     </div>
     </div>
<?php include_once('footer.php') ?>
