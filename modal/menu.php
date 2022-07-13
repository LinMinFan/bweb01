<?php
$do = $_GET['do']??'title';
include "../base.php";
$str = new Str($do);
?>
<div class="add_box">
<h3><?=$str->addmodalheader;?></h3>
<form action="./api/add.php" method="post">
    <table>
        <tr>
            <td><label for=""><?=$str->addmodaltext[0];?></label></td>
            <td><label for=""><?=$str->addmodaltext[1];?></label></td>
        </tr>
        <tr>
            <td><input type="text" name="text"></td>
            <td><input type="text" name="href"></td>
        </tr>
    </table>
    <div class="add_btn">
        <input type="hidden" name="table" value="<?=$do;?>">
        <input type="submit" value="新增">
        <input type="reset" value="重置">
    </div>
</form>
</div>

