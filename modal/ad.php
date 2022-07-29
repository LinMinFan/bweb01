<?php
$do=$_GET['do'];
include "../base.php";
$str=new Str($do);
?>
<h3 class="cent"><?=$str->ahd;?></h3>
<form action="./api/add.php?do=<?=$do;?>"  enctype="multipart/form-data" method="POST">
    <table style="width:60%;margin:auto">

    <tr>
        <td><?=$str->atd;?></td>
        <td><input type="text" name="text" value=""></td>
    </tr>
    <tr>
        <td><input type="submit" value="新增"></td>
        <td><input type="reset" value="重置"></td>
    </tr>
    </table>
</form>