<!DOCTYPE HTML SYSTEM>
<?php include('../baseurl.php'); ?>

<html>
    <head>
        <?php include ('../header.php'); ?>
    </head>
    
    <body>
        <?php $id1 = 'museum'; ?>
        <?php include('../body.php'); ?>
        <?php include('../menu.php'); ?>
        
        <div id="article">
            <div class="banner">
                <img src="<?php echo $assetsUrl; ?>images/banners/museum/1.jpg" />
            </div>
            
            <h2>Sierra Leone National Museum</h2>
            
            <div class="box right">
                <h3 class="boxedTitle">Contact</h3>
		<p>
                    Sierra Leone National Museum<br />
                    Cotton Tree<br />
                    Freetown<br />
                    Sierra Leone
                </p>
		<p>The Acting Curator is Ms. Josephine Kargbo</p>
            </div>
            
            <p>
                Sierra Leone’s National Museum is located at the centre of Freetown under the branches of the city’s 
                famous Cotton Tree. It is the hub of many cultural activities in Freetown and holds an important collection 
                of Sierra Leonean artefacts and artworks.
            </p>
            
            <p>
                The museum was opened in 1957 as the museum of the Sierra Leone Society, a ‘learned society’ whose 
                members included colonial officials and prominent members of Freetown’s Krio community. With the 
                demise of the Sierra Leone Society in the mid-1960s, the museum came under the control of Sierra Leone’s 
                Monuments and Relics Commission and Ministry of Tourism and Cultural Affairs, and thus became the 
                Sierra Leone National Museum.
            </p>
            
            <p>
                The museum has rarely benefitted from significant financial resources and has survived largely due to 
                the commitment of its dedicated staff. It still occupies what was originally intended to be temporary 
                accommodation in the old Cotton Tree railway station at the junction of Siaka Stevens Street and Pademba 
                Road. The German Embassy funded an extension to the museum, which was opened in 1987 to mark the 
                bicentenary of the founding of Freetown.
            </p>
        </div>
        
        <?php include ('../footer.php'); ?>
    </body>
</html>