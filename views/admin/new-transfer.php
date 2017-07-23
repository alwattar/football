
<?php require_once('include/header.php') ?>

<div class="adminpanel">
<?php require_once('include/sidebar.php') ?>
<div class="mainbar">
     <div class="mainbarcontainer">
         <div class="row">
             <h1>الانتقالات</h1>
<?php if($this->clubs == false){ ?>
    <a href="<?php echo ADMIN_PATH ?>/new-club">Please add one CLUB at LEAST before adding new transfer</a>
<?php }else{ ?>
    <form action="" method="post">
	<input name="mov_pl" type="text" placeholder="اسم اللاعب"/><br/>
	<input name="mov_sal" type="number" placeholder="الراتب"/><br/>
	
	<div  class="datetimepicker">
    <input class="add-on" data-format="yyyy/MM/dd hh:mm:ss" type="text" name="mov_date" placeholder="تاريخ الانتقال" >
  </div>
	
	النادي:
	<br/>
	<select name="mov_club">
	    <?php foreach($this->clubs as $cl){ ?>
		<option value="<?php echo $cl->cl_id ?>"><?php echo $cl->cl_name ?></option>
	    <?php } ?>
	</select>
	<br/>
	<br/>
	<button>إنشاء</button>
    </form>
<?php } ?>
<?php if($this->mov != false){ ?>
    <?php foreach($this->mov as $mov){ ?>
	Transfer ID: <?php echo $mov->mov_id ?>
	<br/>
	Transfer Player: <?php echo $mov->mov_pl ?>
	<br/>
	Transfer Club: <?php echo $mov->cl_name ?>
	<br/>
	<?php $date = $this->timeInfo($mov->mov_date)['date'] ?>
	Transfer date: <?php echo $date ?>
	<br/>
	<a href="<?php echo ADMIN_PATH ?>/new-transfer&do=edit&id=<?php echo $mov->mov_id ?>">Edit</a> |
	<a href="<?php echo ADMIN_PATH ?>/new-transfer&do=delete&id=<?php echo $mov->mov_id ?>">DELETE</a>
	<br/>
	----------
	<br/>
    <?php } ?>
<?php } ?>
         </div></div></div>

<?php require_once('include/footer.php') ?>
