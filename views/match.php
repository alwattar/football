<?php include 'header.php' ?>
<!-- to remove last choice: localStorage.setItem('ud', null); -->
<?php include 'survey.php' ?>
<div class="whole-site">
    <!--<div class="bg-team">        
    </div>-->
    <div>
	<!-- <div class="bg-team"></div>-->
	<?php include 'navbar.php' ?>
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

<?php include 'footer.php' ?>
