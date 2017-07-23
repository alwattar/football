<?php require_once('include/header.php') ?>
<div class="adminpanel">
<?php require_once('include/sidebar.php') ?>
<div class="mainbar">
     <div class="mainbarcontainer">
         <div class="row">
             <h1>اضافة نادي جديد</h1>
<form action="" method="post">
    <input name="cl_name" type="text" placeholder="اسم النادي"/><br/>
    <input name="cl_country" type="text" placeholder="بلد النادي"/><br/>
    <input name="cl_logo" id="cl-logo" size="42" type="text" placeholder="شعار النادي"/> <span onclick="finderPopup('cl-logo')">اختار شعار</span> <br/>
    <button>إنشاء</button>
</form>

<?php if($this->clubs != false){ ?>
    <h1>جميع النوادي المحفوظة</h1>
    <?php foreach($this->clubs as $cl){ ?>
	Club ID : <?php echo $cl->cl_id ?>
	<br/>
	Club Name : <?php echo $cl->cl_name ?>
	<br/>
	Club Country : <?php echo $cl->cl_country ?>
	<br/>
	<a href="<?php echo ADMIN_PATH ?>/new-club&do=edit&id=<?php echo $cl->cl_id ?>">تعديل</a> |
	<a href="<?php echo ADMIN_PATH ?>/new-club&do=delete&id=<?php echo $cl->cl_id ?>">حذف</a>
	<br/>
	-----------
        <br/>
    <?Php } ?>
<?php } ?>
         </div></div></div>

<?php require_once('include/footer.php') ?>
