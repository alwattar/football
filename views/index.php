<?php include 'header.php' ?>
<!-- to remove last choice: localStorage.setItem('ud', null); -->
<?php include 'survey.php' ?>
<div class="whole-site">
    <!--<div class="bg-team">        
	 </div>-->
    <div class="container">
	<!-- <div class="bg-team"></div>-->
	<?php include 'navbar.php' ?>
	<div class=" cont-body">
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
