<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
    <p class="t cent botli"><?=$str->hdr;?></p>
    <form method="post" action="./api/edit.php?do=<?=$do;?>">
        <table width="100%">
            <tbody>
                <tr class="yel">
                    <td width="45%"><?=$str->hdrtd[0];?></td>
                    <td width="45%"><?=$str->hdrtd[1];?></td>
                    <td>刪除</td>
                </tr>
                <?php
                $titles = $$do->all();
                foreach ($titles as $key => $value) {
                    ?>
                <tr>
                <td><input type="text" name="acc[]" value="<?=$value['acc'];?>"></td>
                <td><input type="password" name="pw[]" value="<?=$value['pw'];?>"></td>
                <td><input type="checkbox" name="del[]" value="<?=$value['id'];?>"></td>
                <input type="hidden" name="id[]" value="<?=$value['id'];?>">
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
        <table style="margin-top:40px; width:70%;">
            <tbody>
                <tr>
                    <td width="200px"><input type="button" onclick="op(&#39;#cover&#39;,&#39;#cvr&#39;,&#39;./modal/<?=$do;?>.php?do=<?=$do;?>&#39;)" value="<?=$str->addbtn  ;?>"></td>
                    <td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置"></td>
                </tr>
            </tbody>
        </table>

    </form>
</div>