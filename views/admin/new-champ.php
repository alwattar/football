<?php require_once('include/header.php') ?>
<div class="adminpanel">
<?php require_once('include/sidebar.php') ?>
<div class="mainbar">
     <div class="mainbarcontainer">
         <div class="row">
             <h1>بطولات جديدة</h1>
<form action="" method="post">
    <input name="champ_name" type="text" placeholder="اسم البطولة"/><br/>
    <input name="champ_loc" type="text" placeholder="مكان البطولة"/><br/>
        
        
  <div  class="datetimepicker">
    <input class="add-on" data-format="yyyy/MM/dd hh:mm:ss" type="text" name="champ_date" placeholder="تاريخ البطولة" >
  </div>

        
    <input name="champ_logo" id="champ-logo" size="42" type="text" placeholder="champ logo"/> <span onclick="finderPopup('champ-logo')">Select logo</span> <br/>
    <button>انشاء</button>
</form>
<?php if($this->champs != false){ ?>
    <?php foreach($this->champs as $champ){ ?>
	Champ ID: <?php echo $champ->champ_id ?>
	<br/>
	Champ Name: <?php echo $champ->champ_name ?>
	<br/>
	Champ Location: <?php echo $champ->champ_loc ?>
	<br/>
	Champ Date: <?php echo $champ->champ_date ?>
	<br/>
	<a href="<?php echo ADMIN_PATH ?>/new-champ&do=edit&id=<?php echo $champ->champ_id ?>">Edit</a> |
	<a href="<?php echo ADMIN_PATH ?>/new-champ&do=delete&id=<?php echo $champ->champ_id ?>">DELETE</a>
	<br/>
	------------
	<br/>
    <?php  } ?>
<?php  } ?>
             
         </div></div></div>

<?php require_once('include/footer.php') ?>
