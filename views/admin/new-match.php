<?php require_once('include/header.php') ?>
<div class="adminpanel">
    <?php require_once('include/sidebar.php') ?>
    <div class="mainbar">
	<div class="mainbarcontainer">
            <div class="row">
		<h1>المباريات</h1>
		<?php if($this->champs == false){ ?>
		    <a href="<?php echo ADMIN_PATH ?>/new-champ">الرجاء ادخال بطولة واحدة على الأقل قبل البدء بعملية إدخال مباراة</a>
		<?php }else{ ?>
		    <form action="" method="post">
			<div  class="datetimepicker">
			    <input class="add-on" data-format="yyyy/MM/dd hh:mm:ss" type="text" name="mat_time" placeholder="تاريخ المباراة" >
			</div>
			<br/>
			<select name="mat_team1">
			    <?php foreach($this->teams as $team){ $team = (object) $team; ?>
				<option value="<?php echo $team->id ?>"><?php echo $team->name ?></option>
			    <?php } ?>
			</select>
			<br/>
			<select name="mat_team2">
			    <?php foreach($this->teams as $team){ $team = (object) $team; ?>
				<option value="<?php echo $team->id ?>"><?php echo $team->name ?></option>
			    <?php } ?>
			</select>
			<br/>
			<input name="mat_address" type="text" placeholder="مكان المباراة"/> <br/>
			<textarea  name="mat_note" type="text" placeholder="ملاحظات المباراة"></textarea> <br/>
			
			البطولة
			<select name="mat_champ">
			    <?php foreach($this->champs as $champ){ ?>
				<option value="<?php echo $champ->champ_id ?>"><?php echo $champ->champ_name ?></option>
			    <?php } ?>
			</select>
			<br/>
			<br/>
			<button>انشاء</button>
		    </form>
		<?php } ?>

		<?php if($this->matches != false){ ?>
		    <h1>جميع المباريات</h1>
		    <?php foreach($this->matches as $mat){ ?>
			Match ID: <?php echo $mat->mat_id ?>
			<br/>
			
			<br/>
			Match status: <?php echo $this->matStatus($mat->mat_status) ?>
			<br/>
			TEAM1 Goals: <?php echo $mat->mat_team1_goal ?>
			<br/>
			TEAM2 Goals: <?php echo $mat->mat_team1_goal ?>
			<br/>
			mat_summ: <?php echo $mat->mat_summ ?>
			<br/>
			mat_goals: <?php echo $mat->mat_goals ?>
			<br/>
			<a href="<?php echo ADMIN_PATH ?>/new-match&do=edit&id=<?php echo $mat->mat_id ?>">Edit</a> |
			<a href="<?php echo ADMIN_PATH ?>/new-match&do=delete&id=<?php echo $mat->mat_id ?>">DELETE</a>
			<br/>
			------------
			<br/>
		    <?php } ?>
		<?php } ?>
            </div>
	</div>
	
    </div>
    
    
    
</div>

<?php require_once('include/footer.php') ?>
