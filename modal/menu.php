<?php
$do = ($_GET['do']);
include "../base.php";
$str = new Str($do);
?>

<h3 class="cent"><?= $str->addhdr; ?></h3>
<hr>
<form action="./api/add.php" enctype="multipart/form-data" method="POST">
    <table style="margin: 0 auto;">
        <tr>
            <td><label for=""><?= $str->addtd[0]; ?></label></td>
            <td><label for=""><?= $str->addtd[1]; ?></label></td>
        </tr>
        <tr>
            <td><input type="text" name="text"></td>
            <td><input type="text" name="href"></td>
        </tr>
    </table>
    <input type="hidden" name="table" value="<?= $do; ?>">
    <div class="cent">
        <input type="submit" value="新增">
        <input type="reset" value="重置">
    </div>
</form>