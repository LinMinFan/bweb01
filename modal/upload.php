<?php
$do=$_GET['do'];
include "../base.php";
$str=new Str($do);
$id=$_GET['id'];
?>
<h3 class="cent"><?=$str->upbhd;?></h3>
<hr>
<form action="./api/upload.php?do=<?=$do;?>&id=<?=$id;?>" enctype="multipart/form-data" method="POST">
<table style="width:60%; margin: 0 auto">
    <tr>
        <td><?=$str->upbtd;?></td>
        <td>
            <input type="file" name="img">
        </td>
    </tr>
    <tr>
    <td class="cent"><input type="submit" value="更新"><input type="reset" value="重置"></td>
    </tr>
</table>
</form>