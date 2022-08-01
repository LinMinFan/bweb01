<?php
$do = $_GET['do'];
include "../base.php";
$str = new str($do);
$id=$_GET['id'];
?>

<div>
    <h3 class="cent"><?= $str->uhd; ?></h3>
    <hr>
    <form action="./api/upload.php?do=<?= $do; ?>&id=<?=$id;?>" method="POST" enctype="multipart/form-data">
        <table style="width:60%;margin:0 auto">
            <tr>
                <td><?= $str->utd; ?></td>
                <td>
                    <input type="file" name="img" >
                </td>
            </tr>
            
            <tr>
            <td class="cent"><input type="submit" value="更新"><input type="reset" value="重置"></td>
            </tr>
        </table>
    </form>
</div>