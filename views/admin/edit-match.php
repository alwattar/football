<?php require_once('include/header.php') ?>
<div class="adminpanel">
<?php require_once('include/sidebar.php') ?>
<div class="mainbar">
	<div class="mainbarcontainer">
            <div class="row">
            
            <h1>EDIT MATCH</h1>
<form action="" method="post">
    <input name="mat_id" type="hidden" value="<?php echo $this->mat->mat_id ?>"/> <br/>
    
    Match status
    <select name="mat_status">
	<option value="<?php echo $this->mat->mat_status ?>"><?php echo $this->matStatus($this->mat->mat_status) ?></option>
	<option value="0">Not started yet</option>
	<option value="1">Started</option>
	<option value="2">Finished</option>
    </select>
    <br/>
    <div  class="datetimepicker">
			    <input class="add-on" data-format="yyyy/MM/dd hh:mm:ss" type="text" name="mat_time"  value="<?php echo $team->time ?>" >
    </div>
    
    <br/>
    <select name="mat_team1">
	<?php foreach($this->teams as $team){ $team = (object) $team; ?>
	    <option value="<?php echo $team->id ?>"><?php echo $team->name ?></option>
	<?php } ?>
    </select>
    <br/>
    <select name="mat_team2">
	<?php foreach($this->teams as $team){ $team = (object) $team; ?>
	    <option value="<?php echo $team->id ?>"><?php echo $team->name ?></option>
	<?php } ?>
    </select>
    <br/>
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
    <input name="mat_team1_goal" value="<?php echo $this->mat->mat_team1_goal ?>" type="text" placeholder="نتائج الفريق الأول"/> 
    <br/>
    <input name="mat_team2_goal" value="<?php echo $this->mat->mat_team2_goal ?>" type="text" placeholder="نتائج الفريق الثاني"/> 
    <br/>
    <input name="mat_summ" value="<?php echo $this->mat->mat_summ ?>" type="text" placeholder="ملخص المباراة"/> 
    <br/>
    <input name="mat_goals" value="<?php echo $this->mat->mat_goals ?>" type="text" placeholder="ملخص الأهداف"/> 
    <br/>
    <button>SAVE</button>
</form>
            
        </div></div></div>

<?php require_once('include/footer.php') ?>
