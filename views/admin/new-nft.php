<?php require_once('include/header.php') ?>

<br/>
<br/>
New NFT
<br/>
<br/>
<form action="" method="post">
    <input name="nft_name" type="text" placeholder="NTF Name"/><br/>
    <input name="nft_num" type="number" placeholder="Players num"/><br/>
    <input name="nft_logo" id="nft-logo" size="42" type="text" placeholder="NTF logo"/> <span onclick="finderPopup('nft-logo')">Select logo</span> <br/>
    <button>CREATE</button>
</form>
<?php require_once('include/footer.php') ?>
