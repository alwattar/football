<?php require_once('include/header.php') ?>
<div class="adminpanel">
<?php require_once('include/sidebar.php') ?>
<div class="mainbar">
     <div class="mainbarcontainer">
         <div class="row">
             <h1>اضافة نادي جديد</h1>
<form action="" method="post">
    <input name="cl_name" type="text" placeholder="اسم النادي"/><br/>
    <input name="cl_name_en" type="text" placeholder="اسم النادي اللاتيني"/><br/>
    <input name="cl_country" type="text" placeholder="بلد النادي"/><br/>
    <input name="cl_logo" id="cl-logo" size="42" type="text" placeholder="شعار النادي"/> <span onclick="finderPopup('cl-logo')">اختار شعار</span> <br/>
    <button>إنشاء</button>
</form>

<?php if($this->clubs != false){ ?>
    <h1>جميع النوادي المحفوظة</h1>
             <div class="table-responsive">
                 <table class="main-table table text-center">
                  <thead>
                    <tr>
                        <td>الرقم</td>
                        <td>اسم النادي</td>
                        <td>اسم النادي اللاتيني</td>
                        <td>بلد النادي</td>
                        <td>شعار النادي</td>
                        <td>تحكم</td>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <td>الرقم</td>
                        <td>اسم النادي</td>
                        <td>اسم النادي اللاتيني</td>
                        <td>بلد النادي</td>
                        <td>شعار النادي</td>
                        <td>تحكم</td>
                    </tr>
                </tfoot>
                     <tbody>
                         <?php foreach($this->clubs as $cl){ ?>
             <tr>
             <td data-label='الرقم'> <?php echo $cl->cl_id ?> </td>
                 <td data-label='اسم النادي'> <?php echo $cl->cl_name ?> </td>
                 <td data-label='اسم النادي اللاتيني'> <?php echo $cl->cl_name_en ?> </td>
                 <td data-label='بلد النادي'> <?php echo $cl->cl_country ?> </td>
                 <td data-label='شعار النادي'><img src="<?php echo $cl->cl_logo ?>"> </td>
                 <td data-label='تحكم'>
                     <a class="btn btn-success" href="<?php echo ADMIN_PATH ?>/new-club&do=edit&id=<?php echo $cl->cl_id ?>">تعديل</a>
	<a class="btn btn-danger" href="<?php echo ADMIN_PATH ?>/new-club&do=delete&id=<?php echo $cl->cl_id ?>">حذف</a></td>
            </tr>
    <?Php } ?>
                     </tbody>
                 </table>
             </div>
    
<?php } ?>
         </div></div></div>

<?php require_once('include/footer.php') ?>
