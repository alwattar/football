<?php require_once('include/header.php') ?>

<br/>
<br/>
New Transfer
<br/>
<br/>
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
<?php require_once('include/footer.php') ?>
