<?php
$do = $_GET['do'];
include "../base.php";
$str = new Str($do);
$parent=$_GET['parent'];
?>
<div>
    <h2 class="cent"><?= $str->updr; ?></h2>
    <hr>
    <form action="./api/edit_sub.php?do=<?= $do; ?>&parent=<?=$parent;?>" method="POST" enctype="multipart/form-data">
        <table id="adsub" style="width:60%;margin:0 auto;">
            <tr>
                <td width="50%">
                    <?= $str->uptd[0]; ?>
                </td>
                <td>
                    <?= $str->uptd[1]; ?>
                </td>
                <td>
                    刪除
                </td>
            </tr>
            <?php
            $subob=$$do->all(['parent'=>$parent]);
            foreach ($subob as $key => $sob) {
            ?>
            <tr>
                <td width="50%">
                    <input type="text" name="text[]" value="<?=$sob['text'];?>">
                </td>
                <td>
                    <input type="text" name="href[]" value="<?=$sob['href'];?>">
                </td>
                <td>
                    <input type="checkbox" name="del[]" value="<?=$sob['id'];?>">
                </td>
                <input type="hidden" name="id[]" value="<?=$sob['id'];?>">
            </tr>
            <?php
            }
            ?>
            
        </table>
        <div class="cent">
            <input type="submit" value="修改確定">
            <input type="reset" value="重置">
            <input type="button" value="更多次選單" onclick="more()">
        </div>
    </form>
</div>
<script>
    function more(){
        let row =`<tr>
                <td>
                    <input type="text" name="text2[]" value="">
                </td>
                <td>
                    <input type="text" name="href2[]" value="">
                </td>
            </tr>`

            $('#adsub').append(row);
    }
</script>