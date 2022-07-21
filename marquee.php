<marquee scrolldelay="120" direction="left" style="position:absolute; width:100%; height:40px;">
<?php
$mqs=$ad->all(['sh'=>1]);
foreach ($mqs as $mq) {
    echo $mq['text']."&nbsp;&nbsp;&nbsp;";
}
?>

</marquee>