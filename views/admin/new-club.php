<?php require_once('include/header.php') ?>
<p><h1>New club</h1></p>
<form action="" method="post">
    <input name="cl_name" type="text" placeholder="Club Name"/><br/>
    <input name="cl_country" type="text" placeholder="club country"/><br/>
    <input name="cl_logo" id="cl-logo" size="42" type="text" placeholder="Club logo"/> <span onclick="finderPopup('cl-logo')">Select logo</span> <br/>
    <button>CREATE</button>
</form>

<?php if($this->clubs != false){ ?>
    <p><h1>ALL Clubs</h1></p>
    <?php foreach($this->clubs as $cl){ ?>
	Club ID : <?php echo $cl->cl_id ?>
	<br/>
	Club Name : <?php echo $cl->cl_name ?>
	<br/>
	Club Country : <?php echo $cl->cl_country ?>
	<br/>
	<a href="<?php echo ADMIN_PATH ?>/new-club&do=edit&id=<?php echo $cl->cl_id ?>">Edit</a> |
	<a href="<?php echo ADMIN_PATH ?>/new-club&do=delete&id=<?php echo $cl->cl_id ?>">DELETE</a>
	<br/>
	-----------
        <br/>
    <?Php } ?>
<?php } ?>
<?php require_once('include/footer.php') ?>
