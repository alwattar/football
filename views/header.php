<html>
    <head>
	<meta charset="UTF-8">
	<?php
     
	$b = $this->getBrowser();
	$bname = $b['ub'];
	$errMsg = "";
	?>
	<?php if($bname == 'firefox' || $bname == 'chrome'){ ?>
	    <script src="//api.peer5.com/peer5.js?id=237pkv12fsq1bm4r7qnd"></script>
	    <script src="//api.peer5.com/peer5.jwplayer7.plugin.js"></script>
	    <!-- jwplayer7 script and license key-->
	    <script src="//ssl.p.jwpcdn.com/player/v/7.6.0/jwplayer.js"></script>
	    <script>jwplayer.key = 'peXGRRnW8gklGrcCXkX0IdhS2sy0t3iwtGFTwkU4Mfw=';</script>
	<?php }else if($bname == 'unknown-1'){ ?>
	    <?php $errMsg = "" ?>
	    <script src="//api.peer5.com/peer5.js?id=237pkv12fsq1bm4r7qnd"></script>
	    <script src="//api.peer5.com/peer5.jwplayer7.plugin.js"></script>
	    <!-- jwplayer7 script and license key-->
	    <script src="//ssl.p.jwpcdn.com/player/v/7.6.0/jwplayer.js"></script>
	    <script>jwplayer.key = 'peXGRRnW8gklGrcCXkX0IdhS2sy0t3iwtGFTwkU4Mfw=';</script>
	<?php }else{ ?>
	    <script src="http://api.peer5.com/peer5.js?id=6xs6419f3f6p92a5tyx8"></script>
	    <script src="http://api.peer5.com/peer5.jwplayer7.plugin.js"></script>
	    <!-- jwplayer7 script and license key -->
	    <script src="https://content.jwplatform.com/libraries/7FnG4gLo.js"></script>
	    <script>jwplayer.key = "YxxDMj0TLCtJLKFm9OgPRMRtjFQBVrJ6AbTrFA==";</script>
	<?php } ?> 
    <title>AlMarma for Online football streaming</title>
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC|Anton|Cairo|Dancing+Script|Fjalla+One|Gloria+Hallelujah|Lateef|Lato|Lobster|Open+Sans|Pacifico|Play|Ravi+Prakash|Reem+Kufi|Roboto|Shadows+Into+Light|Josefin+Sans|Montserrat|Quicksand" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo CSS_PATH ?>selectize.css"/>
    <link rel="stylesheet" href="<?php echo CSS_PATH ?>bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo CSS_PATH ?>font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo CSS_PATH ?>animate.css">
    <link rel="stylesheet" href="<?php echo CSS_PATH ?>style.css">
    <link rel="stylesheet" href="<?php echo CSS_PATH ?>main.css">
    </head>
    <body>
	<?php include 'preloader.php' ?>
    <div id="ghaithwarning">
        <span>ملاحظة:</span> الموقع الآن في مرحلته التجريبية 
        </div>
        