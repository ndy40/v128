<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE HTML SYSTEM>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <?= $message ?>
        
        <?= form_open_multipart('admin/upload_xml'); ?>
        <table>
            <tr>
                <td><input type="file" name="userfile" size="20" /></td>
                <td><input type="submit" value="Upload" /></td>
            </tr>
        </table>
        <?= form_close(); ?>
        
        <br /><br />
        <?= anchor('admin/view_db', 'View Database'); ?>
    </body>
</html>
