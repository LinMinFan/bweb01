<?php
$do = ($_GET['do']) ?? 'title';
include "../base.php";
$str=new Str($do);
?>
<h3 class="cent"><?=$str->addhdr;?></h3>
<hr>
<form action="./api/add.php" method="POST" enctype="multipart/form-data">
<table style="width:60%;margin:0 auto;">
    <tr>
        <td><?=$str->addtd;?></td>
        <td><textarea name="text" style="width:80%;height:60px"></textarea></td>
    </tr>
   <input type="hidden" name="table" value="<?=$do;?>">
</table>
<div class="cent">
    <button type="submit">新增</button>
    <button type="reset">重置</button>
</div>
</form>