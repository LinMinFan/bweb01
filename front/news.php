<div class="di" style="height:540px; border:#999 1px solid; width:53.2%; margin:2px 0px 0px 0px; float:left; position:relative; left:20px;">
	<?php
	include "./marquee.php";
	$p=($_GET['p'])??1;
	?>
	<div style="height:32px; display:block;"></div>
	<!--正中央-->
	<div>
	<span class="t botli">更多最新消息顯示區
            <?php
            $newsums=$news->math('count','id',['sh'=>1]);
            $div=5;
            $pages=ceil($newsums/$div);
            $start=$p;
            $limit=" limit ".($start-1)*$div.",".$div;
            $nns = $news->all($limit);
            ?>
        </span>
        <ol class="ssaa" style="list-style-type:decimal;" start="<?=($start-1)*$div + 1;?>">
        <?php
        foreach ($nns as $key => $ns) {
        ?>
        <li>
            <?=mb_substr($ns['text'],0,20);?>
            <span class="all" style="display:none;"><?=$ns['text'];?></span>
        </li>
        <?php
        }
        ?>
        </ol>
		<div class="cent" style="letter-spacing:10px;">
            <?php
                $pre=(($start-1) == 0)?1:($start-1);
                $next=(($start+1) < $pages)?($start+1):$pages;

                echo "<a href='?do=$do&p=$pre'><span><</span></a>";

            for ($i=1; $i <= $pages; $i++) { 
                if ($i == $start) {
                    echo "<a href='?do=$do&p=$start'><span style='font-size:20px'>$start</span></a>";
                }else {
                    echo "<a href='?do=$do&p=$i'><span>$i</span></a>";
                }
            }

            echo "<a href='?do=$do&p=$next'><span>></span></a>";
            ?>
        </div>
        <div id="altt" style="position: absolute; width: 350px; min-height: 100px; background-color: rgb(255, 255, 204); top: 50px; left: 130px; z-index: 99; display: none; padding: 5px; border: 3px double rgb(255, 153, 0); background-position: initial initial; background-repeat: initial initial;"></div>
        <script>
            $(".ssaa li").hover(
                function() {
                    $("#altt").html("<pre>" + $(this).children(".all").html() + "</pre>").css({
                "top": $(this).offset().top - 50
            })
                    $("#altt").show()
                }
            )
            $(".ssaa li").mouseout(
                function() {
                    $("#altt").hide()
                }
            )
        </script>
	</div>
</div>