//----START--------ANIMATE ON SCROLL----------------//
wow = new WOW({animateClass: 'animated',
              offset: 100});
wow.init();
//----END----------ANIMATE ON SCROLL------------//
//----START----Smooth Scroll TO DIV -------------//

$('.menu ul li a').click(function(){
    $('html, body').animate({
        scrollTop: $('#' + $(this).data('value')).offset().top
    },1000);
});
//----END---Smooth Scroll TO DIV ---------------//
//----START---- Counter -------------//
$('.count').each(function () {
    $(this).prop('Counter',0).animate({
        Counter: $(this).text()
    }, {
        duration: 4000,
        easing: 'swing',
        step: function (now) {
            $(this).text(Math.ceil(now));
        }
    });
});
//----END---- Counter -------------//



// this function to open finder popup to select image
function finderPopup(inputId) {
    var finderPopup = CKFinder.popup( {
	chooseFiles: true,
	width: 800,
	height: 600,
	onInit: function( finder ) {
	    console.log('lol');
	    finder.on( 'files:choose', function( evt ) {
		var file = evt.data.files.first();
		var output = document.getElementById( inputId );
		output.value = file.getUrl();
	    } );

	    finder.on( 'file:choose:resizedImage', function( evt ) {
		var output = document.getElementById( inputId );
		output.value = evt.data.resizedUrl;
	    } );
	}
    } );
}

try{
    
               
         
 
    $('.datetimepicker').datetimepicker({
      locale: 'ru'
    });


     
    
}catch(err){
    console.log(err);
}
