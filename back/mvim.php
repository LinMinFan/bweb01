<?php
?>
<div class="di" style="height:540px; border:#999 1px solid; width:76.5%; margin:2px 0px 0px 0px; float:left; position:relative; left:20px;">
    <!--正中央-->
    <table width="100%">
        <tbody>
            <tr>
                <td style="width:70%;font-weight:800; border:#333 1px solid; border-radius:3px;" class="cent"><a href="?do=admin" style="color:#000; text-decoration:none;">後台管理區</a></td>
                <td><button onclick="location.href='./api/logout.php'" style="width:99%; margin-right:2px; height:50px;">管理登出</button></td>
            </tr>
        </tbody>
    </table>
    <div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
        <p class="t cent botli"><?=$str->hd;?></p>
        <form method="post" action="./api/save.php?do=<?=$do;?>">
            <table width="100%">
                <tbody>
                    <tr class="yel">
                        <td class="w50"><?=$str->td;?></td>
                        <td class="w10">顯示</td>
                        <td class="w10">刪除</td>
                        <td></td>
                    </tr>
                    <?php
                    foreach ($$do->all() as $key => $data) {
                    ?>
                    <tr class="">
                        <td class="w50 cent">
                            <img src="./img/<?=$data['img'];?>" width="120px" height="80px">
                        </td>
                        <td class="w10">
                            <input type="checkbox" name="sh[]" value="<?=$data['id'];?>" <?=($data['sh']==1)?"checked":"";?>>
                        </td>
                        <td class="w10">
                            <input type="checkbox" name="del[]" value="<?=$data['id'];?>">
                            <input type="hidden" name="id[]" value="<?=$data['id'];?>">
                        </td>
                        <td width="200px"><input type="button" onclick="op(&#39;#cover&#39;,&#39;#cvr&#39;,&#39;./model/upload.php?do=<?=$do;?>&id=<?=$data['id'];?>&#39;)" value="<?=$str->uhd;?>"></td>
                    </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
            <table style="margin-top:40px; width:70%;">
                <tbody>
                    <tr>
                        <td width="200px"><input type="button" onclick="op(&#39;#cover&#39;,&#39;#cvr&#39;,&#39;./model/<?=$do;?>.php?do=<?=$do;?>&#39;)" value="<?=$str->ahd;?>"></td>
                        <td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置"></td>
                    </tr>
                </tbody>
            </table>

        </form>
    </div>
</div>