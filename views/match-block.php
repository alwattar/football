<?php if($this->matches != false && count($this->matches) > 0){ ?>
    <?php foreach($this->matches as $m){ ?>
	<div class="matchs-new">
	    <div>
		<div class="row text-center">
		    <div class="col-sm-5">
			
			<h4><?php echo $m->team1_name; ?></h4>
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
			<h4><?php echo $m->team2_name; ?></h4>
		    </div>
		</div>
		<ul>
		    <a href="">
			<li>
			    <span>البطولة</span>
			    <h5><?php echo $m->champ_name; ?></h5>
			</li>
		    </a>
		    <a href="">
			<li>
			    <span>المعلق</span>
			    <h5><?php echo $m->comm_name; ?></h5>
			</li>
		    </a>
		    <a href="">
			<li>
			    <span>القناة الناقلة</span>
			    <h5><?php echo $m->chan_name; ?></h5>
			</li>
		    </a>
		</ul>
		<center>
		    <?php if(time() > strtotime($m->mat_time) + (110 * 60)){ ?>
			<a href="<?php echo URL ?>/index/show-match?id=<?php echo $m->mat_id ?>"><h3>انتهت المباراة - مشاهدة النتائج</h3></a>
		    <?php }else if(time() < strtotime($m->mat_time)){ ?>
			<a><h3>لم تبدأ المباراة بعد</h3></a>
		    <?php }else{ ?>
			<a href="<?php echo URL ?>/index/show-match?id=<?php echo $m->mat_id ?>"><h3>شاهد الأن</h3></a>
		    <?php } ?>
		    </center>
		</div>
	    </div>
	<?php } ?>

<?php } ?>
