    <div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
        <p class="t cent botli"><?=$str->hdr;?></p>
        <form method="post" action="./api/edit.php?do=<?=$do;?>">
            <table width="100%">
                <tbody>
                    <tr class="yel">
                        <td width="80%"><?=$str->htd;?></td>
                        <td width="10%">顯示</td>
                        <td>刪除</td>
                    </tr>
                    <?php
                    $allob=$$do->all();
                    foreach ($allob as $key => $ob) {
                    ?>
                    <tr>
                        <td>
                            <input type="text" name="text[]" value="<?=$ob['text'];?>" style="width:80%">
                        </td>
                        <td>
                            <input type="checkbox" name="sh[]" value="<?=$ob['id'];?>" <?=($ob['sh']==1)?"checked":"";?>>
                        </td>
                        <td>
                            <input type="checkbox" name="del[]" value="<?=$ob['id'];?>">
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