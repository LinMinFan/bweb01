<?php
$do = ($_GET['do']) ?? 'title';
$id =$_GET['id'];
include "../base.php";
$str=new Str($do);
?>
<h3 class="cent"><?=$str->uphdr;?></h3>
<hr>
<?php
$titles = $$do->all(['parent'=>$id]);
?>
<form action="./api/edit_sub.php?do=<?=$do;?>" method="POST" enctype="multipart/form-data">
<table id="sunmennu" style="width:60%;margin:0 auto;">
    <tr class="yel">
        <td><?=$str->uptd[0];?></td>
        <td><?=$str->uptd[1];?></td>
        <td>刪除</td>
    </tr>
    <?php
    foreach ($titles as $key => $value) {
    ?>
    <tr>
        <td><input type="text" name="text[]" value="<?=$value['text'];?>"></td>
        <td><input type="text" name="href[]" value="<?=$value['href'];?>"></td>
        <td><input type="checkbox" name="del[]" value="<?=$value['id'];?>"></td>
    </tr>
    <input type="hidden" name="id[]" value="<?=$value['id'];?>">
    <?php
    }
    ?>
    <input type="hidden" name="parent" value="<?=$id;?>">
</table>
<div class="cent">
    <button type="submit">修改確定</button>
    <button type="reset">重置</button>
    <input type="button" value="更多次選單" onclick="more()">
</div>
</form>

<script>
    function more(){
        let row =`
        <tr>
                <td><input type="text" name="text2[]" value=""></td>
                <td><input type="text" name="href2[]" value=""></td>
                <td></td>
            </tr>
        `
        $('#sunmennu').append(row);
    }
</script>

