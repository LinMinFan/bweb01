<?php
$do = ($_GET['do']) ?? 'title';
include "../base.php";
$str=new Str($do);
?>
<h3 class="cent"><?=$str->uphdr;?></h3>
<hr>
<form action="./api/upload.php" method="POST" enctype="multipart/form-data">
<table style="width:60%;margin:0 auto;">
    <tr>
        <td><?=$str->uptd;?></td>
        <td><input type="file" name="img"></td>
    </tr>
    <input type="hidden" name="table" value="<?=$do;?>">
    <input type="hidden" name="id" value="<?=$_GET['id'];?>">
</table>
<div class="cent">
    <button type="submit">更新</button>
    <button type="reset">重置</button>
</div>
</form>