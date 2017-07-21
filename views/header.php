<html>
    <head>
	<meta charset="UTF-8">
	<?php
	function getBrowser() 
	{ 
	    $u_agent = $_SERVER['HTTP_USER_AGENT']; 
	    $bname = 'Unknown';
	    $platform = 'Unknown';
	    $version= "";

	    //First get the platform?
	    if (preg_match('/linux/i', $u_agent)) {
		$platform = 'linux';
	    }
	    elseif (preg_match('/macintosh|mac os x/i', $u_agent)) {
		$platform = 'mac';
	    }
	    elseif (preg_match('/windows|win32/i', $u_agent)) {
		$platform = 'windows';
	    }

	    // Next get the name of the useragent yes seperately and for good reason
	    if(preg_match('/MSIE/i',$u_agent) && !preg_match('/Opera/i',$u_agent)) 
	    { 
		$bname = 'Internet Explorer'; 
		$ub = "MSIE"; 
	    } 
	    elseif(preg_match('/Firefox/i',$u_agent)) 
	    { 
		$bname = 'Mozilla Firefox'; 
		$ub = "Firefox"; 
	    }
	    elseif(preg_match('/OPR/i',$u_agent)) 
	    { 
		$bname = 'Opera'; 
		$ub = "Opera"; 
	    } 
	    elseif(preg_match('/Chrome/i',$u_agent)) 
	    { 
		$bname = 'Google Chrome'; 
		$ub = "Chrome"; 
	    } 
	    elseif(preg_match('/Safari/i',$u_agent)) 
	    { 
		$bname = 'Apple Safari'; 
		$ub = "Safari"; 
	    } 
	    elseif(preg_match('/Netscape/i',$u_agent)) 
	    { 
		$bname = 'Netscape'; 
		$ub = "Netscape"; 
	    }else{
		$bname = 'Unknown-1'; 
		$ub = "Unknown-1";
		
	    }
	    
	    // finally get the correct version number
	    $known = array('Version', $ub, 'other');
	    $pattern = '#(?<browser>' . join('|', $known) .
		       ')[/ ]+(?<version>[0-9.|a-zA-Z.]*)#';
	    if (!preg_match_all($pattern, $u_agent, $matches)) {
		// we have no matching number just continue
	    }

	    // see how many we have
	    $i = count($matches['browser']);
	    if ($i != 1) {
		//we will have two since we are not using 'other' argument yet
		//see if version is before or after the name
		if (strripos($u_agent,"Version") < strripos($u_agent,$ub)){
		    $version= $matches['version'][0];
		}
		else {
		    if($ub != 'Unknown-1')
			$version= $matches['version'][1];
		}
	    }
	    else {
		$version= $matches['version'][0];
	    }

	    // check if we have a number
	    if ($version==null || $version=="") {$version="?";}

	    return array(
		'userAgent' => $u_agent,
		'name'      => $bname,
		'ub' => strtolower($ub),
		'version'   => $version,
		'platform'  => $platform,
		'pattern'    => $pattern
	    );
	}

	$b = getBrowser();
	$bname = $b['ub'];
	$errMsg = "";
	?>
	<?php if($bname == 'firefox' || $bname == 'chrome'){ ?>
	    <script src="//api.peer5.com/peer5.js?id=237pkv12fsq1bm4r7qnd"></script>
	    <script src="//api.peer5.com/peer5.jwplayer7.plugin.js"></script>
	    <!-- jwplayer7 script and license key-->
	    <script src="//ssl.p.jwpcdn.com/player/v/7.6.0/jwplayer.js"></script>
	    <script>jwplayer.key = 'peXGRRnW8gklGrcCXkX0IdhS2sy0t3iwtGFTwkU4Mfw=';</script>
	<?php }else if($bname == 'unknown-1'){
	    $errMsg = "Are you donkey ? ,,, tell us!! .. are you ? ... use another shit browser !!"
	?>
	<?php }else{ ?>
	    <script src="http://api.peer5.com/peer5.js?id=6xs6419f3f6p92a5tyx8"></script>
	    <script src="http://api.peer5.com/peer5.jwplayer7.plugin.js"></script>
	    <!-- jwplayer7 script and license key -->
	    <script src="https://content.jwplatform.com/libraries/7FnG4gLo.js"></script>
	    <script>jwplayer.key = "YxxDMj0TLCtJLKFm9OgPRMRtjFQBVrJ6AbTrFA==";</script>
	<?php } ?> 
    <title>AlMarma for Online football streaming</title>
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC|Anton|Cairo|Dancing+Script|Fjalla+One|Gloria+Hallelujah|Lateef|Lato|Lobster|Open+Sans|Pacifico|Play|Ravi+Prakash|Reem+Kufi|Roboto|Shadows+Into+Light" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo PUBLIC_PATH ?>css/selectize.css"/>
    <link rel="stylesheet" href="<?php echo PUBLIC_PATH ?>css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo PUBLIC_PATH ?>css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo PUBLIC_PATH ?>css/animate.css">
    <link rel="stylesheet" href="<?php echo PUBLIC_PATH ?>css/style.css">
    </head>
    <body>
	
