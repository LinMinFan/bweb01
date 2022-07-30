<?php
$do = $_GET['do'];
include "../base.php";
$str = new str($do);
?>

<div>
    <h3 class="cent"><?= $str->ahd; ?></h3>
    <form action="./api/add.php?do=<?= $do; ?>" method="POST" enctype="multipart/form-data">
        <table style="width:60%; margin:0 auto;">
            
            <tr>
                <td><?= $str->atd; ?></td>
                <td>
                 <textarea name="text" style="width:90%; height:50px"></textarea>   
                </td>
            </tr>
            <tr>
                <td class="cent"><input type="submit" value="新增"><input type="reset" value="重置"></td>
            </tr>
        </table>
    </form>
</div>