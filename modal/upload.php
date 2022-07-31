<?php
$do = $_GET['do'];
include "../base.php";
$id = $_GET['id'];
$str = new str($do);


?>
<h3 class="cent"><?= $str->uhd; ?></h3>
<hr>
<div>
    <form action="./api/upload.php?do=<?= $do; ?>&id=<?= $id; ?>" enctype="multipart/form-data" method="POST">
        <table style="width: 60%;margin:0 auto;">
            <tr>
                <td><?= $str->utd; ?></td>
                <td><input type="file" name="img"></td>
            </tr>
            
        </table>
        <div class="cent"><input type="submit" value="更新"><input type="reset" value="重置"></div>
    </form>
</div>