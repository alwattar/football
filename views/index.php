
<?php include 'header.php' ?>
<!-- to remove last choice: localStorage.setItem('ud', null); -->
<div class="survey " style="display:none">
    <div class="loading-bg">
	
    </div>
    <div class="container">
	<div class="row">
            <h1>Select Your Favourite Team</h1>
            <div class="selectmiddle">
		<h4>Teams: </h4>
		<select class="my-team selectsearch">
                    <option value=""> </option>
                    <option value="<?php echo PUBLIC_PATH ?>img/clubs/chelsea.jpg">Chelsea</option>
                    <option value="<?php echo PUBLIC_PATH ?>img/clubs/barcelona.jpg">Barcelona</option>
                    <option value="<?php echo PUBLIC_PATH ?>img/clubs/realmadrid.jpg">Real Madrid</option>
		</select>
            </div>
	</div>
    </div>
</div>
<div class="whole-site">
    <div class="bg-team">        
    </div>
    <div class="container">
	<div class="bg-team"></div>
	<div class="row navbaro">
            <div class="col-sm-4">
		<div>
                    <ul>
			<li>Home</li>
			<li>Matches <i class="fa fa-sort-desc" aria-hidden="true"></i></li>
			<li>About</li>
			<li>Contact</li>
			
                    </ul>
		</div>
            </div>
            <div class="col-sm-4">
		<img src="img/arrow.png">
            </div>
            <div class="col-sm-4">
		<ul>
                    <li><i class="fa fa-facebook" aria-hidden="true"></i></li>
                    <li><i class="fa fa-twitter" aria-hidden="true"></i></li>
                    <li><i class="fa fa-youtube-play" aria-hidden="true"></i></li>
                    <li><i class="fa fa-instagram" aria-hidden="true"></i></li>
		</ul>
            </div>
            
	</div>
	<br>
	<div class="row">
            <?php if($errMsg == ""){ ?>
		<div id="player"></div>
	    <?php }else{ ?>
		<div id="the-error-msg">
		    <?php echo $errMsg ?>
		</div>
	    <?php } ?>
	    <script>
	     var player = jwplayer('player').setup({
		 width: "400",
		 height: "280",
		 autostart: true,
		 file: "https://live76.vkuserlive.com/620010/live/CteWO8xAf9A/playlist.m3u8"
		 
	     });
	    </script> 
	</div>
    </div>
</div>
<?php include 'footer.php' ?>
