<?php include 'header.php' ?>
<?php include 'survey.php' ?>

<div class="whole-site">
    <!--<div class="bg-team">        
	 </div>-->
    <div >
	<!-- <div class="bg-team"></div>-->
	<?php include 'navbar.php' ?>
	<div class=" cont-body container-fluid">
	    <div class="row">
	        <ul>
	            <a class="index-active">
			<li data-day="tomorrow" style="width:100%">
			    جميع المباريات
			</li>
		    </a>
	        </ul>
                <div class="matches-to-be-added" data-days="all">
		    <?php if($this->matches != false && count($this->matches) > 0){ ?>
			<?php foreach($this->matches as $m){ ?>
			    <div class="matchs-new">
				<div>
				    <div class="text-center">
					<div class="col-sm-5">
					    
					    <div>
						<h4><?php echo $m->team1_name; ?></h4>
					    </div>
					    <div>
						<img src="<?php echo $m->team1_logo; ?>">
					    </div>
					</div>
					<div class="col-sm-2">
					    <?php $m_status = $this->getMatchStatus($m->mat_time); ?>
					    <?php if($m_status === 0){ ?>
						<h4><?php echo $m->mat_team1_goal ?> - <?php echo $m->mat_team2_goal ?></h4>
					    <?php }else if($m_status === 2){ ?>
						<h4>جاري البث</h4>
					    <?php }else{ ?>
						<h4><?php echo date('h:i A', strtotime($m->mat_time)); ?></h4>
					    <?php } ?>
					</div>
					<div class="col-sm-5">
					    <div>
						<img src="<?php echo $m->team2_logo; ?>">
					    </div>
					    <div>
						<h4><?php echo $m->team2_name; ?></h4>
					    </div>
					</div>
				    </div>
				    
				    <div class="row text-center">
					<div class="col-sm-4"> <span>البطولة</span>
					    <h5><?php echo $m->champ_name; ?></h5></div>
					<div class="col-sm-4"><span>المعلق</span>
					    <h5><?php echo $m->comm_name; ?></h5></div>
					<div class="col-sm-4"><span>القناة الناقلة</span>
					    <h5><?php echo $m->chan_name; ?></h5></div>
				    </div>
				    
				    
				</div>
				<div class="match-hover">
				    <?php if(time() > strtotime($m->mat_time) + (110 * 60)){ ?>
					<a href="<?php echo URL ?>/index/show-match?id=<?php echo $m->mat_id ?>"><h3> شاهد الأهداف</h3></a>
				    <?php }else if(time() < strtotime($m->mat_time)){ ?>
					<a href="<?php echo URL ?>/index/show-match?id=<?php echo $m->mat_id ?>"><h3>لم تبدأ المباراة بعد</h3></a>
				    <?php }else{ ?>
					<a href="<?php echo URL ?>/index/show-match?id=<?php echo $m->mat_id ?>"><h3>شاهد الأن</h3></a>
				    <?php } ?>
				</div>
			    </div>
			<?php } ?>

		    <?php } ?>
		</div>
	    </div>
	</div>
	<?php include 'footer.php' ?>
    </div>
    
</div>
