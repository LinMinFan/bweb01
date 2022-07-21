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
                <td width="50%">
                    <?= $str->addtd[0]; ?>
                </td>
                <td>
                    <?= $str->addtd[1]; ?>
                </td>
            </tr>
            <tr>
                <td width="50%">
                    <input type="text" name="text" value="">
                </td>
                <td>
                    <input type="text" name="href" value="">
                </td>
            </tr>
        </table>
        <div class="cent">
            <input type="submit" value="新增">
            <input type="reset" value="重置">
        </div>
    </form>
</div>