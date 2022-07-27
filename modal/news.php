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
        <td><?=$str->adbtd;?></td>
        <td>
            <textarea name="text" style="width:100%; height:60px"></textarea>
        </td>
    </tr>
    <tr>
    <td class="cent"><input type="submit" value="新增"><input type="reset" value="重置"></td>
    </tr>
</table>
</form>