<?php
$do=$_GET['do'];
$parent=$_GET['id'];
include "../base.php";
$str=new Str($do);
?>
<h3 class="cent"><?=$str->uhd;?></h3>
<hr>
<form action="./api/save_sub.php?do=<?=$do;?>&parent=<?=$parent;?>" method="post" enctype="multipart/form-data">
<table class="w60 mg" id="mytb">
    <tr>
        <td><?=$str->utd[0];?></td>
        <td><?=$str->utd[1];?></td>
        <td>刪除</td>
    </tr>
    <?php
    foreach ($menu->all(['parent'=>$parent]) as $key => $sub) {
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
            <input type="hidden" name="id[]" value="<?=$sub['id'];?>">
        </td>
    </tr>
        <?php
    }
    ?>
</table>
<div class="cent">
    <input type="submit" value="新增">
    <input type="reset" value="重置">
    <button type="button" onclick="add_sub()">更多次選單</button>
</div>
</form>
<script>
    function add_sub(){
        $('#mytb').append(`
        <tr>
        <td>
        <input type="text" name="text2[]" value="">
        </td>
        <td>
        <input type="text" name="href2[]" value="">
        </td>
        </tr>
        `)
    }
</script>