<?php
$titles = $title->find(['sh'=>1]);
$imgT=$titles['img'];
$textT=$titles['text'];
?>
<a title="<?=$textT;?>" href="./index.php"><div class="ti" style="background:url(&#39;./img/<?=$imgT;?>&#39;); background-size:cover;"></div><!--標題--></a>
