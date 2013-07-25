<!DOCTYPE HTML SYSTEM>
<?php include('baseurl.php'); ?>

<html>
    <head>
        <?php include('header.php'); ?>
    </head>
    
    <body>
        <?php include('body.php'); ?>
        <?php include('menu.php'); ?>
        
        <?php echo $message ?>
        
        <?php echo form_open_multipart('admin/upload_xml'); ?>
        <table>
            <tr>
                <td><input type="file" name="userfile" size="20" /></td>
                <td><input type="submit" value="Upload" /></td>
            </tr>
        </table>
        <?php echo form_close(); ?>
        
        <br /><br />
        <?php echo anchor('admin/view_db', 'View Database'); ?>
    </body>
</html>
