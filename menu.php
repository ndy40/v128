<div class="aside" id="menu">
    <ul id="mainNav">
        <?php
            if(!isset($id1)) $id1 = '';
            if(!isset($id2)) $id2 = '';
            if(!isset($id3)) $id3 = '';
            if(!isset($id4)) $id4 = '';
			$db_type= "_db";
            if($id1 == 'home') {
                echo '<li class="active"><a href="' . $baseUrl . '" class="colour1">Home</a></li>';
            } else {
                echo '<li><a href="' . $baseUrl . '" class="colour1">Home</a></li>';
            }

            if($id1 == 'browse') {
                echo '<li class="active"><a href="' . $baseUrl . 'index.php/browse/browse' . $db_type . '" class="colour2">Browse collections</a></li>';
            } else {
                echo '<li><a href="' . $baseUrl . 'index.php/browse/browse' . $db_type . '" class="colour2">Browse collections</a></li>';
            }

            if($id1 == 'search') {
                echo '<li class="active"><a href="' . $baseUrl . 'index.php/search/search' . $db_type . '" class="colour3">Search collections</a></li>';
            } else {
                echo '<li><a href="' . $baseUrl . 'index.php/search/search' . $db_type . '" class="colour3">Search collections</a></li>';
            }

            if($id1 == 'videogallery') {
                echo '<li class="active"><a href="' . $baseUrl . 'index.php/video/gallery/" class="colour8">Video Gallery</a></li>';
            } else {
                echo '<li><a href="' . $baseUrl . 'index.php/video/gallery/" class="colour8">Video Gallery</a></li>';
            }

            if($id1 == 'glossary') {
                echo '<li class="active"><a href="' . $baseUrl . 'glossary/" class="colour4">Glossary</a></li>';
            } else {
                echo '<li><a href="' . $baseUrl . 'glossary/" class="colour4">Glossary</a></li>';
            }

            if($id1 == 'museum') {
                echo '<li class="active"><a href="' . $baseUrl . 'museum/" class="colour5">Sierra Leone National<br /> Museum</a></li><ul><li ';
                if($id2 == 'history') {
                    echo 'class="active"';
                }

                echo '><a href="' . $baseUrl . 'museum/history/">History</a></li><li ';
                if($id2 == 'railway-museum') {
                    echo 'class="active"';
                }

                echo '><a href="' . $baseUrl . 'museum/railway-museum/">National Railway Museum</a></li></ul>';
            } else {
                echo '<li><a href="' . $baseUrl . 'museum/" class="colour5">Sierra Leone National<br /> Museum</a></li>';
            }

            if($id1 == 'sites') {
                echo '<li class="active"><a href="' . $baseUrl . 'sites/" class="colour6">Sites and monuments</a></li><ul><li ';
                if($id2 == 'legislation') {
                    echo 'class="active"';
                }

                echo '><a href="' . $baseUrl . 'sites/legislation/">Heritage Legislation</a></li><li ';
                if($id2 == 'monuments') {
                    echo 'class="active"><a href="' . $baseUrl . 'sites/monuments/">National Monuments</a></li><ul><li '; 
                    if($id3 == 'bruce') {
                        echo 'class="active"';
                    }

                    echo '><a href="' . $baseUrl . 'sites/monuments/bunce/">Bunce Island</a></li><li ';
                    if($id3 == 'heddle') {
                        echo 'class="active"';
                    }

                    echo '><a href="' . $baseUrl . 'sites/monuments/heddle/">Heddle&#39;s Farm</a></li><li ';
                    if($id3 == 'deruyterstone') {
                        echo 'class="active"';
                    }

                    echo '><a href="' . $baseUrl . 'sites/monuments/deruyterstone/">De Ruyter Stone</a></li><li ';
                    if($id3 == 'fortthornton') {
                        echo 'class="active"';
                    }

                    echo '><a href="' . $baseUrl . 'sites/monuments/fortthornton/">Bastions of Fort Thornton</a></li><li ';
                    if($id3 == 'masakpaidu') {
                        echo 'class="active"';
                    }

                    echo '><a href="' . $baseUrl . 'sites/monuments/masakpaidu/">Earthworks at Masakpaidu</a></li><li ';
                    if($id3 == 'kingsyard') {
                        echo 'class="active"';
                    }

                    echo '><a href="' . $baseUrl . 'sites/monuments/kingsyard/">Gateway to King&#39;s Yard</a></li><li ';
                    if($id3 == 'ruinsjohnnewton') {
                        echo 'class="active"';
                    }

                    echo '><a href="' . $baseUrl . 'sites/monuments/ruinsjohnnewton/">John Newton&#39;s House</a></li><li ';
                    if($id3 == 'cleveland') {
                        echo 'class="active"';
                    }

                    echo '><a href="' . $baseUrl . 'sites/monuments/cleveland/">Cleveland Tombstone</a></li><li ';
                    if($id3 == 'oldwharf') {
                        echo 'class="active"';
                    }

                    echo '><a href="' . $baseUrl . 'sites/monuments/oldwharf/">Old Wharf Steps</a></li><li ';
                    if($id3 == 'oldcity') {
                        echo 'class="active"';
                    }

                    echo '><a href="' . $baseUrl . 'sites/monuments/oldcity/">Old city boundary guns</a></li><li ';
                    if($id3 == 'oldfourahbay') {
                        echo 'class="active"';
                    }

                    echo '><a href="' . $baseUrl . 'sites/monuments/oldfourahbay/">Old Fourah Bay College</a></li><li ';
                    if($id3 == 'stjohn') {
                        echo 'class="active"';
                    }

                    echo '><a href="' . $baseUrl . 'sites/monuments/stjohn/">St John&#39;s Maroon Church</a></li><li ';
                    if($id3 == 'stcharles') {
                        echo 'class="active"';
                    }

                    echo '><a href="' . $baseUrl . 'sites/monuments/stcharles/">St Charles&#39; Church</a></li><li ';
                    if($id3 == 'firingpoint') {
                        echo 'class="active"';
                    }

                    echo '><a href="' . $baseUrl . 'sites/monuments/firingpoint/">Firing point and guns</a></li><li ';
                    if($id3 == 'martello') {
                        echo 'class="active"';
                    }

                    echo '><a href="' . $baseUrl . 'sites/monuments/martello/">Martello Tower</a></li><li ';
                    if($id3 == 'captainlendy') {
                        echo 'class="active"';
                    }

                    echo '><a href="' . $baseUrl . 'sites/monuments/captainlendy/">Grave of Captain Lendy</a></li></ul>';
                } else {
                    echo '<li><a href="' . $baseUrl . 'sites/monuments/">National Monuments</a></li>';
                }

                echo '<li ';
                if($id2 == 'easmon') {
                    echo 'class="active"';
                }

                echo '><a href="' . $baseUrl . 'sites/easmon/">MCF Easmon</a></li></ul>';
            } else {
                echo '<li><a href="' . $baseUrl . 'sites/" class="colour7">Sites and monuments</a></li>';
            }

            if($id1 == 'shukublai') {
                echo '<li class="active"><a href="' . $baseUrl . 'shukublai/" class="colour8">Shuku Blai</a></li>';
            } else {
                echo '<li><a href="' . $baseUrl . 'shukublai/" class="colour8">Shuku Blai</a></li>';
            }
			
			//Admin Pannel
		/*	if($id1 == 'Admin') {
                echo '<li class="active"><a href="' . $baseUrl . 'Admin/" class="colour3">Admin Panel</a></li>';
            } else {
                echo '<li><a href="' . $baseUrl . 'Admin/" class="colour3">Admin Panel</a></li>';
            }
		*/	
	     if($id1 == 'community') {
                echo '<li class="active"><a href="' . $baseUrl . 'community/" class="colour9">Facebook Community</a></li><ul><li ';
                if($id2 == 'fb_wallfeed') {
                    echo 'class="active"';
                }
                echo '><a href="' . $baseUrl . 'community/fb_wallfeed.php">Community Wall</a></li><li ';

                if($id2 == 'fb_members') {
                    echo 'class="active"';
                }
				echo '><a href="' . $baseUrl . 'community/fb_members.php">Community Members</a></li><li ';

                if($id2 == 'fb_photos') {
                    echo 'class="active"';
                }
                echo '><a href="' . $baseUrl . 'community/fb_photos.php">Community Photo Gallery</a></li><li ';
                if($id2 == 'fb_video') {
                    echo 'class="active"';
                }

                echo '><a href="' . $baseUrl . 'community/fb_videos.php">Community Video Gallery</a></li><li ';
				if($id2 == 'fb_photo_upload') {
                    echo 'class="active"';
                }

                echo '><a href="' . $baseUrl . 'community/fb_photo_upload.php">Upload Photos</a></li><li ';
				if($id2 == 'fb_video_upload') {
                    echo 'class="active"';
                }

                echo '><a href="' . $baseUrl . 'community/fb_video_upload.php">Upload Videos</a></li></ul>';
				
            } else {
                echo '<li><a href="' . $baseUrl . 'community/" class="colour9">Facebook Community</a></li>';
            }
			
	/*		if($id4 == 'associatedmedia') {
				include('videogallery/associatedmedia.php');
			} */
        ?>
    </ul>
</div>
