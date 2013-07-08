<META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="The SierraLeoneHeritage.org digital resource is the main output of a research project entitled ‘Reanimating Cultural Heritage: Digital Repatriation, Knowledge Networks and Civil Society Strengthening in Post-Conflict Sierra Leone’" />
<meta name="keywords" content="sierra leone, sierra leone heritage, sierra leone museum, sierra leone culture, sierra leone history, mende mask, african art, salone, sowei mask, heritage, heritage site, museum, collection, digital heritage, visit monument, tourism, video" />
<meta name="copyright" content="&copy;" />
<meta name="author" content="" />


<!-- Google Analytics code for sierraleoneheritage.com -->
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-38230482-1']);
  _gaq.push(['_setDomainName', 'sierraleoneheritage.com']);
  _gaq.push(['_setAllowLinker', true]);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'stats.g.doubleclick.net/dc.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>


<?php
    echo '<title>';
    if(strstr($_SERVER['REQUEST_URI'], 'browse') == true) {
        echo 'SierraLeoneHeritage.org | Browse Collections' ;
    } elseif(strstr($_SERVER['REQUEST_URI'], 'search') == true) {
        echo 'SierraLeoneHeritage.org | Search Collections';
    } elseif(strstr($_SERVER['REQUEST_URI'], 'videogallery') == true) {
        echo 'SierraLeoneHeritage.org | Video Gallery';
    } elseif(strstr($_SERVER['REQUEST_URI'], 'glossary') == true) {
        echo 'SierraLeoneHeritage.org | Glossary';
    } elseif(strstr($_SERVER['REQUEST_URI'], 'museum') == true) {
        if(strstr($_SERVER['REQUEST_URI'], 'history') == true) {
            echo 'SierraLeoneHeritage.org | Sierra Leone National Museum | History';
        } elseif(strstr($_SERVER['REQUEST_URI'], 'railway-museum') == true) {
            echo 'SierraLeoneHeritage.org | Sierra Leone National Railway Museum';
        } else {
            echo 'SierraLeoneHeritage.org | Sierra Leone National Museum';
        }
    } elseif(strstr($_SERVER['REQUEST_URI'], 'sites') == true) {
        if(strstr($_SERVER['REQUEST_URI'], 'legislation') == true) {
            echo 'SierraLeoneHeritage.org | Heritage Legislation';
        } elseif(strstr($_SERVER['REQUEST_URI'], 'monuments') == true) {
            if(strstr($_SERVER['REQUEST_URI'], 'bunce') == true) {
                echo 'SierraLeoneHeritage.org | National Monuments | Bunce Island';
            } elseif(strstr($_SERVER['REQUEST_URI'], 'heddle') == true) {
                echo 'SierraLeoneHeritage.org | National Monuments | Heddles Farm';
            } elseif(strstr($_SERVER['REQUEST_URI'], 'deruyterstone') == true) {
                echo 'SierraLeoneHeritage.org | National Monuments | De Ruyter Stone';
            } elseif(strstr($_SERVER['REQUEST_URI'], 'fortthornton') == true) {
                echo 'SierraLeoneHeritage.org | National Monuments | Bastions of Fort Thornton';
            } elseif(strstr($_SERVER['REQUEST_URI'], 'masakpaidu') == true) {
                echo 'SierraLeoneHeritage.org | National Monuments | Earthworks and Live Stockade at Masakpaidu';
            } elseif(strstr($_SERVER['REQUEST_URI'], 'kingsyard') == true) {
                echo 'SierraLeoneHeritage.org | National Monuments | Gateway to the Kings Yard';
            } elseif(strstr($_SERVER['REQUEST_URI'], 'ruinsjohnnewton') == true) {
                echo 'SierraLeoneHeritage.org | National Monuments | Ruins of John Newtons House and slave barracoons';
            } elseif(strstr($_SERVER['REQUEST_URI'], 'cleveland') == true) {
                echo 'SierraLeoneHeritage.org | National Monuments | Cleveland Tombstone';
            } elseif(strstr($_SERVER['REQUEST_URI'], 'oldwharf') == true) {
                echo 'SierraLeoneHeritage.org | National Monuments | Old Wharf Steps and Guard House';
            } elseif(strstr($_SERVER['REQUEST_URI'], 'oldcity') == true) {
                echo 'SierraLeoneHeritage.org | National Monuments | Old city boundary guns';
            } elseif(strstr($_SERVER['REQUEST_URI'], 'oldfourahbay') == true) {
                echo 'SierraLeoneHeritage.org | National Monuments | Old Fourah Bay College building';
            } elseif(strstr($_SERVER['REQUEST_URI'], 'stjohn') == true) {
                echo 'SierraLeoneHeritage.org | National Monuments | St Johns Maroon Church';
            } elseif(strstr($_SERVER['REQUEST_URI'], 'stcharles') == true) {
                echo 'SierraLeoneHeritage.org | National Monuments | St Charles Church and Kings Yard wall';
            } elseif(strstr($_SERVER['REQUEST_URI'], 'firingpoint') == true) {
                echo 'SierraLeoneHeritage.org | National Monuments | Firing point and guns near Old Wharf';
            } elseif(strstr($_SERVER['REQUEST_URI'], 'martello') == true) {
                echo 'SierraLeoneHeritage.org | National Monuments | Martello Tower, Tower Hill';
            } elseif(strstr($_SERVER['REQUEST_URI'], 'captainlendy') == true) {
                echo 'SierraLeoneHeritage.org | National Monuments | Grave of Captain Lendy, Waiima';
            } else {
                echo 'SierraLeoneHeritage.org | National Monuments';
            }
        } elseif(strstr($_SERVER['REQUEST_URI'], 'easmon') == true) {
            echo 'SierraLeoneHeritage.org | M C F Easmon';
        } else {
            echo 'SierraLeoneHeritage.org | Sites and Monuments';
        }
    } elseif(strstr($_SERVER['REQUEST_URI'], 'shukublai') == true) {
        echo 'SierraLeoneHeritage.org | Shuku Blai';
    } elseif(strstr($_SERVER['REQUEST_URI'], 'community') == true) {
        echo 'SierraLeoneHeritage.org | Community';
    } elseif(strstr($_SERVER['REQUEST_URI'], 'about') == true) {
        echo 'SierraLeoneHeritage.org | About';
    } elseif(strstr($_SERVER['REQUEST_URI'], 'contact') == true) {
            echo 'SierraLeoneHeritage.org | Contact';
    } else {
        echo 'SierraLeoneHeritage.org | Digital Heritage Resource';
    }
    echo '</title>';
	require_once ('baseurl.php');		
    ?>

<link href="<?php echo $assetsUrl; ?>images/favicon.ico" type="image/x-icon" rel="icon" />
<link rel="stylesheet" href="<?php echo $assetsUrl; ?>css/main.css" type="text/css" />
<link rel="stylesheet" href="<?php echo $assetsUrl; ?>js/fancybox/jquery.fancybox-1.3.4.css" type="text/css" />

<script src="<?php echo $assetsUrl; ?>js/jquery.js" type="text/javascript"></script>
<script src="<?php echo $assetsUrl; ?>js/fancybox/jquery.fancybox-1.3.4.pack.js" type="text/javascript"></script>
<script src="<?php echo $assetsUrl; ?>js/main.js" type="text/javascript"></script>