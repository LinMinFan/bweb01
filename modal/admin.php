<?php
$do = $_GET['do'];
include "../base.php";
$str = new str($do);
?>

<div>
    <h3 class="cent"><?= $str->ahd; ?></h3>
    <hr>
    <form action="./api/add.php?do=<?= $do; ?>" method="POST" enctype="multipart/form-data">
        <table style="width:60%;margin:0 auto">
            
            <tr>
                <td><?= $str->atd[0]; ?></td>
                <td>
                    <input type="text" name="acc" >
                </td>
            </tr>
            <tr>
                <td><?= $str->atd[1]; ?></td>
                <td>
                    <input type="password" name="pw" >
                </td>
            </tr>
            <tr>
                <td><?= $str->atd[2]; ?></td>
                <td>
                    <input type="password" name="pw2" >
                </td>
            </tr>
            <tr>
            <td class="cent"><input type="submit" value="新增"><input type="reset" value="重置"></td>
            </tr>
        </table>
    </form>
</div>