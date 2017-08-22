window.baseUrl = '/football';

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

try{
    var noMMsg = 'لا يوجد مباريات مهمة لهذا اليوم';
    // matches-to-be-adde
    $.get(window.baseUrl + '/get-match?day=today', function(data){
	if($('.matches-to-be-added').data('days') != 'all'){
	    $('.matches-to-be-added').html('');
	    if(data.trim().length < 1){
		data = noMMsg;
	    }
	    $('.matches-to-be-added').append(data);
	    var index_active = document.getElementsByClassName('index-active')[1].classList.add("active");
	}
    });
    $('.get-matches-day').click(function(){
	var theDay = $(this).data('day');
	var tabs = document.getElementsByClassName('index-active');
	if(theDay == 'today'){
	    tabs[0].classList.remove("active");
	    tabs[1].classList.add("active");
	    tabs[2].classList.remove("active");
	}else if(theDay == 'yesterday'){
	    tabs[0].classList.remove("active");
	    tabs[1].classList.remove("active");
	    tabs[2].classList.add("active");
	}else{
	    tabs[0].classList.add("active");
	    tabs[1].classList.remove("active");
	    tabs[2].classList.remove("active");
	}
	$.get(window.baseUrl + '/get-match?day=' + theDay, function(data){
	    $('.matches-to-be-added').html('');
	    if(data.trim().length < 1)
		data = noMMsg;
	    $('.matches-to-be-added').append(data);
	});
    });
}catch(err){
    console.log(err);
}
try{
    $('.change-s-url').on('click', function(){
	if($(this).data('title') != null)
	    $('#vid-title-summ').text($(this).data('title'));
	var sUrl = $(this).data('surl');
	var streaming_tabs = document.getElementsByClassName('change-s-url');
	for(var i = 0; i < streaming_tabs.length; i++){
	    var dataSurl = streaming_tabs[i].getAttribute('data-surl');
	    streaming_tabs[i].classList.remove("active-streaming");
	    var childClasses = streaming_tabs[i].children[0].classList;
	    if(childClasses.length >= 1){
		childClasses.remove('lololo');
		childClasses.remove('fa');
		childClasses.remove('fa-check-square-o');
            }
	}
	$(this).addClass('active-streaming');
	$(this).children('i').addClass('lololo fa fa-check-square-o');
	$.get(window.baseUrl + '/get-match-url?s_url=' + sUrl, function(data){
	    $('#ref-player').html(data);
	    // console.log(data);
	});
    });
}catch(err){
    console.log(err);
}

// count down show-match page
try{
    function Padder(len, pad) {
	if (len === undefined) {
	    len = 1;
	} else if (pad === undefined) {
	    pad = '0';
	}

	var pads = '';
	while (pads.length < len) {
	    pads += pad;
	}

	this.pad = function (what) {
	    var s = what.toString();
	    return pads.substring(0, pads.length - s.length) + s;
	};
    }
    
    var zero1 = new Padder(2);
    var totalSeconds = parseInt($('#mat-sec').text());
    function updateCD(){
	var days = '' + Math.floor(totalSeconds / 86400);
	// totalSeconds -= days * 86400;
	
	// calculate (and subtract) whole hours
	var hours = '' + Math.floor((totalSeconds - days * 86400) / 3600) % 24;
	// totalSeconds -= hours * 3600;

	// calculate (and subtract) whole minutes
	var minutes = '' + Math.floor(((totalSeconds - days * 86400 ) - hours * 3600) / 60) % 60;
	// totalSeconds -= minutes * 60;

	// what's left is seconds
	var seconds = '' + (((totalSeconds - days * 86400 ) - hours * 3600) - minutes * 60) % 60;  // in theory the modulus is not required
	totalSeconds = totalSeconds - 1;
	return zero1.pad(hours) + ':' + zero1.pad(minutes) + ':' + zero1.pad(seconds);
    }
    setInterval(function(){
	if(totalSeconds <= 0)
	    window.location.href = '';
	else
	    $('#mat-cd').text(updateCD());
    },1000);
}
catch(err){
    console.log(err);
}
