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
		    <div class="table-responsive">
                 <table class="main-table table text-center">
                  <thead>
                    <tr>
                        <td>الرقم</td>
                        <td>اسم الفريق الأول</td>
                        <td>اهداف الفريق الأول</td>
                        <td>اسم الفريق الثاني</td>
                        <td>اهداف الفريق الثاني</td>
                        <td>ملخص المباراة</td>
                        <td>ملخص الأهداف</td>
                        <td>تحكم</td>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                       <td>الرقم</td>
                        <td>اسم الفريق الأول</td>
                        <td>اهداف الفريق الأول</td>
                        <td>اسم الفريق الثاني</td>
                        <td>اهداف الفريق الثاني</td>
                        <td>ملخص المباراة</td>
                        <td>ملخص الأهداف</td>
                        <td>تحكم</td>
                    </tr>
                </tfoot>
                     <tbody>
                         <?php foreach($this->matches as $mat){ ?>
             <tr>
             <td data-label='الرقم'> <?php echo $mat->mat_id ?> </td>
                <td data-label='اسم الفريق الأول '> <?php echo $team->name ?> </td>
                 <td data-label='اهداف الفريق الأول '> <?php echo $mat->mat_team1_goal ?> </td>
                 <td data-label='اسم الفريق الثاني '> <?php echo $team->name ?> </td>
                 <td data-label='اهداف الفريق الثاني'> <?php echo $mat->mat_team2_goal ?> </td>
                 <td data-label='ملخص المباراة'> <?php echo $mat->mat_summ ?> </td>
                 <td data-label='ملخص الأهداف'> <?php echo $mat->mat_goals ?> </td>
                 <td data-label='تحكم'>
                     <a class="btn btn-success" href="<?php echo ADMIN_PATH ?>/new-match&do=edit&id=<?php echo $mat->mat_id ?>">تعديل</a>
	<a class="btn btn-danger" href="<?php echo ADMIN_PATH ?>/new-match&do=delete&id=<?php echo $mat->mat_id ?>">حذف</a></td>
            </tr>
    <?Php } ?>
                     </tbody>
                 </table>
             </div>
		    
		    
		    
		<?php } ?>
            </div>
	</div>
	
    </div>
    
    
    
</div>

<?php require_once('include/footer.php') ?>
