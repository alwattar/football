<?php require_once('include/header.php') ?>
<p><h1>EDIT MATCH</h1></p>
<form action="" method="post">
    <input name="mat_id" type="hidden" value="<?php echo $this->mat->mat_id ?>"/> <br/>
    <input name="mat_name" type="text" placeholder="match name" value="<?php echo $this->mat->mat_name ?>"/> <br/>
    Match status
    <select name="mat_status">
	<option value="<?php echo $this->mat->mat_status ?>"><?php echo $this->matStatus($this->mat->mat_status) ?></option>
	<option value="0">Not started yet</option>
	<option value="1">Started</option>
	<option value="2">Finished</option>
    </select>
    <br/>
    <?php
    $timeInfo = $this->timeInfo($this->mat->mat_time);
    $date = $timeInfo['date'];
    $h = $timeInfo['h'];
    $m = $timeInfo['m'];
    ?>
    <input name="mat_time" class="ui-datepicker" type="text" placeholder="mat date" value="<?php echo $date ?>"/> at hour
    <select name="mat_h">
	<option value="<?php echo $h ?>"><?php echo $h ?></option>
	<?php for($i = 1;  $i <= 23; $i++){?>
	    <option value="<?php echo str_pad($i, 2, '0', STR_PAD_LEFT) ?>"><?php echo str_pad($i, 2, '0', STR_PAD_LEFT) ?></option>
	<?php } ?>
    </select>
    and
    <select name="mat_m">
	<option value="<?php echo $m ?>"><?php echo $m ?></option>
	<?php for($i = 0;  $i < 60; $i++){?>
	    <option value="<?php echo str_pad($i, 2, '0', STR_PAD_LEFT) ?>"><?php echo str_pad($i, 2, '0', STR_PAD_LEFT) ?></option>
	<?php } ?>
    </select>
    minutes <br/>
    <input name="mat_team1" type="text" placeholder="Team 1" value="<?php echo $this->mat->mat_team1 ?>"/> <br/>
    <input name="mat_team2" type="text" placeholder="Team 2" value="<?php echo $this->mat->mat_team2 ?>"/> <br/>
    <input name="mat_address" type="text" placeholder="Match address" value="<?php echo $this->mat->mat_address ?>"/> <br/>
    <input name="mat_lang" type="text" placeholder="Match Lang" value="<?php echo $this->mat->mat_lang ?>"/> <br/>
    <textarea name="mat_note" type="text" placeholder="Match note"><?php echo $this->mat->mat_note ?></textarea> <br/>
    Match channel
    <select name="mat_chan">
	<option value="<?php echo $this->mat->mat_chan ?>"><?php echo $this->mat->chan_name ?></option>
	<?php foreach($this->channels as $ch){ ?>
	    <option value="<?php echo $ch->chan_id ?>"><?php echo $ch->chan_name ?></option>
	<?php } ?>
    </select>
    <br/>
    Match commentor
    <select name="mat_comm">
	<option value="<?php echo $this->mat->mat_comm ?>"><?php echo $this->mat->comm_name ?></option>
	<?php foreach($this->commentors as $com){ ?>
	    <option value="<?php echo $com->comm_id ?>"><?php echo $com->comm_name ?></option>
	<?php } ?>
    </select>
    <br/>
    Match champ
    <select name="mat_champ">
	<option value="<?php echo $this->mat->mat_champ ?>"><?php echo $this->mat->champ_name ?></option>
	<?php foreach($this->champs as $champ){ ?>
	    <option value="<?php echo $champ->champ_id ?>"><?php echo $champ->champ_name ?></option>
	<?php } ?>
    </select>
    <br/>
    <br/>
    <button>SAVE</button>
</form>
<?php require_once('include/footer.php') ?>
