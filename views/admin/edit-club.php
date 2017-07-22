<?php require_once('include/header.php') ?>
<p><h1>Edit club</h1></p>
<form action="" method="post">
    <input name="cl_id" type="hidden" value="<?php echo $this->cl->cl_id ?>"/><br/>
    <input name="cl_name" type="text" placeholder="Club Name" value="<?php echo $this->cl->cl_name ?>"/><br/>
    <input name="cl_country" type="text" placeholder="club country" value="<?php echo $this->cl->cl_country ?>"/><br/>
    <input name="cl_logo" id="cl-logo" size="42" type="text" placeholder="Club logo" value="<?php echo $this->cl->cl_logo ?>"/> <span onclick="finderPopup('cl-logo')">Select logo</span> <br/>
    <button>SAVE</button>
</form>
<?php require_once('include/footer.php') ?>
