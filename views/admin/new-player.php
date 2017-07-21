<?php require_once('include/header.php') ?>

<br/>
<br/>
New Player
<br/>
<br/>
<?php if($this->clubs == false){ ?>
    <a href="<?php echo ADMIN_PATH ?>/new-club">Please add one CLUB at LEAST before adding new Player</a>
<?php }else{ ?>
    <form action="" method="post">
	<input name="pl_name" type="text" placeholder="Player name"/><br/>
	<input name="pl_nat" type="text" placeholder="player nat"/><br/>
	<input name="pl_leng" type="number" placeholder="player length"/><br/>
	<input name="pl_chanum" type="number" placeholder="player champs number"/><br/>
	<input name="pl_goals" type="number" placeholder="player goals number"/><br/>
	<br/>
	Club:
	<br/>
	<select name="pl_curclub">
	    <?php foreach($this->clubs as $cl){ ?>
		<option value="<?php echo $cl->cl_id ?>"><?php echo $cl->cl_name ?></option>
	    <?php } ?>
	</select>
	<br/>
	<br/>
	<button>CREATE</button>
    </form>
<?php } ?>
<?php require_once('include/footer.php') ?>
