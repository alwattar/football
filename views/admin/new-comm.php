<?php require_once('include/header.php') ?>
<div class="adminpanel">
<?php require_once('include/sidebar.php') ?>
<div class="mainbar">
     <div class="mainbarcontainer">
         <div class="row">
             <h1>معلق جديد</h1>
<?php if($this->channels == false){ ?>
    <a href="<?php echo ADMIN_PATH ?>/new-chan">Please add channel first</a>
<?php }else{ ?>
    <form action="" method="post">
	<input name="comm_name" type="text" placeholder="اسم المعلق"/><br/>
	<input name="comm_country" type="text" placeholder="لغة التعليق"/><br/>
	القناة 
	<br/>	
	<select name="comm_chan">
	    <?php foreach($this->channels as $c){ ?>
		<option value="<?php echo $c->chan_id ?>"><?php echo $c->chan_name ?></option>
	    <?php } ?>
	</select>
	<br/>
	<br/>
	<button>إنشاء </button>
    </form>
    <?php if($this->commentors != false){ ?>
	<h1>جميع المعلقين</h1>
	<?php foreach($this->commentors as $com){ ?>
	    ----------------
	    <form action="" method="post">
		<input name="comm_edit" type="hidden" value="comm_edit"/><br/>
		<input name="comm_id" type="hidden" value="<?php echo $com->comm_id ?>"/><br/>
		<input name="comm_name" type="text" value="<?php echo $com->comm_name ?>" placeholder="Commentor Name"/><br/>
		<input name="comm_country" type="text" value="<?php echo $com->comm_country ?>" placeholder="Commentor lang"/><br/>
		
		Commentor Channel
		<br/>	
		<select name="comm_chan">
		    <option value="<?php echo $com->comm_chan ?>"><?php echo $com->chan_name ?></option>
		    <?php foreach($this->channels as $c){ ?>
			<?php if($c->chan_id == $com->comm_chan) continue ?>
			<option value="<?php echo $c->chan_id ?>"><?php echo $c->chan_name ?></option>
		    <?php } ?>
		</select>
		<br/>
		<br/>
		<button>SAVE</button> | <a href="<?php echo ADMIN_PATH ?>/new-commentor&del=<?php echo $com->comm_id ?>">DELETE</a>
	    </form>
	<?php } ?>
    <?php } ?>
<?php } ?>
         </div></div></div>


<?php require_once('include/footer.php') ?>
