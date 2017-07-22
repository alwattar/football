<?php require_once('include/header.php') ?>
<p><h1>Edit Champ</h1></p>
<form action="" method="post">
    <input name="champ_id" type="hidden" value="<?php echo $this->champ->champ_id ?>"/><br/>
    <input name="champ_name" type="text" placeholder="champ Name" value="<?php echo $this->champ->champ_name ?>"/><br/>
    <input name="champ_loc" type="text" placeholder="champ location" value="<?php echo $this->champ->champ_loc ?>"/><br/>
    <?php
    $d = explode(" ", $this->champ->champ_date);
    $d1 = explode('-', $d[0]);
    $time = explode(':', $d[1]);
    $date = $d1[1] . '/' . $d1[2] . '/' . $d1[0];
    $h = $time[0];
    $m = $time[1];
    ?>
    <br/>
    <input name="champ_date" class="ui-datepicker" type="text" placeholder="champ date" value="<?php echo $date ?>"/> at hour
    <select name="champ_h">
	<option value="<?php echo $h ?>"><?php echo $h ?></option>
	<?php for($i = 1;  $i <= 23; $i++){?>
	    <?php if($i == intval($h)) continue ?>
	    <option value="<?php echo str_pad($i, 2, '0', STR_PAD_LEFT) ?>"><?php echo str_pad($i, 2, '0', STR_PAD_LEFT) ?></option>
	<?php } ?>
    </select>
    and
    <select name="champ_m">
	<option value="<?php echo $m ?>"><?php echo $m ?></option>
	<?php for($i = 0;  $i < 60; $i++){?>
	    <?php if($i == intval($m)) continue ?>	    
	    <option value="<?php echo str_pad($i, 2, '0', STR_PAD_LEFT) ?>"><?php echo str_pad($i, 2, '0', STR_PAD_LEFT) ?></option>
	<?php } ?>
    </select>
    minutes <br/>
    
    <input name="champ_logo" id="champ-logo" size="42" type="text" placeholder="champ logo" value="<?php echo $this->champ->champ_logo ?>"/> <span onclick="finderPopup('champ-logo')">Select logo</span> <br/>
    <button>SAVE</button>
</form>
<?php require_once('include/footer.php') ?>
