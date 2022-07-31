
<?php
$do=$_GET['do'];
include "../base.php";
$str=new str($do);
$parent=$_GET['id'];


?>
<h3 class="cent"><?=$str->uhd;?></h3>
<hr>
<div>
    <form action="./api/edit_sub.php?do=<?=$do;?>&parent=<?=$parent;?>" enctype="multipart/form-data" method="POST">
    <table style="width: 60%;margin:0 auto;" id="mytb">
        <tr>
            <td><?=$str->utd[0];?></td>
            <td><?=$str->utd[1];?></td>
            <td>刪除</td>
        </tr>
        <?php
        $subs=$menu->all(['parent'=>$parent]);
        foreach ($subs as $key => $sub) {
        ?>
        <tr>
            <td><input type='text' name='text[]' value="<?=$sub['text'];?>"></td>
            <td><input type='href' name='href[]' value="<?=$sub['href'];?>"></td>
            <td><input type="checkbox" name='del[]' value="<?=$sub['id'];?>"></td>
            <td><input type="hidden" name='id[]' value="<?=$sub['id'];?>"></td>
        </tr>
        <?php
        }    
        ?>
        
    </table>
    <div class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置"><input type="button" value="更多次選單" onclick="more()"></div>
    </form>
</div>

<script>
    function more(){
        $('#mytb').append("<tr><td><input type='text' name='text2[]'></td><td><input type='href' name='href2[]'></td></tr>");
    }
</script>