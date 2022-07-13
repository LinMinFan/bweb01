<?php
$sh = ["sh" => "1"];
$img = $title->find($sh);
//dd($img);
?>

<a title="<?=$img['text'];?>" href="./index.php"><div class="ti" style="background:url(&#39;img/<?=$img['img'];?>&#39;); background-size:cover;"></div><!--標題--></a>
