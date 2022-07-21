    <div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
        <p class="t cent botli"><?=$str->hdr;?></p>
        <form method="post" action="./api/edit.php?do=<?=$do;?>">
            <table width="100%">
                <tbody>
                    <tr class="yel">
                        <td width="45%"><?=$str->htd[0];?></td>
                        <td width="30%"><?=$str->htd[1];?></td>
                        <td width="6%">顯示</td>
                        <td width="6%">刪除</td>
                        <td></td>
                    </tr>
                    <?php
                    $allob=$$do->all();
                    foreach ($allob as $key => $ob) {
                    ?>
                    <tr>
                        <td>
                            <img src="./img/<?=$ob['img'];?>" width="300px" height="30px">
                        </td>
                        <td>
                            <input type="text" name="text[]" value="<?=$ob['text'];?>">
                        </td>
                        <td>
                            <input type="radio" name="sh[]" value="<?=$ob['id'];?>" <?=($ob['sh']==1)?"checked":"";?>>
                        </td>
                        <td>
                            <input type="checkbox" name="del[]" value="<?=$ob['id'];?>">
                        </td>
                        <td>
                        <input type="button" onclick="op(&#39;#cover&#39;,&#39;#cvr&#39;,&#39;./modal/upload.php?do=<?=$do;?>&id=<?=$ob['id'];?>&#39;)" value="<?=$str->upbtn;?>">
                        </td>
                        <input type="hidden" name="id[]" value="<?=$ob['id'];?>">
                    </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
            <table style="margin-top:40px; width:70%;">
                <tbody>
                    <tr>
                        <td width="200px"><input type="button" onclick="op(&#39;#cover&#39;,&#39;#cvr&#39;,&#39;./modal/<?=$do;?>.php?do=<?=$do;?>&#39;)" value="<?=$str->addbtn;?>"></td>
                        <td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置"></td>
                    </tr>
                </tbody>
            </table>

        </form>
    </div>