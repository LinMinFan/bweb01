<?php
$do=($_GET['do'])??'title';
include "./base.php";
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0040)http://127.0.0.1/test/exercise/collage/? -->
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <title>卓越科技大學校園資訊系統</title>
    <link href="./css/css.css" rel="stylesheet" type="text/css">
    <script src="./js/jquery-3.4.1.min.js"></script>
    <script src="./js/js.js"></script>
</head>

<body>
    <div id="cover" style="display:none; ">
        <div id="coverr">
            <a style="position:absolute; right:3px; top:4px; cursor:pointer; z-index:9999;" onclick="cl(&#39;#cover&#39;)">X</a>
            <div id="cvr" style="position:absolute; width:99%; height:100%; margin:auto; z-index:9898;"></div>
        </div>
    </div>
    <div id="main">
        <a title="" href="./index.php">
            <?php
            include "./header.php";
            ?>
            <!--標題-->
        </a>
        <div id="ms">
            <div id="lf" style="float:left;">
                <div id="menuput" class="dbor">
                    <!--主選單放此-->
                    <span class="t botli">主選單區</span>
                    <table style="width:100%;">
                        <?php
                        $vist=['parent'=>0,'sh'=>1];
                        $mmenus=$menu->all($vist);
                        foreach ($mmenus as $key => $value) {
                        ?>
                        <tr>
                            <td class="cent mainmu dbor"><a style="text-decoration: none;" href="<?=$value['href'];?>"><?=$value['text'];?></a>
                            <div class="mw" style="display:none;">
                        <?php
                            $subvist=['parent'=>$value['id']];
                            $subs=$menu->all($subvist);
                            foreach ($subs as $key => $sub) {
                            ?>
                                <div class="mainmu2"><a style="text-decoration: none;" href="<?=$sub['href'];?>"><?=$sub['text'];?></a></div>
                            <?php
                            }
                        ?>
                        </div>
                        </td>
                        </tr>
                        <?php    
                        }
                        ?>
                    </table>
                </div>
                <div class="dbor" style="margin:3px; width:95%; height:20%; line-height:100px;">
                    <span class="t">進站總人數 :
                    <?php
                    $sum=$total->find(1);
                    echo $sum['total'];
                    ?>
                     </span>
                </div>
            </div>
            <?php
            $file="./front/".$do.".php";
            if(file_exists($file)){
                include $file;
            }else {
                include "./front/main.php";
            }
            ?>
            <div id="alt" style="position: absolute; width: 350px; min-height: 100px; word-break:break-all; text-align:justify;  background-color: rgb(255, 255, 204); top: 50px; left: 400px; z-index: 99; display: none; padding: 5px; border: 3px double rgb(255, 153, 0); background-position: initial initial; background-repeat: initial initial;"></div>
            <script>
                $(".sswww").hover(
                    function() {
                        $("#alt").html("" + $(this).children(".all").html() + "").css({
                            "top": $(this).offset().top - 50
                        })
                        $("#alt").show()
                    }
                )
                $(".sswww").mouseout(
                    function() {
                        $("#alt").hide()
                    }
                )
            </script>
            <div class="di di ad" style="height:540px; width:23%; padding:0px; margin-left:22px; float:left; ">
                <!--右邊-->
                <button style="width:100%; margin-left:auto; margin-right:auto; margin-top:2px; height:50px;" onclick="lo(&#39;?do=login&#39;)">管理登入</button>
                <div style="width:89%; height:480px;" class="dbor">
                    <span class="t botli">校園映象區</span>
                        <div class="cent" onclick="pp(1)">
                            <img src="./icon/up.jpg">
                        </div>
                        <?php
                        $imgsums=$image->all(['sh'=>1]);
                        foreach ($imgsums as $key => $imgsum) {
                        ?>
                        <div class="cent">
                            <img id="ssaa<?=$key;?>" class="im" src="./img/<?=$imgsum['img'];?>" style="width:150px;height:103px">
                        </div>
                        <?php
                        }
                        ?>
                        <div class="cent" onclick="pp(2)">
                            <img src="./icon/dn.jpg">
                        </div>
                    <script>
                        var nowpage = 0,
                        <?php
                        $counts=$image->math('count','id',['sh'=>1]);
                        ?>
                            num = <?=$counts;?>;

                        function pp(x) {
                            var s, t;
                            if (x == 1 && nowpage - 1 >= 0) {
                                nowpage--;
                            }
                            if (x == 2 && (nowpage + 1) <= num - 3) {
                                nowpage++;
                            }
                            $(".im").hide()
                            for (s = 0; s <= 2; s++) {
                                t = s * 1 + nowpage * 1;
                                $("#ssaa" + t).show()
                            }
                        }
                        pp(1)
                    </script>
                </div>
            </div>
        </div>
        <div style="clear:both;"></div>
        <?php
        include "./footer.php";
        ?>
    </div>

</body>

</html>