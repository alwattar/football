<?php require_once('include/header.php') ?>
<div class="adminpanel">
<?php require_once('include/sidebar.php') ?>
<div class="mainbar">
     <div class="mainbarcontainer">
         <div class="row">
             
             <h1>لاعب جديد</h1>
<?php if($this->clubs == false){ ?>
    <a href="<?php echo ADMIN_PATH ?>/new-club">Please add one CLUB at LEAST before adding new Player</a>
<?php }else{ ?>
    <form action="" method="post">
	<input name="pl_name" type="text" placeholder="اسم اللاعب"/><br/>
	<input name="pl_nat" type="text" placeholder="جنسية اللاعب"/><br/>
	<input name="pl_leng" type="number" placeholder="player length"/><br/>
	<input name="pl_chanum" type="number" placeholder="عدد البطولات"/><br/>
	<input name="pl_goals" type="number" placeholder="عدد الاهداف المحققة"/><br/>
	<br/>
	النادي:
	<br/>
	<select name="pl_curclub">
	    <?php foreach($this->clubs as $cl){ ?>
		<option value="<?php echo $cl->cl_id ?>"><?php echo $cl->cl_name ?></option>
	    <?php } ?>
	</select>
	<br/>
	<br/>
	<button>CREATE</button>
    </form>
<?php } ?>
<?php if($this->players != false){ ?>
    <?php foreach($this->players as $pl){ ?>
	Player Id: <?php echo $pl->pl_id ?>
	<br/>
	Player Name: <?php echo $pl->pl_name ?>
	<br/>
	Player Club: <?php echo $pl->cl_name ?>
	<br/>
	Player nat:  <?php echo $pl->pl_nat ?>
	<br/>
	Player length:  <?php echo $pl->pl_leng ?>
	<br/>
	Player goals:  <?php echo $pl->pl_goals ?>
	<br/>
	Player champs:  <?php echo $pl->pl_chanum ?>
	<br/>
 	<a href="<?php echo ADMIN_PATH ?>/new-player&do=edit&id=<?php echo $pl->pl_id ?>">Edit</a> |
	<a href="<?php echo ADMIN_PATH ?>/new-player&do=delete&id=<?php echo $pl->pl_id ?>">DELETE</a>
	<br/>
	--------
	<br/>
    <?php  } ?>
<?php  } ?>
         </div></div></div>

<?php require_once('include/footer.php') ?>
