<marquee scrolldelay="120" direction="left" style="position:absolute; width:100%; height:40px;">
<?php
$texts=['sh'=>1];
foreach ($ad->all($texts) as $key => $value) {
    echo $value['text']."&nbsp;&nbsp;&nbsp;";
}

?>
</marquee>