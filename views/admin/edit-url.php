<?php require_once('include/header.php') ?>
<p><h1>New URL</h1></p>
<?php if($this->matches == false){ ?>
    <a href="<?php echo ADMIN_PATH ?>/new-match">Please add one MATCH at LEAST before adding new URL</a>
<?php }else{ ?>
    <form action="" method="post">
	<input name="url_id" type="hidden" value="<?php echo $this->url->url_id ?>"/><br/>
	<input name="url_href" type="text" placeholder="URL href" value="<?php echo $this->url->url_href ?>"/><br/>
	<br/>
	URL channel:
	<br/>
	<select name="url_channel">
	    <option value="<?php echo $this->url->url_channel ?>"><?php echo $this->url->chan_name ?></option>
	    <?php foreach($this->channels as $ch){ ?>
		<option value="<?php echo $ch->chan_id ?>"><?php echo $ch->chan_name ?></option>
	    <?php } ?>
	</select>
	<br/>
	<br/>
	URL game (Match):
	<br/>
	<select name="url_game">
	    <option value="<?php echo $this->url->url_game ?>"><?php echo $this->url->mat_name ?></option>
	    <?php foreach($this->matches as $math){ ?>
		<option value="<?php echo $math->mat_id ?>"><?php echo $math->mat_name ?></option>
	    <?php } ?>
	</select>
	<br/>
	<br/>
	<button>SAVE</button>
    </form>
<?php } ?>
<?php require_once('include/footer.php') ?>
