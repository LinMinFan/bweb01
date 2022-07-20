<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
    <p class="t cent botli"><?=$str->hdr;?></p>
    <form method="post" action="./api/edit.php?do=<?=$do;?>">
        <table width="100%">
            <tbody>
                <tr class="yel">
                    <td width="34%"><?=$str->hdrtd[0];?></td>
                    <td width="34%"><?=$str->hdrtd[1];?></td>
                    <td width="8%"><?=$str->hdrtd[2];?></td>
                    <td width="6%">顯示</td>
                    <td width="6%">刪除</td>
                    <td></td>
                </tr>
                <?php
                $titles = $$do->all(['parent'=>0]);
                foreach ($titles as $key => $value) {
                    ?>
                <tr>
                <td><input type="text" name="text[]" value="<?=$value['text'];?>" style="width:80%;"></td>
                <td><input type="text" name="href[]" value="<?=$value['href'];?>" style="width:80%;"></td>
                <td><?=$$do->math('count','id',['parent'=>$value['id']]);?></td>
                <td><input type="checkbox" name="sh[]" value="<?=$value['id'];?>" <?=($value['sh']==1)?"checked":"";?>></td>
                <td><input type="checkbox" name="del[]" value="<?=$value['id'];?>"></td>
                <td><input type="button" onclick="op(&#39;#cover&#39;,&#39;#cvr&#39;,&#39;./modal/edit_sub.php?do=<?=$do;?>&id=<?=$value['id'];?>&#39;)" value="<?=$str->upbtn  ;?>"></td>
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