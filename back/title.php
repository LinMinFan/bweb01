<div class="di" style="height:540px; border:#999 1px solid; width:76.5%; margin:2px 0px 0px 0px; float:left; position:relative; left:20px;">
    <!--正中央-->
    <table width="100%">
        <tbody>
            <tr>
                <td style="width:70%;font-weight:800; border:#333 1px solid; border-radius:3px;" class="cent"><a href="?do=admin" style="color:#000; text-decoration:none;">後台管理區</a></td>
                <td><button onclick="document.cookie=&#39;user=&#39;;location.replace(&#39;?&#39;)" style="width:99%; margin-right:2px; height:50px;">管理登出</button></td>
            </tr>
        </tbody>
    </table>
    <div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
        <p class="t cent botli"><?=$str->hd;?></p>
        <form method="post" action="./api/edit.php?do=<?=$do;?>">
            <table width="100%">
                <tbody>
                    <tr class="yel">
                        <td class="w40"><?=$str->td[0];?></td>
                        <td class="w40"><?=$str->td[1];?></td>
                        <td class="w10">顯示</td>
                        <td class="w10">刪除</td>
                        <td></td>
                    </tr>
                    <?php
                    foreach ($$do->all() as $key => $data) {
                        ?>
                        <tr>
                            <td class="w40">
                                <img src="./img/<?=$data['img'];?>" width="300px" height="30px">
                            </td>
                            <td class="w40">
                                <input type="text" name="text[]" value="<?=$data['text'];?>">
                            </td>
                            <td class="w10">
                                <input type="radio" name="sh[]" <?=($data['sh']==1)?"checked":"";?> value="<?=$data['id'];?>">
                            </td>
                            <td class="w10">
                                <input type="checkbox" name="del[]" value="<?=$data['id'];?>">
                            </td>
                            <input type="hidden" name="id[]" value="<?=$data['id'];?>">
                            <td width="200px"><input type="button" onclick="op(&#39;#cover&#39;,&#39;#cvr&#39;,&#39;./modal/upload.php?do=<?=$do;?>&id=<?=$data['id'];?>&#39;)" value="<?=$str->ubtn;?>"></td>
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
</div>