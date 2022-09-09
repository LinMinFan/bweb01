<?php
$do=$_GET['do'];
$id=$_GET['id'];
include "../base.php";
$str=new Str($do);
?>
<h3 class="cent"><?=$str->uhd;?></h3>
<hr>
<form action="./api/upload.php?do=<?=$do;?>" method="post" enctype="multipart/form-data">
<table class="w60 mg">
    <tr>
        <td><?=$str->utd;?></td>
        <td>
        <input type="file" name="img">
        <input type="hidden" name="id" value="<?=$id;?>">
        </td>
    </tr>
    </table>
<div class="cent">
    <input type="submit" value="更新">
    <input type="reset" value="重置">
</div>
</form>