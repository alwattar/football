<?php require_once('include/header.php') ?>

<br/>
<br/>
New MATCH
<br/>
<br/>
<?php if($this->channels == false){ ?>
    <a href="<?php echo ADMIN_PATH ?>/new-chan">Please add one CHANNEL at LEAST before adding new match</a>
<?php }else if($this->commentors == false){ ?>
    <a href="<?php echo ADMIN_PATH ?>/new-commentor">Please add one COMMENTOR at LEAST before adding new match</a>
<?php }else if($this->champs == false){ ?>
    <a href="<?php echo ADMIN_PATH ?>/new-champ">Please add one CHAMP at LEAST before adding new match</a>
<?php }else{ ?>
    <form action="" method="post">
	Match status
	<select name="mat_status">
	    <option value="0">Not started yet</option>
	    <option value="1">Started</option>
	    <option value="2">Finished</option>
	</select>
	<br/>
	<input name="mat_time" class="ui-datepicker" type="text" placeholder="mat date"/> at hour
	<select name="mat_h">
	    <?php for($i = 1;  $i <= 23; $i++){?>
		<option value="<?php echo str_pad($i, 2, '0', STR_PAD_LEFT) ?>"><?php echo str_pad($i, 2, '0', STR_PAD_LEFT) ?></option>
	    <?php } ?>
	</select>
	and
	<select name="mat_m">
	    <?php for($i = 0;  $i < 60; $i++){?>
		<option value="<?php echo str_pad($i, 2, '0', STR_PAD_LEFT) ?>"><?php echo str_pad($i, 2, '0', STR_PAD_LEFT) ?></option>
	    <?php } ?>
	</select>
	minutes <br/>
	<input name="mat_team1" type="text" placeholder="Team 1"/> <br/>
	<input name="mat_team2" type="text" placeholder="Team 2"/> <br/>
	<input name="mat_address" type="text" placeholder="Match address"/> <br/>
	<input name="mat_lang" type="text" placeholder="Match Lang"/> <br/>
	<textarea name="mat_note" type="text" placeholder="Match note"></textarea> <br/>
	Match channel
	<select name="mat_chan">
	    <?php foreach($this->channels as $ch){ ?>
		<option value="<?php echo $ch->chan_id ?>"><?php echo $ch->chan_name ?></option>
	    <?php } ?>
	</select>
	<br/>
	Match commentor
	<select name="mat_comm">
	    <?php foreach($this->commentors as $com){ ?>
		<option value="<?php echo $com->comm_id ?>"><?php echo $com->comm_name ?></option>
	    <?php } ?>
	</select>
	<br/>
	Match champ
	<select name="mat_champ">
	    <?php foreach($this->champs as $champ){ ?>
		<option value="<?php echo $champ->champ_id ?>"><?php echo $champ->champ_name ?></option>
	    <?php } ?>
	</select>
	<br/>
	<br/>
	<button>CREATE</button>
    </form>
<?php } ?>
<?php require_once('include/footer.php') ?>
