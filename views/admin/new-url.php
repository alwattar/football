<?php require_once('include/header.php') ?>
<div class="adminpanel">
<?php require_once('include/sidebar.php') ?>
 <div class="mainbar">
     <div class="mainbarcontainer">
         <div class="row">
             
             <h1>روابط البث</h1>
<?php if($this->matches == false){ ?>
    <a href="<?php echo ADMIN_PATH ?>/new-match">الرجاء اضافة مباراة واحدة على الأقل حتى تستطيع إضافة روابط بث لها</a>
<?php }else{ ?>
    <form action="" method="post">
    <input name="url_name" type="text" placeholder="URL NAME"/><br/>
	<input name="url_href" type="text" placeholder="URL href"/><br/>
	<br/>
	URL channel:
	<br/>
	<select name="url_channel">
	    <?php foreach($this->channels as $ch){ ?>
		<option value="<?php echo $ch->chan_id ?>"><?php echo $ch->chan_name ?></option>
	    <?php } ?>
	</select>
	<br/>
	<br/>
	URL game (Match):
	<br/>
	<select name="url_game">
	    <?php foreach($this->matches as $math){ ?>
		<?php
		$team1 = $this->getTeam($math->mat_team1);
		$team2 = $this->getTeam($math->mat_team2);
		?>
		<option value="<?php echo $math->mat_id ?>"><?php echo $math->mat_time ?> <?php echo $team1['team'][$team1['p'] . '_name'] ?> ضد  <?php echo $team2['team'][$team2['p'] . '_name'] ?></option>
	    <?php } ?>
	</select>
	<br/>
	<select name="url_comm">
	    <?php foreach($this->comm as $com){ ?>
		<option value="<?php echo $com->comm_id ?>"><?php echo $com->comm_name ?></option>
	    <?php } ?>
	</select>
	<br/>
        <input name="url_lang" type="text" placeholder="اللغة"/><br/>
	<button>CREATE</button>
    </form>
<?php } ?>
<?php if($this->urls != false){ ?>
     <h1>جميع روابط البث</h1>
     <div class="table-responsive">
                 <table class="main-table table text-center">
                  <thead>
                    <tr>
                        <td>الرقم</td>
                        <td>عنوان الرابط</td>
                        <td>الرابط</td>
                        <td>المباراة </td>
                        <td>القناة</td>
                        <td>تحكم</td>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <td>الرقم</td>
                        <td>عنوان الرابط</td>
                        <td>الرابط</td>
                        <td>المباراة </td>
                        <td>القناة</td>
                        <td>تحكم</td>
                    </tr>
                </tfoot>
                     <tbody>
                         <?php foreach($this->urls as $url){ ?>
             <tr>
             <td data-label='الرقم'> <?php echo $url->url_id ?> </td>
                 <td data-label='عنوان الرابط'> <?php echo $url->url_name ?> </td>
                 <td data-label='الرابط'> <?php echo $url->url_href ?> </td>
                 <td data-label='المباراة'>  <?php echo $url->mat_id ?> <?php echo $url->mat_time ?> <?php echo $url->mat_team1 ?> ضد <?php echo $url->mat_team2 ?></td>
                 <td data-label='القناة'> <?php echo $url->chan_name ?> </td>
                 <td data-label='تحكم'>
                     <a class="btn btn-success" href="<?php echo ADMIN_PATH ?>/new-url&do=edit&id=<?php echo $url->url_id ?>">تعديل</a>
	<a class="btn btn-danger" href="<?php echo ADMIN_PATH ?>/new-url&do=delete&id=<?php echo $url->url_id ?>">حذف</a></td>
            </tr>
    <?Php } ?>
                     </tbody>
                 </table>
             </div>
    
<?php } ?>
             
 
             
             
             
         </div></div></div>
</div>


<?php require_once('include/footer.php') ?>
