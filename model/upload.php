<?php
$do=$_GET['do']??"title";
include "../base.php";
$str=new str($do);
?>
<h3 class="cent"><?=$str->uhd;?></h3>
<hr>
<form action="./api/upload.php?do=<?=$do;?>" method="post" enctype="multipart/form-data">
<table class="w60 mg">
    <tr>
        <td><?=$str->utd;?></td>
        <td>
            <input type="file" name="img" id="">
            <input type="hidden" name="id" value="<?=$_GET['id'];?>">
        </td>
    </tr>

</table>
<div class="cent">
    <input type="submit" value="更新">
    <input type="reset" value="重置">
</div>
</form>