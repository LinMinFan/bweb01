
    <div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
        <p class="t cent botli"><?=$str->hd;?></p>
        <form method="post" action="./api/edit.php?do=<?=$do;?>">
            <table width="100%">
                <tbody>
                    <tr class="yel">
                        <td width="45%"><?=$str->td[0];?></td>
                        <td width="23%"><?=$str->td[1];?></td>
                        <td width="7%">顯示</td>
                        <td width="7%">刪除</td>
                        <td></td>
                    </tr>
                    <?php
                    $tts=$$do->all();
                    foreach ($tts as  $tt) {
                    ?>
                    <tr>
                        <td><img src="./img/<?=$tt['img'];?>" width="300px" height="30px"></td>
                        <td><input type="text" name="text[]" value="<?=$tt['text'];?>"></td>
                        <td><input type="radio" name="sh[]" value="<?=$tt['id'];?>" <?=($tt['sh']==1)?"checked":"";?>></td>
                        <td><input type="checkbox" name="del[]" value="<?=$tt['id'];?>"></td>
                        <td width="200px"><input type="button" onclick="op(&#39;#cover&#39;,&#39;#cvr&#39;,&#39;./modal/upload.php?do=<?=$do;?>&id=<?=$tt['id'];?>&#39;)" value="<?=$str->ubtn;?>"></td>
                        <td><input type="hidden" name="id[]" value="<?=$tt['id'];?>"></td>
                    </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
            <table style="margin-top:40px; width:70%;">
                <tbody>
                    <tr>
                        <td width="200px"><input type="button" onclick="op(&#39;#cover&#39;,&#39;#cvr&#39;,&#39;./modal/<?=$do;?>.php?do=<?=$do;?>&#39;)" value="<?=$str->abtn;?>"></td>
                        <td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置"></td>
                    </tr>
                </tbody>
            </table>

        </form>
    </div>
