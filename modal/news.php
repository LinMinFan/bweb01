
<?php
$do=$_GET['do'];
include "../base.php";
$str=new str($do);


?>
<h3 class="cent"><?=$str->ahd;?></h3>
<hr>
<div>
    <form action="./api/add.php?do=<?=$do;?>" enctype="multipart/form-data" method="POST">
    <table style="width: 60%;margin:0 auto;">
        <tr>
            <td><?=$str->atd;?></td>
            <td><input type="text" name="text"></td>
        </tr>
    </table>
    <div class="cent"><input type="submit" value="新增"><input type="reset" value="重置"></div>
    </form>
</div>