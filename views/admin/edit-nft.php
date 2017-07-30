<?php require_once('include/header.php') ?>
<div class="adminpanel">
<?php require_once('include/sidebar.php') ?>
    <div class="mainbar">
        <div class="mainbarcontainer">
            <div class="row">
<h1>تعديل المنتخب</h1>
<form action="" method="post">
    <input name="nft_id" type="hidden" value="<?php echo $this->nft->nft_id ?>"/>
    <input name="nft_name" type="text" placeholder="اسم المنتخب" value="<?php echo $this->nft->nft_name ?>"/><br/>
    <input name="nft_name_en" type="text" placeholder="اسم المنتخب باللاتيني" value="<?php echo $this->nft->nft_name_en ?>"/><br/>
    <input name="nft_num" type="number" placeholder="عدد اللاعبين" value="<?php echo $this->nft->nft_num ?>"/><br/>
    <input name="nft_logo" id="nft-logo" size="42" type="text" placeholder="شعار المنتخب" value="<?php echo $this->nft->nft_logo ?>"/> <span onclick="finderPopup('nft-logo')">Select logo</span> <br/>
    <button>حفظ</button>
</form>
                </div></div></div></div>
<?php require_once('include/footer.php') ?>
