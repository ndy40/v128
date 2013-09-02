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
    
        <?= form_open_multipart('admin/view_institution'); ?>
        <table>
            <tr>
                <td>
                    <select name="institution">
                        <?php foreach($institutions as $option): ?>
                        <option><?= $option->institution_name ?></option>
                        <?php endforeach; ?>
                    </select>
                </td>
                <td><input type="submit" value="View" /></td>
            </tr>
        </table>
        <?= form_close(); ?>
        
        <table>
            <?php for($o=0; $o<sizeof($objects); $o++): ?>
            <tr>
                <td><?= $o+1 ?></td>
                <td>No Image</td>
                <td>
                    <table>
                        <?php for($nv=0; $nv<sizeof($object_nameValues[$o]); $nv++): ?>
                        <tr>
                            <td><?= $object_nameValues[$o][$nv]->name ?></td>
                            <td><?= $object_nameValues[$o][$nv]->value ?></td>
                        </tr>
                        <?php endfor; ?>
                    </table>
                </td>
            </tr>
            <?php endfor; ?>
        </table>
    </body>
</html>
