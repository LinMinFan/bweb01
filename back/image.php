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
        <form method="post"  action="./api/edit.php?do=<?=$do;?>">
            <table width="100%">
                <tbody>
                    <tr class="yel">
                        <td class="w50"><?=$str->td;?></td>
                        <td class="w10">顯示</td>
                        <td class="w10">刪除</td>
                        <td class="w30"></td>
                    </tr>
                    <?php
                        $p=$_GET['p']??1;
                        $div=3;
                        $nums=$$do->math('count','id');
                        $pages=ceil($nums/$div);
                        $start=($p-1)*$div;
                        $pre=(($p-1)>0)?($p-1):1;
                        $next=(($p+1)<=$pages)?($p+1):$pages;
                        $datas=$$do->all(" limit $start,$div");
                        foreach ($datas as $key => $data) {
                            ?>
                                <tr>
                                    <td class="cent">
                                        <img src="./img/<?=$data['img'];?>" width="100px" height="68px">
                                    </td>
                                    <td>
                                        <input type="checkbox" name="sh[]" value="<?=$data['id'];?>" <?=($data['sh']==1)?"checked":"";?>>
                                    </td>
                                    <td>
                                        <input type="checkbox" name="del[]" value="<?=$data['id'];?>">
                                    </td>
                                    <td width="200px"><input type="button" onclick="op(&#39;#cover&#39;,&#39;#cvr&#39;,&#39;./modal/upload.php?do=<?=$do;?>&id=<?=$data['id'];?>&#39;)" value="<?=$str->ubtn;?>"></td>
                                    <input type="hidden" name="id[]" value="<?=$data['id'];?>">
                                </tr>
                            <?php
                        }
                    ?>

                </tbody>
            </table>
            <div style="text-align:center;">
        <a class="bl" href="?do=<?=$do;?>&p=<?=$pre;?>"><</a>
        <?php
            for ($i=1; $i <= $pages ; $i++) { 
                ?>
                    <a class="bl" href="?do=<?=$do;?>&p=<?=$i;?>" <?=($i==$p)?"style='font-size:24px;'":"";?>><?=$i;?></a>
                <?php
            }
        ?>
        <a class="bl" href="?do=<?=$do;?>&p=<?=$next;?>">></a>
    </div>
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