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
                    <option value="<?php echo IMG_PATH ?>clubs/chelsea.jpg">Chelsea</option>
                    <option value="<?php echo IMG_PATH ?>clubs/barcelona.jpg">Barcelona</option>
                    <option value="<?php echo IMG_PATH ?>clubs/realmadrid.jpg">Real Madrid</option>
		</select>
            </div>
	</div>
    </div>
</div>
<div class="whole-site">
    <!--<div class="bg-team">        
    </div>-->
    <div>
	<!-- <div class="bg-team"></div>-->
	<div class="row line">
	    <div class="col-sm-8"></div>
	    <div class="col-sm-4"></div>
	</div>
	<div class="row lang">
	    <div class="col-sm-3">
	        <ul>
	            <a><li>EN</li></a>
	            <a><li>AR</li></a>
	        </ul>
	    </div>
	    
	</div>
	
	<div class="row logoz">
        <div class="col-sm-6">
           <div class="row">
              <div class="col-sm-2">
                الأخبار
            </div>
               <div class="col-sm-10">
                انتقال نيمار إلى باريس سانجرما ليس مؤكداً
            </div>
            
           </div>
            
         </div>
        <div class="col-sm-2"></div>
        <div class="col-sm-4">
            <img src=" <?php echo IMG_PATH ?>marma.png">
        </div>
	</div>
	<div class="row navbaro hidden-xs">
            <div class="col-sm-4">
                    <ul>
			<li>Home</li>
			<li>Matches <i class="fa fa-sort-desc" aria-hidden="true"></i></li>
			<li>About</li>
			<li>Contact</li>
			
                    </ul>
            </div>
            <div class="col-sm-1">
		<img src="<?php echo IMG_PATH ?>arrow.png">
            </div>
            <div class="col-sm-3">
		
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
	<div class="cont-body">
	    <div class="row">
	         <ul>
	             <a href=""><li><span>Tomorrow Matches</span></li></a>
	             <a href="" class="active"><li><span>Today's Matches</span></li></a>
	             <a href=""><li><span>Yesterday Matches</span></li></a>
	         </ul>
	         <div class="matchs-new">
                 <div>
                     <div class="row text-center">
                         <div class="col-sm-5">
                             <h4>Manchester United</h4>
                             <img src="<?php echo IMG_PATH ?>clubs-logo/manchester_united.png">
                         </div>
                         <div class="col-sm-2">
                             <h4>8:00 am</h4>
                         </div>
                         <div class="col-sm-5">
                            <img src="<?php echo IMG_PATH ?>clubs-logo/chelsea.png">
                             <h4>Manchester City</h4>
                         </div>
                     </div>
                     <ul>
	             <a href="">
                     <li>
	                 <span>Champion</span>
	                 <h5>Champion Liga</h5>
	                 </li>
	             </a>
	             <a href="">
                     <li>
                         <span>Commentator</span>
                         <h5>Esam Shwwali</h5>
                     </li>
	             </a>
	             <a href="">
                     <li>
                         <span>Channels</span>
                         <h5>Bein Sport 1 HD</h5>
                     </li>
	             </a>
	         </ul>
                 </div>
	             
	         </div>
	         
	    </div>
	</div>
	
    </div>
</div>
<!--<div class="row">
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
	</div> -->
<?php include 'footer.php' ?>
