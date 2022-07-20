<?php
$do = ($_GET['do']) ?? 'title';
include "../base.php";
$str=new Str($do);
?>
<h3 class="cent"><?=$str->addhdr;?></h3>
<hr>
<form action="./api/add.php" method="POST" enctype="multipart/form-data">
<table style="width:60%;margin:0 auto;">
    <tr class="yel">
        <td><?=$str->addtd[0];?></td>
        <td><?=$str->addtd[1];?></td>
    </tr>
    <tr>
        <td><input type="text" name="text"></td>
        <td><input type="text" name="href"></td>
    </tr>
   <input type="hidden" name="table" value="<?=$do;?>">
</table>
<div class="cent">
    <button type="submit">新增</button>
    <button type="reset">重置</button>
</div>
</form>