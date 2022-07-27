<?php
$do=$_GET['do'];
include "../base.php";
$str=new Str($do);
?>
<h3 class="cent"><?=$str->adbhd;?></h3>
<hr>
<form action="./api/add.php?do=<?=$do;?>" enctype="multipart/form-data" method="POST">
<table style="width:60%; margin: 0 auto">
    <tr>
        <td><?=$str->adbtd[0];?></td>
        <td><?=$str->adbtd[1];?></td>
    </tr>
    <tr>
        <td>
            <input type="text" name="text">
        </td>
        <td>
            <input type="text" name="href">
        </td>
    </tr>
    <tr>
    <td class="cent"><input type="submit" value="新增"><input type="reset" value="重置"></td>
    </tr>
</table>
</form>