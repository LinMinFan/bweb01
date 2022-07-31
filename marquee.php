<marquee scrolldelay="120" direction="left" style="position:absolute; width:100%; height:40px;">
<?php
$tads=$ad->all($sh);
foreach ($tads as $tad) {
    echo $tad['text']."&nbsp;&nbsp;&nbsp;";
}
?>

</marquee>