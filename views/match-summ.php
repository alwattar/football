
<?php include 'header.php' ?>
 <div class="whole-site">
    <!--<div class="bg-team">        
	 </div>-->
    <div >
	<!-- <div class="bg-team"></div>-->
	<?php include 'navbar.php' ?>




 <div class="cont-show">
		<div class="row text-center" >
			<div class="col-xs-6">
			    <i></i><div>الأهداف</div>
			</div>
        <div class="col-xs-6">
			    <i></i><div>ملخص المباراة</div>
			</div>
		</div>
		<div class="row">
	            <div class="col-xs-4">
	            <div class="col-sm-4"><img src="../public/img/clubs-logo/barcelona.png"></div>
	            <div class="col-sm-4"><h4>VS</h4></div>
	            <div class="col-sm-4"><img src="../public/img/clubs-logo/liverpool.png"></div>
	            
	            <div class="col-sm-12"><h5>2017/07/16</h5></div>
			
			
			
            
	            </div>
	            <div class="col-xs-8">
			<h4>مشاهدة ملخص وأهداف</h4>
			<h4>
			    <span>
				مانشستر سيتي
	                    </span>
			    و 
			    <span>
				تشيلسي
			    </span>
           
            </h4>
            <h4>انتهت المباراة</h4>
            <br>
            <br>
            
            <h4>
             بفوز
              <span>
                  تشيلسي
              </span>
              على
              <span>
                  مانشستر سيتي 
              </span>
                 
                <span>4 - 5</span>
            </h4>
	            </div>
	            <div class="col-xs-12">
			<h2>ملخص المباراة</h2> 
			<div id="ref-player">
			   
				<div id="player"></div>
				<script>
				 var player = jwplayer('player').setup({
				     width: "100%",
				     height: "480",
				     autostart: true,
				     file: ""
				 });
				</script>
				
			   
			    <div class="row">
				
				    <div id="player"></div>
				
			    </div>
			</div>
	                
	            </div>
		</div>
		
	    </div>



	<br><br><br><br><br>
	<?php include 'footer.php' ?>
    </div>
    
</div>
 <?php // $this->match->mat_id ?>



<?php  //$this->match->mat_summ ?>

<?php // print_r($this->match) ?>

  