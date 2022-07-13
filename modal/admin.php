<?php
$do = $_GET['do']??'title';
include "../base.php";
$str = new Str($do);
?>
<div class="add_box">
<h3><?=$str->addmodalheader;?></h3>
<form action="./api/add.php" method="post" enctype="multipart/form-data">
    <div class="add_text">
        <label for=""><?=$str->addmodaltext[0];?></label>
        <input type="text" name="acc">
    </div>
    <div class="add_text">
        <label for=""><?=$str->addmodaltext[1];?></label>
        <input type="password" name="pw">
    </div>
    <div class="add_text">
        <label for=""><?=$str->addmodaltext[2];?></label>
        <input type="password" name="pw2">
    </div>
    <div class="add_btn">
        <input type="hidden" name="table" value="<?=$do;?>">
        <input type="submit" value="新增">
        <input type="reset" value="重置">
    </div>
</form>
</div>
