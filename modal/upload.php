<?php
include "../base.php";
$do=$_GET['do'];
$str = new str($do);
?>
<h3 class="cent"><?=$str->uhd;?></h3>
<hr>
<div class="w100">
    <form action="./api/upload.php?do=<?=$do;?>&id=<?=$_GET['id'];?>" method="post" enctype="multipart/form-data">
    <table class="w80 mg">
        <tr>
            <td><?=$str->utd;?></td>
            <td>
                <input type="file" name="img" required>
            </td>
        </tr>
    </table>
    <div class="cent">
        <input type="submit" value="更換">
        <input type="reset" value="重置">
    </div>
    </form>
</div>