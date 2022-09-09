<?php
$do=$_GET['do'];
include "../base.php";
$str=new Str($do);
?>
<h3 class="cent"><?=$str->ahd;?></h3>
<hr>
<form action="./api/save.php?do=<?=$do;?>" method="post" enctype="multipart/form-data">
<table class="w60 mg">
    <tr>
        <td><?=$str->atd[0];?></td>
        <td>
        <input type="text" name="acc">
        </td>
    </tr>
    <tr>
        <td><?=$str->atd[1];?></td>
        <td>
        <input type="password" name="pw">
        </td>
    </tr>
    <tr>
        <td><?=$str->atd[2];?></td>
        <td>
        <input type="password" name="pw2">
        </td>
    </tr>
</table>
<div class="cent">
    <input type="submit" value="新增">
    <input type="reset" value="重置">
</div>
</form>