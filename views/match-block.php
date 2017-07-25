<?php if($this->matches != false && count($this->matches) > 0){ ?>
    <div class="cont-body">
	<div class="row">
	    <?php foreach($this->matches as $m){ ?>
		<div class="matchs-new">
		    <div>
			<div class="row text-center">
			    <div class="col-sm-5">
				<h4><?php echo $m->team1_name; ?></h4>
				<img src="<?php echo $m->team1_logo; ?>">
			    </div>
			    <div class="col-sm-2">
				
				<h4><?php echo date('h:m A', strtotime($m->mat_time)); ?></h4>
			    </div>
			    <div class="col-sm-5">
				<img src="<?php echo $m->team2_logo; ?>">
				<h4><?php echo $m->team2_name; ?></h4>
			    </div>
			</div>
			<ul>
			    <a href="">
				<li>
				    <span>Champion</span>
				    <h5><?php echo $m->champ_name; ?></h5>
				</li>
			    </a>
			    <a href="">
				<li>
				    <span>Commentator</span>
				    <h5><?php echo $m->comm_name; ?></h5>
				</li>
			    </a>
			    <a href="">
				<li>
				    <span>Channels</span>
				    <h5><?php echo $m->chan_name; ?></h5>
				</li>
			    </a>
			</ul>

			<center>
			    <a href="<?php echo URL ?>/index/show-match?id=<?php echo $m->mat_id ?>"><h3>show match</h3></a>
			</center>
		    </div>
		</div>
	    <?php } ?>
	</div>
    </div>
<?php } ?>
