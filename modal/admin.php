<?php
$do = $_GET['do'];
include "../base.php";
$str = new Str($do);
?>
<div>
    <h2 class="cent"><?= $str->adddr; ?></h2>
    <hr>
    <form action="./api/add.php?do=<?= $do; ?>" method="POST" enctype="multipart/form-data">
        <table style="width:60%;margin:0 auto;">
            <tr>
                <td width="30%">
                    <?= $str->addtd[0]; ?>
                </td>
                <td>
                    <input type="text" name="acc" value="">
                </td>
            </tr>
            <tr>
                <td width="30%">
                    <?= $str->addtd[1]; ?>
                </td>
                <td>
                    <input type="password" name="pw" value="">
                </td>
            </tr>
            <tr>
                <td width="30%">
                    <?= $str->addtd[2]; ?>
                </td>
                <td>
                    <input type="password" name="pw2" value="">
                </td>
            </tr>
        </table>
        <div class="cent">
            <input type="submit" value="新增">
            <input type="reset" value="重置">
        </div>
    </form>
</div>