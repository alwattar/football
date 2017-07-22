<?php require_once('include/header.php') ?>
<p><h1>New NFT</h1></p>
<form action="" method="post">
    <input name="nft_name" type="text" placeholder="NTF Name"/><br/>
    <input name="nft_num" type="number" placeholder="Players num"/><br/>
    <input name="nft_logo" id="nft-logo" size="42" type="text" placeholder="NTF logo"/> <span onclick="finderPopup('nft-logo')">Select logo</span> <br/>
    <button>CREATE</button>
</form>

<?php if($this->nfts != false){ ?>
    <p><h1>All NFTS</h1></p>
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
<?php require_once('include/footer.php') ?>
