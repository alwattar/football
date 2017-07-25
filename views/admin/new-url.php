<?php require_once('include/header.php') ?>
<div class="adminpanel">
<?php require_once('include/sidebar.php') ?>
 <div class="mainbar">
     <div class="mainbarcontainer">
         <div class="row">
             
             <h1>روابط البث</h1>
<?php if($this->matches == false){ ?>
    <a href="<?php echo ADMIN_PATH ?>/new-match">Please add one MATCH at LEAST before adding new URL</a>
<?php }else{ ?>
    <form action="" method="post">
    <input name="url_name" type="text" placeholder="URL NAME"/><br/>
	<input name="url_href" type="text" placeholder="URL href"/><br/>
	<br/>
	URL channel:
	<br/>
	<select name="url_channel">
	    <?php foreach($this->channels as $ch){ ?>
		<option value="<?php echo $ch->chan_id ?>"><?php echo $ch->chan_name ?></option>
	    <?php } ?>
	</select>
	<br/>
	<br/>
	URL game (Match):
	<br/>
	<select name="url_game">
	    <?php foreach($this->matches as $math){ ?>
		<?php
		$team1 = $this->getTeam($math->mat_team1);
		$team2 = $this->getTeam($math->mat_team2);
		?>
		<option value="<?php echo $math->mat_id ?>"><?php echo $math->mat_time ?> <?php echo $team1['team'][$team1['p'] . '_name'] ?> ضد  <?php echo $team2['team'][$team2['p'] . '_name'] ?></option>
	    <?php } ?>
	</select>
	<br/>
	<select name="url_comm">
	    <?php foreach($this->comm as $com){ ?>
		<option value="<?php echo $com->comm_id ?>"><?php echo $com->comm_name ?></option>
	    <?php } ?>
	</select>
	<br/>
	<button>CREATE</button>
    </form>
<?php } ?>
<?php if($this->urls != false){ ?>
    
    <?php foreach($this->urls as $url){ ?>
	Url #ID : <?php echo $url->url_id ?>
	<br/>
	Url NAME : <?php echo $url->url_name ?>
	<br/>
	Url Href : <?php echo $url->url_href ?>
	<br/>
	Url Game : <?php echo $url->mat_id ?> <?php echo $url->mat_time ?> <?php echo $url->mat_team1 ?> ضد <?php echo $url->mat_team2 ?>
	<br/>
	Url channel : <?php echo $url->chan_name ?>
	<br/>
	<a href="<?php echo ADMIN_PATH ?>/new-url&do=edit&id=<?php echo $url->url_id ?>">Edit</a> |
	<a href="<?php echo ADMIN_PATH ?>/new-url&do=delete&id=<?php echo $url->url_id ?>">DELETE</a>
	<br/>
	------------
	<br/>
    <?php } ?>
<?php } ?>

         </div></div></div>
</div>


<?php require_once('include/footer.php') ?>
