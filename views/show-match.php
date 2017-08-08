<?php include_once('header.php') ?>
<?php 
$this->match->urls_streaming = (array) $this->match->urls_streaming;
$urlscount = count($this->match->urls_streaming);
?>

<?php if(time() > strtotime($this->match->mat_time) + (110 * 60)){ ?>
    Matche Finished !!
    <?php/* }else if(time() < strtotime($this->match->mat_time)){ */?>
    <h2>Not started yet</h2>
<?php }else{ ?>
    <?php include_once('survey.php') ?>
    <div class="whole-site">
	<!--<div class="bg-team">        
	     </div>-->
	<div>
	    
	    <!-- <div class="bg-team"></div>-->
	    <?php include_once('navbar.php') ?>
	    
            <div class="cont-show">
		<div class="row text-center" >
		    <?php $m_status = $this->getMatchStatus($this->match->mat_time); ?>
		    <?php if($m_status === 2){ ?>
			<?php foreach($this->match->urls_streaming as $k => $m_url){ ?>
			    <div class="col-xs-<?php echo'12'/$urlscount ?> change-s-url <?php echo ($k == 0) ? 'active-streaming' : '' ?>" data-surl="<?php echo $m_url->url_href ?>">
				<i></i><div><?php echo $m_url->url_name ?></div>
			    </div>
			<?php } ?>
		    <?php } ?>
		</div>
		<div class="row">
	            <div class="col-xs-4">
			<div class="col-sm-4"><img src="<?php echo $this->match->team1_logo ?>"></div>
			<div class="col-sm-4"><h4>VS</h4></div>
			<div class="col-sm-4"><img src="<?php echo $this->match->team2_logo ?>"></div>
	            	
	            </div>
	            <div class="col-xs-8">
			<h4>مشاهدة مباراة</h4>
			<h4>
			    <span>
				<?php echo $this->match->team1_name ?>
	                    </span>
			    و 
			    <span>
				<?php echo $this->match->team2_name ?>
			    </span> بث مباشر</h4>
	            </div>
	            <div class="col-xs-12">
			<?php if($m_status === 2){ ?>
			    <h2>بث المباراة</h2>
			<?php }else{ ?>
			    <?php $mat_sec = strtotime($this->match->mat_time) - time(); ?>
			    <h2 id="mat-sec" style="display:none;"><?php echo $mat_sec; ?></h2>
			    <h2 id="mat-cd"></h2>
			<?php } ?>
			<div id="ref-player">
			    <?php if($m_status === 2){ ?>
				<?php foreach($this->match->urls_streaming as $url){ ?>
				    <div id="player"></div>
				    <script>
				     var player = jwplayer('player').setup({
					 width: "100%",
					 height: "480",
					 autostart: true,
					 file: "<?php  echo $url->url_href ?>"
				     });
				    </script>
				    <?php break;?>
				<?php } ?>
			    <?php } ?>
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
	                
	            </div>
		</div>
		
	    </div>
	    <?php include_once('footer.php') ?>
	</div>
    </div>
<?php } ?>

