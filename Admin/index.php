
 
<?php include('../baseurl.php'); ?>

<html>
    <head>
		
        <?php include('../header.php'); ?>
    </head>

    <body>
        <?php $id1 = 'admin'; ?>
        <?php include('../body.php'); ?>
        <?php include('../menu.php'); ?>

        <div id="article" >
 <!--           <div class="banner">
                <img src="<?php echo $assetsUrl; ?>/assets/images/banners/2.jpg" />
            </div>
-->
            <h2>Admin Panel</h2>

            <p>
                This page is for the administrator  of this site.This page will help to import and export the xml file in 
                MySQL database and also used to maintain the database.
            </p>

            <div id="tabs">
                <ul class="menu clear fullWidth">
                    <li><a href="#tabs-1" class="active">Import XML File</a></li>
                    <li><a href="#tabs-2">Export XML file</a></li>
                    <li><a href="#tabs-3">Database Query</a></li>

                </ul>
                <!--<div id="tabs-0" class="box">
                	<p> <b>Please enter Admin login id and password </b> </p>
                        <input type="text" name="admin"  size="30" style="border-style: solid; border-width: 1px; border-color: black;"/><br>
                        <input type="password" name="admin"  size="30" style="border-style: solid; border-width: 1px; border-color: black;"/><br>
                        <a href="#tab-2"> Login </a>
                        
                </div>
                -->
                
                <div id="tabs-1" class="box">
                    <h3>Import XML File</h3>
                    <form action="upload_file.php" method="post"
                          enctype="multipart/form-data">
                        <label for="file">Filename:</label>
                        <input type="file" name="file" id="file" /> 
                        <br />
                        <input type="submit" name="submit" value="Submit" />
                    </form>

                    <ul>

                    </ul>
                </div>
                <div id="tabs-2" class="box">
                    <h3>Export XML file</h3>
                    <form action="export.php"" method="post">
                          <select name="Museum">
                            <option name="">Choose a Museum:</option>
                            <option name="1">Brighton Museum and Art Gallery</option>
                            <option name="2">British Museum</option>
                            <option name="3">British Library</option>
                            <option name="4">Glasgow Museums</option>
                            <option name="5">World Museum Liverpool Sierra Leone Collection</option>
                            <option name="6">Sierra Leone National Museum</option> 
                        </select>
                        <input type="submit" name="submit" value="Submit" />
                    </form>
                    <ul>

                    </ul>
                </div>
                <div id="tabs-3" class="box">
                    <form name="Search" action="edit.php" method="POST">
                    	<p> <b>Please enter some text to search </b> </p>
                        <input type="text" name="Search"  size="30" style="border-style: solid; border-width: 1px; border-color: black;"/>
                        <input type="submit"  name="submit" value="Submit" onClick="window.close()"  />
                    </form>

                    </ul>
                </div>
                <?php include('../footer.php'); ?>
                </body>
                </html