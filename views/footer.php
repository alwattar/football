
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <footer>

    <div class="container-fluid">
        <div class="row footline">
            <div class="col-sm-4">
                <h5> Copyright &copy; 2016-<?php echo date("Y"); ?>, Almarma.net.</h5>
            </div>
            <div class="col-sm-8">
                <h5>In Partnership with <span>SALSABIL</span></h5>
            </div>
        </div>
    </div>

</footer>


<script src="<?php echo JS_PATH ?>jquery-1.12.4.min.js"></script>
<script src="<?php echo JS_PATH ?>wow.min.js"></script>
<script src="<?php echo JS_PATH ?>main.js"></script>
<script>
 var ud = localStorage.getItem('ud');
 if(ud != 'true'){
     $('.survey').css('display', 'block');
 }
 function changeBg(){
     var pBg = localStorage.getItem('theBg');
     $('.whole-site>.container>.bg-team').css('background-image', 'url('+ pBg +')');
     $('.whole-site>.bg-team').css('background-image', 'url('+ pBg +')');
 }

 changeBg();
 
 $(".my-team").on('change', function(){
     var img = $(this).val();
     localStorage.setItem('theBg', img);
     localStorage.setItem('ud', 'true');
     $('.survey').css('display', 'none');
     changeBg();
 });
</script>

<script src="<?php echo JS_PATH ?>selectize.js"></script>
<script>
 $('.selectsearch').selectize();
</script>
   
   <script>
    
        
        $(window).load(function () {
            $('#preloader').fadeOut('slow', function () {
                $(this).remove();
                $('.whole-site').fadeIn('slow');
            });
        });
    
   
    
    
    </script>
    </body>
</html>
