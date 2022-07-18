<?php
$do = ($_GET['do']);
$id = ($_GET['id']);
include "../base.php";
$str = new Str($do);
?>

<h3 class="cent"><?= $str->updhdr; ?></h3>
<hr>
<form action="./api/edit_sub.php" enctype="multipart/form-data" method="POST">
    <table style="margin: 0 auto;" id="sunmennu">
        <tr>
            <td><label for=""><?= $str->updtd[0]; ?></label></td>
            <td><label for=""><?= $str->updtd[1]; ?></label></td>
            <td><label for="">刪除</label></td>
        </tr>
        <?php
        $arg=["parent"=>$id];
        foreach ($$do->all($arg) as $key => $value) {
        ?>
            <tr>
                <td><input type="text" name="text[]" value="<?=$value['text'];?>"></td>
                <td><input type="text" name="href[]" value="<?=$value['href'];?>"></td>
                <td><input type="checkbox" name="del[]" value="<?=$value['id'];?>"></td>
                <input type="hidden" name="id[]" value="<?=$value['id'];?>">
            </tr>
        <?php
        }
        ?>
    </table>
    <input type="hidden" name="table" value="<?= $do; ?>">
    <input type="hidden" name="parent" value="<?= $id; ?>">
    <div class="cent">
        <input type="submit" value="修改確定">
        <input type="reset" value="重置">
        <input type="reset" value="更多次選單" onclick="more()">
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