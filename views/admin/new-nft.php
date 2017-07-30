<?php require_once('include/header.php') ?>
<div class="adminpanel">
<?php require_once('include/sidebar.php') ?>
<div class="mainbar">
     <div class="mainbarcontainer">
         <div class="row">
             <h1>منتخب جديد</h1>
<form action="" method="post">
    <input name="nft_name" type="text" placeholder="اسم المنتخب"/><br/>
    <input name="nft_name_en" type="text" placeholder="اسم المنتخب اللاتيني"/><br/>
    <input name="nft_num" type="number" placeholder="عدد لاعبي المنتخب"/><br/>
    <input name="nft_logo" id="nft-logo" size="42" type="text" placeholder="شعار المنتخب"/> <span onclick="finderPopup('nft-logo')">اختر شعار</span> <br/>
    <button>إنشاء</button>
</form>

<?php if($this->nfts != false){ ?>
    <h1>جميع المنتخبات </h1>
     <div class="table-responsive">
                 <table class="main-table table text-center">
                  <thead>
                    <tr>
                        <td>الرقم</td>
                        <td>اسم المنتخب</td>
                        <td>اسم المنتخب اللاتيني</td>
                        <td>عدد اللاعبين</td>
                        <td>شعار المنتخب</td>
                        <td>تحكم</td>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <td>الرقم</td>
                        <td>اسم النادي</td>
                        <td>اسم النادي اللاتيني</td>
                        <td>بلد النادي</td>
                        <td>شعار المنتخب</td>
                        <td>تحكم</td>
                    </tr>
                </tfoot>
                     <tbody>
                         <?php foreach($this->nfts as $nft){ ?>
             <tr>
             <td data-label='الرقم'> <?php echo $nft->nft_id ?> </td>
                 <td data-label='اسم المنتخب'> <?php echo $nft->nft_name ?> </td>
                 <td data-label='اسم المنتخب اللاتيني'> <?php echo $nft->nft_name_en ?> </td>
                 <td data-label='عدد اللاعبين'> <?php echo $nft->nft_num ?> </td>
                 <td data-label='شعار المنتخب'> <img src="<?php echo $nft->nft_logo ?>"> </td>
                 <td data-label='تحكم'>
                     <a class="btn btn-success" href="<?php echo ADMIN_PATH ?>/new-nft&do=edit&id=<?php echo $nft->nft_id ?>">تعديل</a>
	<a class="btn btn-danger" href="<?php echo ADMIN_PATH ?>/new-nft&do=delete&id=<?php echo $nft->nft_id ?>">حذف</a></td>
            </tr>
    <?Php } ?>
                     </tbody>
                 </table>
             </div>
             
             
        
<?php } ?>
             
         </div></div></div></div>

<?php require_once('include/footer.php') ?>
