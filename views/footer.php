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
    </body>
</html>
