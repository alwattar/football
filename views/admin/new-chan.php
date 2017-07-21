<?php require_once('include/header.php') ?>

<br/>
<br/>
New channel
<br/>
<br/>
<form action="" method="post">
    <input name="chan_name" type="text" placeholder="Channel Name"/><br/>
    <input name="chan_lang" type="text" placeholder="Channel lang"/><br/>
    <input name="chan_logo" id="chan-logo" type="text" size="42"placeholder="Channel Logo Url"/> <span onclick="finderPopup('chan-logo')" id="">Select logo</span>
    <br/>
    <br/>
    <button>CREATE</button>
</form>
<?php require_once('include/footer.php') ?>
