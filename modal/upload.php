<?php
$do = $_GET['do'];
$id = $_GET['id'];
include "../base.php";
$str = new Str($do);
?>
<div>
    <h2 class="cent"><?= $str->updr; ?></h2>
    <hr>
    <form action="./api/upload.php?do=<?= $do; ?>&id=<?= $id; ?>" method="POST" enctype="multipart/form-data">
        <table style="width:60%;margin:0 auto;">
            <tr>
                <td>
                    <?= $str->uptd; ?>
                </td>
                <td>
                    <input type="file" name="img" value="<?= $$do->find[$id]['img']; ?>">
                </td>
            </tr>
        </table>
        <div class="cent">
            <input type="submit" value="更新">
            <input type="reset" value="重置">
        </div>
    </form>
</div>