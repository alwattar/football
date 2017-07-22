<?php require_once('include/header.php') ?>
<p><h1>New Channel: </h1></p>
<form action="" method="post">
    <input name="chan_name" type="text" placeholder="Channel Name"/><br/>
    <input name="chan_lang" type="text" placeholder="Channel lang"/><br/>
    <input name="chan_logo" id="chan-logo" type="text" size="42" placeholder="Channel Logo Url"/> <span onclick="finderPopup('chan-logo')" id="">Select logo</span>
    <br/>
    <br/>
    <button>CREATE</button>
</form>

<?php if($this->channels != false){ ?>
    <p><h1>All Channels: </h1></p>
    <?php foreach($this->channels as $ch){ ?>
	---------------------
	<form name="edit-chan" method="post">
	    <input name="chan_edit" type="hidden" value="chan_edit"/>
	    <input name="chan_id" type="hidden" value="<?php echo $ch->chan_id ?>"/><br/>
	    <input name="chan_name" type="text" placeholder="Channel Name" value="<?php echo $ch->chan_name ?>"/><br/>
	    <input name="chan_lang" type="text" placeholder="Channel lang" value="<?php echo $ch->chan_lang ?>"/><br/>
	    <input name="chan_logo" id="chan-logo<?php echo $ch->chan_id ?>" type="text" size="42" placeholder="Channel Logo Url" value="<?php echo $ch->chan_logo ?>"/> <span onclick="finderPopup('chan-logo<?php echo $ch->chan_id ?>')" id="">Select logo</span>
	    <br/>
	    <br/>
	    <button>Save</button> | <a href="<?php echo ADMIN_PATH ?>/new-chan&del=<?php echo $ch->chan_id ?>">DELETE</a>
	</form>
    <?php } ?>
<?php } ?>
<?php require_once('include/footer.php') ?>
