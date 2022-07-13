<?php
$do = $_GET['table'];
$id = $_GET['id'];
include "../base.php";
$str = new Str($do);
$subs=$$do->all(['parent'=>$id]);
?>
<div class="add_box">
<h3><?=$str->uploadheader;?></h3>
<form action="./api/edit_sub.php" method="post">
    <table id="submenu">
        <tr>
            <td><label for=""><?=$str->uploadimgtext[0];?></label></td>
            <td><label for=""><?=$str->uploadimgtext[1];?></label></td>
            <td><label for="">刪除</label></td>
        </tr>
        <?php 
        foreach ($subs as $key => $sub) {
        ?>
        <tr>
            <td><input type="text" name="text[]" value="<?=$sub['text'];?>"></td>
            <td><input type="text" name="href[]" value="<?=$sub['href'];?>"></td>
            <td><input type="checkbox" name="del[]" value="<?=$sub['id'];?>"></td>
        </tr>
            <input type="hidden" name="id[]" value="<?=$sub['id'];?>">
        <?php
        }
        ?>
    </table>
    <div class="add_btn">
        <input type="hidden" name="parent" value="<?=$id;?>">
        <input type="submit" value="修改確定">
        <input type="reset" value="重置">
        <input type="button" value="<?=$str->uploadimgbut;?>" onclick="more()">
    </div>
</form>

<script>
    function more(){
    let row=`<tr>
        <td><input type="text" name="text2[]" value=""></td>
        <td><input type="text" name="href2[]" value=""></td>
        <td></td>
        </tr>`
    $("#submenu").append(row)
}
</script>
</div>

