<?php
$do=$_GET['do'];
include "../base.php";
$str=new Str($do);
$subs=$$do->all(['parent'=>$_GET['id']]);
?>
<h3 class="cent"><?=$str->upbhd;?></h3>
<hr>
<form action="./api/edit_sub.php?do=<?=$do;?>&parent=<?=$_GET['id'];?>" enctype="multipart/form-data" method="POST">
<table style="width:60%; margin: 0 auto" id="add">
    <tr>
        <td><?=$str->upbtd[0];?></td>
        <td><?=$str->upbtd[1];?></td>
        <td>刪除</td>
    </tr>
    <?php
    foreach ($subs as $key => $sub) {
    ?>
    <tr>
        <td>
            <input type="text" name="text[]" value="<?=$sub['text'];?>">
        </td>
        <td>
            <input type="text" name="href[]" value="<?=$sub['href'];?>">
        </td>
        <td>
            <input type="checkbox" name="del[]" value="<?=$sub['id'];?>">
        </td>
        <input type="hidden" name="id[]" value="<?=$sub['id'];?>">
    </tr>
    <?php
    }
    ?>
</table>
<div class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置"><input type="button" value="更多次選單" onclick="add()"></div>
</form>

<script>
    function add() {
        $('#add').append("<tr><td><input type='text' name='text2[]'></td><td><input type='text' name='href2[]'></td></tr>")
    }
</script>