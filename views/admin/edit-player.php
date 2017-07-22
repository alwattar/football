<?php require_once('include/header.php') ?>
<p><h1>Edit Player</h1></p>
<?php if($this->clubs == false){ ?>
    <a href="<?php echo ADMIN_PATH ?>/new-club">Please add one CLUB at LEAST before adding new Player</a>
<?php }else{ ?>
    <form action="" method="post">
	<input name="pl_id" type="hidden" value="<?php echo $this->pl->pl_id ?>"/><br/>
	<input name="pl_name" type="text" placeholder="Player name" value="<?php echo $this->pl->pl_name ?>"/><br/>
	<input name="pl_nat" type="text" placeholder="player nat" value="<?php echo $this->pl->pl_nat ?>"/><br/>
	<input name="pl_leng" type="number" placeholder="player length" value="<?php echo $this->pl->pl_leng ?>"/><br/>
	<input name="pl_chanum" type="number" placeholder="player champs number" value="<?php echo $this->pl->pl_chanum ?>"/><br/>
	<input name="pl_goals" type="number" placeholder="player goals number" value="<?php echo $this->pl->pl_goals ?>"/><br/>
	<br/>
	Club:
	<br/>
	<select name="pl_curclub">
	    <option value="<?php echo $this->pl->pl_curclub ?>"><?php echo $this->pl->cl_name ?></option>
	    <?php foreach($this->clubs as $cl){ ?>
		<option value="<?php echo $cl->cl_id ?>"><?php echo $cl->cl_name ?></option>
	    <?php } ?>
	</select>
	<br/>
	<br/>
	<button>SAVE</button>
    </form>
<?php } ?>
<?php require_once('include/footer.php') ?>
