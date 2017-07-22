<?php require_once('include/header.php') ?>
<p><h1>Edit Transfer</h1></p>
<?php if($this->clubs == false){ ?>
    <a href="<?php echo ADMIN_PATH ?>/new-club">Please add one CLUB at LEAST before adding new transfer</a>
<?php }else{ ?>
    <form action="" method="post">
	<input name="mov_id" type="hidden" value="<?php echo $this->mov->mov_id ?>"/><br/>
	<input name="mov_pl" type="text" placeholder="Player name" value="<?php echo $this->mov->mov_pl ?>"/><br/>
	<input name="mov_sal" type="number" placeholder="sallary" value="<?php echo $this->mov->mov_sal ?>"/><br/>
	<?php $date = $this->timeInfo($this->mov->mov_date)['date'] ?>
	<input name="mov_date" class="ui-datepicker" type="text" placeholder="date" value="<?php echo $date ?>"/><br/>
	<br/>
	Club:
	<br/>
	<select name="mov_club">
	    <option value="<?php echo $this->mov->mov_club ?>"><?php echo $this->mov->cl_name ?></option>
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
