<?php require_once('include/header.php') ?>
<div class="adminpanel">
<?php require_once('include/sidebar.php') ?>
<div class="mainbar">
	<div class="mainbarcontainer">
            <div class="row">
            
            <h1>تعديل المباراة</h1>
<form action="" method="post">
    <input name="mat_id" type="hidden" value="<?php echo $this->mat->mat_id ?>"/> <br/>
    <br/>
    <div  class="datetimepicker">
	<input class="add-on" data-format="yyyy/MM/dd hh:mm:ss" type="text" name="mat_time"  value="<?php echo $this->mat->mat_time ?>" >
    </div>
    
    <br/>
    <?php
    $t1i = $this->getTeam($this->mat->mat_team1);
    $t2i = $this->getTeam($this->mat->mat_team2);
    
    ?>
    <select name="mat_team1">
	<option value="<?php echo $t1i['team'][$t1i['p'] . '_id'] . '_' . $t1i['p'][0] ?>"><?php echo $t1i['team'][$t1i['p'] . "_name"] ?></option>
	<?php foreach($this->teams as $team){ $team = (object) $team; ?>
	    <option value="<?php echo $team->id ?>"><?php echo $team->name ?></option>
	<?php } ?>
    </select>
    <br/>
    <select name="mat_team2">
	<option value="<?php echo $t2i['team'][$t2i['p'] . '_id'] . '_' . $t2i['p'][0] ?>"><?php echo $t2i['team'][$t2i['p'] . "_name"] ?></option>
	<?php foreach($this->teams as $team){ $team = (object) $team; ?>
	    <option value="<?php echo $team->id ?>"><?php echo $team->name ?></option>
	<?php } ?>
    </select>
    <br/>
    <input name="mat_address" type="text" placeholder="مكان المباراة" value="<?php echo $this->mat->mat_address ?>"/> <br/>
    <textarea name="mat_note" type="text" placeholder="الملاحاظات"><?php echo $this->mat->mat_note ?></textarea> <br/>
    Match champ
    <select name="mat_champ">
	<option value="<?php echo $this->mat->mat_champ ?>"><?php echo $this->mat->champ_name ?></option>
	<?php foreach($this->champs as $champ){ ?>
	    <option value="<?php echo $champ->champ_id ?>"><?php echo $champ->champ_name ?></option>
	<?php } ?>
    </select>
    <br/>
    <input name="mat_team1_goal" value="<?php echo $this->mat->mat_team1_goal ?>" type="text" placeholder="أهداف الفريق الأول"/> 
    <br/>
    <input name="mat_team2_goal" value="<?php echo $this->mat->mat_team2_goal ?>" type="text" placeholder="أهداف الفريق الثاني"/> 
    <br/>
    <input name="mat_summ" value="<?php echo $this->mat->mat_summ ?>" type="text" placeholder="ملخص المباراة"/> 
    <br/>
    <input name="mat_goals" value="<?php echo $this->mat->mat_goals ?>" type="text" placeholder="ملخص الأهداف"/> 
    <br/>
    <button>حفظ</button>
</form>
            
        </div></div></div>

<?php require_once('include/footer.php') ?>
