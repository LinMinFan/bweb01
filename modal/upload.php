<?php
$do = ($_GET['do']);
$id = ($_GET['id']);
include "../base.php";
$str = new Str($do);
?>

<h3 class="cent"><?= $str->updhdr; ?></h3>
<hr>
<form action="./api/upload.php" enctype="multipart/form-data" method="POST">
    <table style="margin: 0 auto;">
        <tr>
            <td><label for=""><?= $str->updtd; ?></label></td>
            <td><input type="file" name="img"></td>
        </tr>
    </table>
    <input type="hidden" name="table" value="<?= $do; ?>">
    <input type="hidden" name="id" value="<?= $id; ?>">
    <div class="cent">
        <input type="submit" value="更新">
        <input type="reset" value="重置">
    </div>
</form>