
<?php include 'header.php' ?>
<div class="whole-site">
    <!--<div class="bg-team">        
	 </div>-->
    <div >
	<!-- <div class="bg-team"></div>-->
	<?php include 'navbar.php' ?>

	<?php $summ = $this->getWLD($this->match); ?>
	<div class="cont-show">
	    <div class="row text-center" >
		<div class="col-xs-6 change-s-url active-streaming" data-surl="<?php echo $this->match->mat_goals ?>" data-title="الاهداف">
		    <i class="lololo fa fa-check-square-o"></i><div>الأهداف</div>
		</div>
		<div class="col-xs-6 change-s-url" data-surl="<?php echo $this->match->mat_summ ?>" data-title="ملخص المباراة">
		    <i></i><div>ملخص المباراة</div>
		</div>
	    </div>
	    <div class="row">
	        <div class="col-xs-4">
	            <div class="col-sm-4"><img src="<?php echo $this->match->team1_logo ?>"></div>
	            <div class="col-sm-4"><h4>VS</h4></div>
	            <div class="col-sm-4"><img src="<?php echo $this->match->team2_logo ?>"></div>
	            
	            <div class="col-sm-12"><h5>2017/07/16</h5></div>
		    
		    
		    
		    
	        </div>
	        <div class="col-xs-8">
		    <h4>مشاهدة ملخص وأهداف</h4>
		    <h4>
			<span>
			    <?php echo $this->match->team1_name ?>
	                </span>
			و 
			<span>
			    <?php echo $this->match->team2_name ?>
			</span>
			
		    </h4>
		    <h4>انتهت المباراة</h4>
		    <br>
		    <br>
		    <?php if($summ['status'] != 'draw'){ ?>
			<h4>
			    بفوز
			    <span>
				<?php echo $summ['winner'] ?>
			    </span>
			    على
			    <span>
				<?php echo $summ['loser'] ?>
			    </span>
			    
			    <span><?php echo $summ['winner_goals'] ?> - <?php echo $summ['loser_goals'] ?></span>
			</h4>
		    <?php }else{ ?>
			<center>
			    <h4>
				تعادل : 
				<?php echo $summ['goals'] ?> - <?php echo $summ['goals'] ?>
			    </h4>
			</center>
		    <?php } ?>
	        </div>
	        <div class="col-xs-12">
		    <h2 id="vid-title-summ">الاهداف</h2> 
		    <div id="ref-player">
			
			<div id="player"></div>
			<script>
			 var player = jwplayer('player').setup({
			     width: "100%",
			     height: "480",
			     autostart: true,
			     file: "<?php echo $this->match->mat_goals ?>"
			 });
			</script>
			
			
			<div class="row">
			    
			    <div id="player"></div>
			    
			</div>
		    </div>
	            
	        </div>
	    </div>
	    
	</div>



	<br><br><br><br><br>
	<?php include 'footer.php' ?>
    </div>
    
</div>
<?php // $this->match->mat_id ?>



<?php  //$this->match->mat_summ ?>

<?php // print_r($this->match) ?>

