<?php require_once('include/header.php') ?>
<div class="adminpanel">
<?php require_once('include/sidebar.php') ?>
<div class="mainbar">
     <div class="mainbarcontainer">
         <div class="row">
             <h1>بطولات جديدة</h1>
<form action="" method="post">
    <input name="champ_name" type="text" placeholder="اسم البطولة"/><br/>
    <input name="champ_name_en" type="text" placeholder="اسم البطولة باللاتيني"/><br/>
    <input name="champ_loc" type="text" placeholder="مكان البطولة"/><br/>
  <div  class="datetimepicker">
    <input class="add-on" data-format="yyyy/MM/dd hh:mm:ss" type="text" name="champ_date" placeholder="تاريخ البطولة" >
  </div>
    <input name="champ_logo" id="champ-logo" size="42" type="text" placeholder="champ logo"/> <span onclick="finderPopup('champ-logo')">Select logo</span> <br/>
    <button>انشاء</button>
</form>
<?php if($this->champs != false){ ?>
             <h1>جميع البطولات</h1>
             
             
             <div class="table-responsive">
                 <table class="main-table table text-center">
                  <thead>
                    <tr>
                        <td>الرقم</td>
                        <td>اسم البطولة</td>
                        <td>اسم البطولة اللاتيني</td>
                        <td>مكان البطولة</td>
                        <td>تاريخ البطولة</td>
                        <td>تحكم</td>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <td>الرقم</td>
                        <td>اسم البطولة</td>
                        <td>اسم البطولة اللاتيني</td>
                        <td>مكان البطولة</td>
                        <td>تاريخ البطولة</td>
                        <td>تحكم</td>
                    </tr>
                </tfoot>
                     <tbody>
                         <?php foreach($this->champs as $champ){ ?>
             <tr>
             <td data-label='الرقم'> <?php echo $champ->champ_id ?> </td>
                 <td data-label='اسم البطولة'> <?php echo $champ->champ_name ?> </td>
                 <td data-label='اسم البطولة اللاتيني'> <?php echo $champ->champ_name_en ?> </td>
                 <td data-label='مكان البطولة'> <?php echo $champ->champ_loc ?> </td>
                 <td data-label='تاريخ البطولة'> <?php echo $champ->champ_date ?> </td>
                 <td data-label='تحكم'>
                     <a class="btn btn-success" href="<?php echo ADMIN_PATH ?>/new-champ&do=edit&id=<?php echo $champ->champ_id ?>">تعديل</a>
	<a class="btn btn-danger" href="<?php echo ADMIN_PATH ?>/new-champ&do=delete&id=<?php echo $champ->champ_id ?>">حذف</a></td>
            </tr>
    <?Php } ?>
                     </tbody>
                 </table>
             </div>
     
<?php  } ?>
             
         </div></div></div>

<?php require_once('include/footer.php') ?>
