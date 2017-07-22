<?php require_once('include/header.php') ?>
<p><h1>EDIT NFT</h1></p>
<form action="" method="post">
    <input name="nft_id" type="hidden" value="<?php echo $this->nft->nft_id ?>"/>
    <input name="nft_name" type="text" placeholder="NTF Name" value="<?php echo $this->nft->nft_name ?>"/><br/>
    <input name="nft_num" type="number" placeholder="Players num" value="<?php echo $this->nft->nft_num ?>"/><br/>
    <input name="nft_logo" id="nft-logo" size="42" type="text" placeholder="NTF logo" value="<?php echo $this->nft->nft_logo ?>"/> <span onclick="finderPopup('nft-logo')">Select logo</span> <br/>
    <button>SAVE</button>
</form>
<?php require_once('include/footer.php') ?>
