<?php include('include/header.php'); ?>
<br/>
<a href=".">home</a> | <a href="./new-new?all_news=1">show all news</a>
<br/>
<?php if(count($this->nsec) < 1){ die("Create section first <a href='". ADMIN_PATH ."/new-nsec'>Create New Section</a>"); } ?>
<p><h1>EDIT NEW</h1></p>
<form method="post">
    <div class="datetimepicker">
	new date <input class="add-on" data-format="yyyy-MM-dd" type="text" name="n_date" value="<?php echo $this->new->n_date ?>"/>
    </div>
    <br/>
    -------- <br/>
    new image <input id="n_img" name="n_img" type="text" value="<?php echo $this->new->n_img ?>"/> <span onclick="finderPopup('n_img')">browse</span> <br/>
    --------
    <br/>
    new section : 
    <select name="n_section">
	<option value="<?php echo $this->new->n_section ?>"><?php echo $this->new->ns_name ?> | <?php echo $this->new->ns_name_en ?> | <?php echo $this->new->ns_name_tr ?></option>
	<?php foreach($this->nsec as $sec ){ ?>
	    <?php if($sec->ns_id == $this->new->n_section) continue ?>
	    <option value="<?php echo $sec->ns_id ?>"><?php echo $sec->ns_name ?> | <?php echo $sec->ns_name_en ?> | <?php echo $sec->ns_name_tr ?></option>
	<?php } ?>
    </select>
    <a href='<?php echo ADMIN_PATH ?>/new-nsec'>Create New Section</a>
    <br/>
    --------
    <br/>
    ar title ( بدون تشكيل ): <input name="n_title_ar" type="text" value="<?php echo $this->new->n_title_ar ?>"/> | 
    en title : <input name="n_title_en" type="text" value="<?php echo $this->new->n_title_en ?>"/> | 
    tr title : <input name="n_title_tr" type="text" value="<?php echo $this->new->n_title_tr ?>"/>
    <p>AR desc</p><textarea cols="30" class="ckeditor" name="n_desc_ar" rows="10"><?php echo $this->new->n_title_ar ?></textarea>
    <p>---------</p>
    <p>EN desc</p><textarea cols="30" class="ckeditor" name="n_desc_en" rows="10"><?php echo $this->new->n_title_en ?></textarea>
    <p>---------</p>
    <p>TR desc</p><textarea cols="30" class="ckeditor" name="n_desc_tr" rows="10"><?php echo $this->new->n_title_tr ?></textarea>
    <br/>
    
    <button>SAVE</button>
</form>
<?php include('include/footer.php'); ?>
