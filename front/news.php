<div class="di" style="height:540px; border:#999 1px solid; width:53.2%; margin:2px 0px 0px 0px; float:left; position:relative; left:20px;">
<?php
        include "./marquee.php";
        $p=$_GET['p']??1;
        $div=5;
        $nnums=$news->math('count','id',$sh);
        $pages=ceil($nnums/$div);
        $start=($p-1)*$div;
        $pre=(($p-1)>0)?($p-1):1;
        $next=(($p+1)<=$pages)?($p+1):$pages;
        $nns=$news->all($sh," limit $start,$div");
    ?>
    <div style="height:32px; display:block;"></div>
    <!--正中央-->
    <ol start="<?=$start+1;?>">
        <?php
            foreach ($nns as $key => $nn) {
                ?>
                    <li class="sswww">
                    <span><?=mb_substr($nn['text'],0,20);?></span>
                    <span class="all" style="display:none;"><?=$nn['text'];?></span>
                    </li>
                <?php
            }
        ?>
    </ol>
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
</div>
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