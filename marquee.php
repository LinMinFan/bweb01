<marquee scrolldelay="120" direction="left" style="position:absolute; width:100%; height:40px;">
<?php
$ats=$ad->all($sh);
foreach ($ats as $at) {
echo $at['text']."&nbsp;&nbsp;&nbsp;";
}
?>
</marquee>