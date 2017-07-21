<?php require_once('include/header.php') ?>

<br/>
<br/>
New Champ
<br/>
<br/>
<form action="" method="post">
    <input name="champ_name" type="text" placeholder="champ Name"/><br/>
    <input name="champ_loc" type="text" placeholder="champ location"/><br/>
    <input name="champ_date" class="ui-datepicker" type="text" placeholder="champ date"/> at hour
    <select name="champ_h">
	<?php for($i = 1;  $i <= 23; $i++){?>
	    <option value="<?php echo str_pad($i, 2, '0', STR_PAD_LEFT) ?>"><?php echo str_pad($i, 2, '0', STR_PAD_LEFT) ?></option>
	<?php } ?>
    </select>
    and
    <select name="champ_m">
	<?php for($i = 0;  $i < 60; $i++){?>
	    <option value="<?php echo str_pad($i, 2, '0', STR_PAD_LEFT) ?>"><?php echo str_pad($i, 2, '0', STR_PAD_LEFT) ?></option>
	<?php } ?>
    </select>
    minutes <br/>
    
    <input name="champ_logo" id="champ-logo" size="42" type="text" placeholder="champ logo"/> <span onclick="finderPopup('champ-logo')">Select logo</span> <br/>
    <button>CREATE</button>
</form>
<?php require_once('include/footer.php') ?>
