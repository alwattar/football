<?php require_once('include/header.php') ?>
<p><h1>New Transfer</h1></p>
<?php if($this->clubs == false){ ?>
    <a href="<?php echo ADMIN_PATH ?>/new-club">Please add one CLUB at LEAST before adding new transfer</a>
<?php }else{ ?>
    <form action="" method="post">
	<input name="mov_pl" type="text" placeholder="Player name"/><br/>
	<input name="mov_sal" type="number" placeholder="sallary"/><br/>
	<input name="mov_date" class="ui-datepicker" type="text" placeholder="date"/><br/>
	<br/>
	Club:
	<br/>
	<select name="mov_club">
	    <?php foreach($this->clubs as $cl){ ?>
		<option value="<?php echo $cl->cl_id ?>"><?php echo $cl->cl_name ?></option>
	    <?php } ?>
	</select>
	<br/>
	<br/>
	<button>CREATE</button>
    </form>
<?php } ?>
<?php if($this->mov != false){ ?>
    <?php foreach($this->mov as $mov){ ?>
	Transfer ID: <?php echo $mov->mov_id ?>
	<br/>
	Transfer Player: <?php echo $mov->mov_pl ?>
	<br/>
	Transfer Club: <?php echo $mov->cl_name ?>
	<br/>
	<?php $date = $this->timeInfo($mov->mov_date)['date'] ?>
	Transfer date: <?php echo $date ?>
	<br/>
	<a href="<?php echo ADMIN_PATH ?>/new-transfer&do=edit&id=<?php echo $mov->mov_id ?>">Edit</a> |
	<a href="<?php echo ADMIN_PATH ?>/new-transfer&do=delete&id=<?php echo $mov->mov_id ?>">DELETE</a>
	<br/>
	----------
	<br/>
    <?php } ?>
<?php } ?>
<?php require_once('include/footer.php') ?>
