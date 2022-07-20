<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
    <p class="t cent botli"><?=$str->hdr;?></p>
    <form method="post" action="./api/edit.php?do=<?=$do;?>">
        <table width="100%">
            <tbody>
                <tr class="yel">
                    <td width="45%"><?=$str->hdrtd[0];?></td>
                    <td width="23%"><?=$str->hdrtd[1];?></td>
                    <td width="7%">顯示</td>
                    <td width="7%">刪除</td>
                    <td></td>
                </tr>
                <?php
                $titles = $$do->all();
                foreach ($titles as $key => $value) {
                    ?>
                <tr>
                <td width="45%"><img src="./img/<?=$value['img'];?>" style="width:300px;height:30px"></td>
                <td width="23%"><input type="text" name="text[]" value="<?=$value['text'];?>"></td>
                <td width="7%"><input type="radio" name="sh[]" value="<?=$value['id'];?>" <?=($value['sh']==1)?"checked":"";?>></td>
                <td width="7%"><input type="checkbox" name="del[]" value="<?=$value['id'];?>"></td>
                <td width="200px"><input type="button" onclick="op(&#39;#cover&#39;,&#39;#cvr&#39;,&#39;./modal/upload.php?do=<?=$do;?>&id=<?=$value['id'];?>&#39;)" value="<?=$str->upbtn  ;?>"></td>
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