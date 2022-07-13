<?php
include "../base.php";
$id = $_GET['id'];
$table = $_GET['table'];
//echo $table;
$str = new Str($table);
?>
<div class="add_box">
<h3><?=$str->uploadheader;?></h3>
<form action="./api/upload.php" method="post" enctype="multipart/form-data">
    <div>
        <label for=""><?=$str->uploadimgtext;?></label><input type="file" name="img">
    </div>
    <div class="add_btn">
        <input type="hidden" name="id" value="<?=$id;?>">
        <input type="hidden" name="table" value="<?=$table;?>">
        <input type="submit" value="更新">
        <input type="reset" value="重置">
    </div>
</form>
</div>
