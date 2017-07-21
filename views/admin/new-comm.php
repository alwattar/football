<?php require_once('include/header.php') ?>

<br/>
<br/>
New commentor
<br/>
<br/>
<form action="" method="post">
    <?php if($this->channels == false){ ?>
	<a href="<?php echo ADMIN_PATH ?>/new-chan">Please add channel first</a>
    <?php }else{ ?>
	<input name="comm_name" type="text" placeholder="Commentor Name"/><br/>
	<input name="comm_country" type="text" placeholder="Commentor lang"/><br/>

	Commentor Channel
	<br/>	
	<select name="comm_chan">
	    <?php foreach($this->channels as $c){ ?>
		<option value="<?php echo $c->chan_id ?>"><?php echo $c->chan_name ?></option>
	    <?php } ?>
	</select>
	<br/>
	<br/>
	<button>CREATE</button>
    <?php } ?>
</form>
<?php require_once('include/footer.php') ?>
