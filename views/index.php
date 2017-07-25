<?php include 'header.php' ?>
<!-- to remove last choice: localStorage.setItem('ud', null); -->
<div class="survey " style="display:none">
    <div class="loading-bg">
	
    </div>
    <div class="container">
	<div class="row matches-to-be-added">
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
		    <li>الرئيسية</li>
		    <li>المباريات <i class="fa fa-sort-desc" aria-hidden="true"></i></li>
		    <li>حول الموقع</li>
		    <li>اتصل بنا</li>
		    
                </ul>
            </div>
            <div class="col-sm-2">
		<img src="<?php echo IMG_PATH ?>arrow.png">
            </div>
            <div class="col-sm-2">
		
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
	            <a class="index-active"><li><span data-day="tomorrow" class="get-matches-day">مباريات الغد</span></li></a>
	            <a class="index-active"><li><span data-day="today" class="get-matches-day">مباريات اليوم</span></li></a>
	            <a class="index-active"><li><span data-day="yesterday" class="get-matches-day">مباريات الأمس</span></li></a>
	        </ul>
                    <div class="matches-to-be-added"></div>
	    </div>
	</div>
	
    </div>
</div>

<?php include 'footer.php' ?>
