<?php require_once('include/header.php') ?>
<div class="adminpanel">
<?php require_once('include/sidebar.php') ?>
<div class="mainbar">
     <div class="mainbarcontainer">
         <div class="row">
             <h1>منتخب جديد</h1>
<form action="" method="post">
    <input name="nft_name" type="text" placeholder="اسم المنتخب"/><br/>
    <input name="nft_num" type="number" placeholder="عدد لاعبي المنتخب"/><br/>
    <input name="nft_logo" id="nft-logo" size="42" type="text" placeholder="شعار المنتخب"/> <span onclick="finderPopup('nft-logo')">اختر شعار</span> <br/>
    <button>إنشاء</button>
</form>

<?php if($this->nfts != false){ ?>
    <h1>All NFTS</h1>
    <?php foreach($this->nfts as $nft){ ?>
	NFT ID: <?php echo $nft->nft_id ?>
	<br/>
	NFT Name: <?php echo $nft->nft_name ?>
	<br/>
	NFT Players Count: <?php echo $nft->nft_num ?>
	<br/>
	<a href="<?php echo ADMIN_PATH ?>/new-nft&do=edit&id=<?php echo $nft->nft_id ?>">Edit</a> |
	<a href="<?php echo ADMIN_PATH ?>/new-nft&do=delete&id=<?php echo $nft->nft_id ?>">DELETE</a>
	<br/>
	-------------
	<br/>
    <?php } ?>
<?php } ?>
             
         </div></div></div></div>

<?php require_once('include/footer.php') ?>
