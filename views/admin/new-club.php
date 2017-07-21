<?php require_once('include/header.php') ?>

<br/>
<br/>
New club
<br/>
<br/>
<form action="" method="post">
    <input name="cl_name" type="text" placeholder="Club Name"/><br/>
    <input name="cl_country" type="text" placeholder="club country"/><br/>
    <input name="cl_logo" id="cl-logo" size="42" type="text" placeholder="Club logo"/> <span onclick="finderPopup('cl-logo')">Select logo</span> <br/>
    <button>CREATE</button>
</form>
<?php require_once('include/footer.php') ?>
