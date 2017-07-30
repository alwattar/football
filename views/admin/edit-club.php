<?php require_once('include/header.php') ?>
<div class="adminpanel">
<?php require_once('include/sidebar.php') ?>
    <div class="mainbar">
        <div class="mainbarcontainer">
            <div class="row">
<h1>تعديل النادي</h1>
<form action="" method="post">
    <input name="cl_id" type="hidden" value="<?php echo $this->cl->cl_id ?>"/><br/>
    <input name="cl_name" type="text" placeholder="اسم النادي" value="<?php echo $this->cl->cl_name ?>"/><br/><input name="cl_name_en" type="text" placeholder="اسم النادي اللاتيني" value="<?php echo $this->cl->cl_name_en ?>"/><br/>
    <input name="cl_country" type="text" placeholder="بلد النادي" value="<?php echo $this->cl->cl_country ?>"/><br/>
    <input name="cl_logo" id="cl-logo" size="42" type="text" placeholder="شعار النادي" value="<?php echo $this->cl->cl_logo ?>"/> <span onclick="finderPopup('cl-logo')">اختر شعارا</span> <br/>
    <button>حفظ</button>
</form>
                
                
            </div></div></div></div>
<?php require_once('include/footer.php') ?>
