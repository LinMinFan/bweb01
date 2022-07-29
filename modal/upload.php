<?php
$do=$_GET['do'];
include "../base.php";
$str=new Str($do);
$id=$_GET['id'];
?>
<h3 class="cent"><?=$str->uhd;?></h3>
<form action="./api/upload.php?do=<?=$do;?>&id=<?=$id;?>"  enctype="multipart/form-data" method="POST">
    <table style="width:60%;margin:auto">
    <tr>
        <td><?=$str->utd;?></td>
        <td><input type="file" name="img" value=""></td>
    </tr>
    <tr>
        <td><input type="submit" value="更新"></td>
        <td><input type="reset" value="重置"></td>
    </tr>
    </table>
</form>